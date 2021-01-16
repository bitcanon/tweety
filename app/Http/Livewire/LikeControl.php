<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikeControl extends Component
{
    public $likes = 0;
    public $dislikes = 0;

    public function like()
    {
        $this->likes++;
    }

    public function dislike()
    {
        $this->dislikes++;
    }

    public function render()
    {
        return view('livewire.likecontrol');
    }
}
