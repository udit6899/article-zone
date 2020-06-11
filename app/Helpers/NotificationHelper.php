<?php


namespace App\Helpers;


use App\Models\Subscriber;
use App\Models\User;
use App\Notifications\PostApproved;
use App\Notifications\PostCreated;
use App\Notifications\PostPublished;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

class NotificationHelper
{
    /**
     * Create notification handlers
     *
     * @param string $receiver
     * @param \App\Models\Post $post
     */

    public static function notify($receiver, $post) {

        // Maintain the request by load balancer
        switch ($receiver) {

            case 'admin':

                // Retrieve all admins from DB
                $admins = User::admin(true)->get();

                // Send notifcation to all admin once a new post created
                Notification::send($admins, new PostCreated($post));

                break;
            case 'author':

                // Get author of the post
                $author = $post->user;

                // Send notification to auther once a post approved by admin
                $author->notify(new PostApproved($post));

                break;
            case 'subscriber':

                // Get all the subscribers
                $subscribers = Subscriber::all();

                // Send notification to all subscribers once a post published
                foreach ($subscribers as $subscriber) {
                    Notification::route('mail', $subscriber->email)
                                ->notify(new PostPublished($post));
                }

                break;
            default:
                return 0;
        }
    }

}
