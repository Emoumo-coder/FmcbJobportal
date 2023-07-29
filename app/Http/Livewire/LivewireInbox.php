<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Inbox;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FormatController;

class LivewireInbox extends Component
{
    public $activeUsers;

    public function mount()
    {
        // Fetch the users and their latest messages
        $this->fetchUsers();
    }

    public function fetchUsers()
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
                $user->latest_message = FormatController::messageData(collect([$latestMessage], true));
            }

            // Calculate the count of unread messages
            $unreadCount = Inbox::where('receiver_id', $currentUserId)
            ->where('sender_id', $user->id)
            ->where('is_viewed', false)
            ->count();

            // Add the unread count as a new attribute to the user object
            $user->unread_count = $unreadCount;
        }

        $this->activeUsers = $users;
    }

    public function pollUsers()
    {
        $this->activeUsers; // Fetch users initially
        // $this->poll(5000, 'refreshUsers'); // Poll every 5000ms (5 seconds)
    }

    public function render()
    {
        return view('livewire.inbox');
    }
}
