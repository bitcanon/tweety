<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FollowingList extends Component
{
    /**
     * Listen for a 'followingListUpdated' event emitted when the user
     * clicks the FollowButton. We should the re-render the following
     * list of users that we follow.
     *
     * @var string[]
     */
    protected $listeners = [
        'followingListUpdated' => 'render'
    ];

    public function render()
    {
        return view('livewire.following-list');
    }
}
