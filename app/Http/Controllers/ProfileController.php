<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(User $user)
    {
        $this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));
    }

    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required', 'max:255'],
            'presentation' => ['string', 'max:255', 'nullable'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'avatar' => ['file', 'image'],
        ]);

        # Only validate and update password if a new password is given
        if ($request['password']) {
            $data = $request->validate(['password' => ['string', 'min:8', 'max:255', 'confirmed']]);
            $data['password'] = Hash::make($data['password']);
            $attributes = array_merge($attributes, $data);
        }

        # Only save the avatar path if one has been uploaded
        if ($request['avatar'])
            $attributes['avatar'] = $request['avatar']->store('avatars');

        $user->update($attributes);

        return view('profiles.show', compact('user'));
    }
}
