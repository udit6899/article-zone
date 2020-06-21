<?php


namespace App\Helpers;


use App\Models\Subscriber;
use App\Models\User;
use App\Notifications\Comment\CommentApproved;
use App\Notifications\Comment\CommentCreated;
use App\Notifications\Comment\CommentUpdated;
use App\Notifications\Message\MessageCreated;
use App\Notifications\Message\MessageReplied;
use App\Notifications\Post\PostApproved;
use App\Notifications\Post\PostCreated;
use App\Notifications\Post\PostPublished;
use App\Notifications\Post\PostUpdated;
use Illuminate\Support\Facades\Notification;

class NotificationHelper
{
    /**
     * Create notification handler for post operation
     *
     * @param string $receiver
     * @param Illuminate\Database\Eloquent\Model $data
     * @param string $for
     * @param string $action
     */

    public static function notify($receiver, $data, $for, $action = '') {

        // Maintain the request by load balancer
        switch ($receiver) {

            case 'admin':

                // Retrieve all admins from DB
                $admins = User::admin(true)->get();

                if ($action === 'new') {

                    // If action is for new operation

                    if ($for === 'post') {

                        // Send notifcation to all admin once a new post created
                        Notification::send($admins, new PostCreated($data));
                    } else if ($for === 'comment') {

                        // Send notifcation to all admin once a new comment created
                        Notification::send($admins, new CommentCreated($data));
                    } else if ($for === 'message') {

                        // Send notifcation to all admin once a new report is submitted
                        Notification::send($admins, new MessageCreated($data));
                    }
                } else if ($action === 'update') {

                    // If action is for update operation

                    if ($for === 'post') {

                        // Send notifcation to all admin once a post update by author
                        Notification::send($admins, new PostUpdated($data));
                    } else if ($for === 'comment') {

                        // Send notifcation to all admin once a comment update by author
                        Notification::send($admins, new CommentUpdated($data));
                    }
                }

                break;
            case 'author':

                // Get author of the data
                $author = $data->user;

                if ($for === 'post') {

                    // Send notification to auther once a post approved by admin
                    $author->notify(new PostApproved($data));
                } else if ($for === 'comment') {

                    // Send notification to auther once a comment approved by admin
                    $author->notify(new CommentApproved($data));
                }

                break;
            case 'subscriber':

                // Get all the subscribers
                $subscribers = Subscriber::all();

                // Send notification to all subscribers once a post published
                foreach ($subscribers as $subscriber) {
                    Notification::route('mail', $subscriber->email)
                                ->notify(new PostPublished($data));
                }

                break;
            case 'reporter':

                // Send notification to message reporter once replied by admin
                Notification::route('mail', $data->email)
                            ->notify(new MessageReplied($data));
                break;
            default:
                return 0;
        }
    }
}
