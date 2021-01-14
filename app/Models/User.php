<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'avatar',
        'presentation',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The tweets belonging to the user. It includes tweets
     * published by the user itself, as well as tweets
     * of everyone they follow.
     *
     * @return mixed
     */
    public function timeline()
    {
        $following = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $following)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->get();
    }

    /**
     * A collection of tweets published by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    /**
     * The URL of the users avatar.
     *
     * https://laravel.com/docs/8.x/eloquent-mutators
     *
     * This method allows for calling $user->avatar in a view.
     * It will get the avatar-field from the user object in the
     * database and return it in the $value variable.
     *
     * @return string
     */
    public function getAvatarAttribute($value): string
    {
        return asset($value); //"https://i.pravatar.cc/100?u=" . $this->email;
    }
}
