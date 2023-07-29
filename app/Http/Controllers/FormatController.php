<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class FormatController extends Controller
{
    public static function timeRead(string $timestamp = null)
    {
        $carbonTimestamp = Carbon::parse($timestamp);
        $formattedTimestamp = $carbonTimestamp->diffForHumans();

        return $formattedTimestamp;
    }

    public static function formatListings($listings)
    {
        return $listings->map(function ($listing) {
            $formattedCreatedAt = self::timeRead($listing->created_at);
            $formattedDescription = Str::limit($listing->description, 120, '...');
            $listing_user = $listing->user;
            $listing = $listing->toArray();
            $listing['description_formatted'] = $formattedDescription;
            $listing['created_at_formatted'] = $formattedCreatedAt;
            $listing['user'] = $listing_user; // Include the user in the formatted listing
            unset($listing['description']);
            unset($listing['created_at']);
            return (object)$listing;
        });
    }

    public static function location ($city, $country)
    {
        return $city . ', ' . $country;
    }

    /**
     * delete file in the application
     * @param filename
     * @param path
     */
    public static function deleteFile($filename, $path)
    {
        $filePath = public_path($path . '/' . $filename);
        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        return false;
    }

    public static function getMessageTime($timestamp)
    {
        $now = Carbon::now();
        $messageTime = Carbon::parse($timestamp);
    
        if ($messageTime->isToday()) {
            return $messageTime->format('h:ia');
        } elseif ($messageTime->isYesterday()) {
            return 'Yesterday';
        } else {
            return $messageTime->format('Y-m-d H:i:s');
        }
    }

    /**
     * Format the conversation data to prepare it for display.
     *
     * @param Collection $conversation The collection of conversation messages.
     * @param bool $truncate Whether to truncate the message content or not (default: false).
     *
     * @return array The formatted conversation data.
     */
    public static function messageData(Collection $conversation, bool $truncate = false): array
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
                    'time' => self::getMessageTime($message->created_at),
                    'content' => $message->message_content,
                    'is_self' => $message->sender_id === Auth::user()->id,
                ];
            }
        }
        return $conversationData;
    }
}
