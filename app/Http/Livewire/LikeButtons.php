<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikeButtons extends Component
{
    public $likes = 0;
    public $dislikes = 0;

    public $tweet;

    public function like()
    {
        $this->tweet->like(current_user());
        $this->likes = $this->tweet->likeCount();
    }

    public function dislike()
    {
        $this->tweet->dislike(current_user());
        $this->dislikes = $this->tweet->dislikeCount();
    }

    public function render()
    {
        return view('livewire.like-buttons');
    }
}
