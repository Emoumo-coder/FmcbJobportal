<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FormatController;

class InboxController extends Controller
{
    public function index()
    {
        // Get the current authenticated user ID
        $currentUserId = Auth::user()->id;

        // Retrieve the users except the current user, and order them by the latest message
        $users = User::where('users.id', '!=', $currentUserId)
            ->with(['profile:id,user_id,photo'])
            ->select('users.id', 'users.username', 'users.gender', DB::raw('MAX(i1.created_at) as last_message_time'))
            ->leftJoin('inboxes as i1', function ($join) use ($currentUserId) {
                $join->on('users.id', '=', 'i1.receiver_id')
                    ->where('i1.sender_id', '=', $currentUserId);
            })
            ->leftJoin('inboxes as i2', function ($join) use ($currentUserId) {
                $join->on('users.id', '=', 'i2.sender_id')
                    ->where('i2.receiver_id', '=', $currentUserId);
            })
            ->groupBy('users.id', 'users.username', 'users.gender', 'users.created_at')
            ->orderByDesc('last_message_time')
            ->get();

        // Strip the remaining text after 30 characters and add '...' if the message is longer
        foreach ($users as $user) {
            $latestMessage = Inbox::where(function ($query) use ($user, $currentUserId) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', $currentUserId);
            })
            ->orWhere(function ($query) use ($user, $currentUserId) {
                $query->where('sender_id', $currentUserId)
                    ->where('receiver_id', $user->id);
            })
            ->latest()
            ->limit(1)
            ->first();


            // Use the messageData method to format the latest message
            if (!$latestMessage) {
                $user->latest_message = [
                    [
                        'time' => '',
                        'content' => 'Tap to start conversation with '. $user->username,
                        'is_self' => false,
                    ]
                ];   
            }else{
                $user->latest_message = $this->messageData(collect([$latestMessage], true));
            }

            // Calculate the count of unread messages
            $unreadCount = Inbox::where('receiver_id', $currentUserId)
            ->where('sender_id', $user->id)
            ->where('is_viewed', false)
            ->count();

            // Add the unread count as a new attribute to the user object
            $user->unread_count = $unreadCount;
        }
        
        return view('inbox.index', compact('users'));
    }


    public function getInboxes (Request $request)
    {
        $receiverId = $request->input('recieverId');
        $senderId = Auth::user()->id;

        // Fetch the conversation between the two users
        $conversation = Inbox::where(function ($query) use ($receiverId, $senderId) {
            $query->where('receiver_id', $receiverId)
                ->where('sender_id', $senderId);
        })->orWhere(function ($query) use ($receiverId, $senderId) {
            $query->where('receiver_id', $senderId)
                ->where('sender_id', $receiverId);
        })
        ->oldest()
        ->get();

        $user = User::select('id', 'username', 'gender')
            // ->with(['profile' => fn($query) => $query->select('id', 'user_id', 'photo')])
            ->with('profile:id,user_id,photo')
            ->find($receiverId);
        
        $lastMessageTimestamp = $conversation->isNotEmpty() ? $conversation->last()->created_at : null;

        // Build the conversation array with the necessary data for each message
        $conversationData = $this->messageData($conversation);

        return view('partials.__conversation', compact('conversationData', 'user', 'lastMessageTimestamp'))->render();
    }

    public function sendInbox (Request $request)
    {
        $receiverId = $request->input('userId');
        // Validate the incoming request data
        $validatedData = $request->validate([
            'message_content' => 'required|string',
        ]);

        // Create a new message instance
        $message = new Inbox();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $receiverId;
        $message->message_content = $validatedData['message_content'];
        $message->save();

        // Return a success response
        return response()->json(['success' => true]);
    }

    public function fetchNewMessages (Request $request)
    {
        // Get the last timestamp from the request
        $lastMessageTimestamp = $request->input('last_timestamp');
        // dd($lastMessageTimestamp);

        // Fetch new messages based on the timestamp or message ID
        $newMessages = Inbox::where(function ($query) use ($lastMessageTimestamp) {
            $query->where('sender_id', Auth::user()->id)
                ->orWhere('receiver_id', Auth::user()->id);
        })
        ->when($lastMessageTimestamp, function ($query) use ($lastMessageTimestamp) {
            $query->where('created_at', '>', $lastMessageTimestamp);
        })
        ->oldest('created_at')
        ->get();

        // Update the is_viewed column for messages that have not been viewed
        Inbox::where('receiver_id', Auth::user()->id)
        ->where('is_viewed', 0)
        ->update(['is_viewed' => 1]);
        
        // Update the lastMessageTimestamp with the timestamp of the last message
        $lastMessageTimestamp = $newMessages->last() ? $newMessages->last()->created_at : $lastMessageTimestamp;

        $newMessageData = $this->messageData($newMessages);

        // dd($newMessageData);
        // Return the new messages and updated lastMessageTimestamp as a JSON response
        return response()->json(
            ['success' => true, 
            'data' => $newMessageData, 
            'last_timestamp' => $lastMessageTimestamp]
        );
    }

    
    /**
     * Format the conversation data to prepare it for display.
     *
     * @param Collection $conversation The collection of conversation messages.
     * @param bool $truncate Whether to truncate the message content or not (default: false).
     *
     * @return array The formatted conversation data.
     */
    public function messageData(Collection $conversation, bool $truncate = false): array
    {
        $conversationData = [];
        if ($conversation->isNotEmpty()) {
            foreach ($conversation as $message) {
                if ($truncate) {
                    $message->message_content = (strlen($message->message_content) > 30) 
                    ? substr($message->message_content, 0, 30) . '...' 
                    : $message->message_content;
                }
                $conversationData[] = [
                    'time' => FormatController::getMessageTime($message->created_at),
                    'content' => $message->message_content,
                    'is_self' => $message->sender_id === Auth::user()->id,
                ];
            }
        }
        return $conversationData;
    }
}
