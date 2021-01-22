<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditProfile extends Component
{
    public $user;
    public $name = '';
    public $username = '';
    public $email = '';
    public $avatar = '';
    public $presentation = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function updated()
    {
        $this->validate([
            'username' => ['required', 'min:3', 'max:32', 'alpha_dash', Rule::unique('users')->ignore($this->user)],
            'name' => ['string', 'required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'avatar' => ['file', 'image'],
            'presentation' => ['string', 'max:255', 'nullable'],
        ]);
    }
    
    public function save()
    {
         $data = $this->validate([
            'username' => ['required', 'min:3', 'max:32', 'alpha_dash', Rule::unique('users')->ignore($this->user)],
            'name' => ['string', 'required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'avatar' => ['file', 'image'],
            'presentation' => ['string', 'max:255', 'nullable'],
        ]);

        # Only validate and update password if a new password is given
        if ($this->password) {
            $password_data = $this->validate(['password' => ['string', 'min:8', 'max:255', 'same:passwordConfirmation']]);
            $password_data['password'] = Hash::make($password_data['password']);
            $data = array_merge($password_data, $data);
        }

        # Only save the avatar path if one has been uploaded
        //if ($this->avatar)
        //    $attributes['avatar'] = $request['avatar']->store('avatars');

        $this->user->update($data);
    }

    public function mount($user)
    {
        $this->user = User::where('username', $user)->first();
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->presentation = $this->user->presentation;
    }

    public function render()
    {
        return view('livewire.edit-profile')
            ->layout('components.app');
    }
}
