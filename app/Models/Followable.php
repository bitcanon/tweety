<?php


namespace App\Models;


trait Followable
{

    public function is_following(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class,
            'following', 'user_id', 'following_user_id')
            ->orderBy('name')
            ->withTimestamps();
    }

    public function follow(User $user)
    {
        // Make this user follow the user in the $user variable.
        $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        // Make this user unfollow the user in the $user variable.
        $this->follows()->detach($user);
    }
}
