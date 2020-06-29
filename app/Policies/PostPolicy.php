<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
     * Determine whether the user can view any posts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        // Author can only view their own post
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can create post.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(?User $user)
    {
        // Any one can create and store the post
        return true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        // Author can only update their own post
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        // Author can only delete their own post
        return $user->id === $post->user_id;
    }
}
