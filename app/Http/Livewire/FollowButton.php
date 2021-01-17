<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FollowButton extends Component
{
    // Automatically set by <livewire:follow-button :user="$user"/>
    public $user;

    public $is_following_user = false;

    public function mount()
    {
        $this->is_following_user = current_user()->is_following($this->user);
    }

    /**
     * Follow or Unfollow button is pressed.
     *
     * Update the authenticated user to follow or unfollow the user
     * which this FollowButton component is associated with.
     */
    public function toggle_follow()
    {
        if (current_user()->is_following($this->user))
            current_user()->unfollow($this->user);
        else
            current_user()->follow($this->user);

        $this->is_following_user = current_user()->is_following($this->user);

        // Fire event when Following List should be updated
        $this->emit('followingListUpdated');
    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}
