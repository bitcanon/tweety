<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfile extends Component
{
    public function render()
    {
        return view('livewire.edit-profile')
            ->layout('components.app');
    }
}
