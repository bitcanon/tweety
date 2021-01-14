<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $guarded = []; //$fillable = ['body'];

    /*
     * Fetch the user that published the Tweet.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
