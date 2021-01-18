<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

trait Likable
{
    // From Laravel From Scratch Episode 67: A Like and Dislike system
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'SELECT tweet_id, sum(liked) likes, sum(!liked) dislikes FROM likes GROUP BY tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    /**
     * Return the number of likes for this tweet
     *
     * @return int
     */
    public function likeCount() : int
    {
        return DB::table('likes')
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    /**
     * Return the number of dislikes for this tweet
     *
     * @return int
     */
    public function dislikeCount() : int
    {
        return DB::table('likes')
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function isDislikedBy(User $user) : bool
    {
        return (bool)$user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->user()->id
            ],
            [
                'liked' => $liked
            ]
        );
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function isLikedBy(User $user) : bool
    {
        return (bool)$user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }
}
