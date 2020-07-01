<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine the access for super admin
     *
     * @param  \App\Models\User  $user
     * @param string $ability
     * @return mixed
     */
    public function before($user, $ability)
    {
        // Allow user can access anything
        if ($user->is_admin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        // Author can only update their own comment
        return $user->id === $comment->user_id;
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        // Author can only delete their own comment
        return $user->id === $comment->user_id;
    }
}
