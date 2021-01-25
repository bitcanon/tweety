<div class="card">
    <div class="card-body shadow-sm">
        <h5 class="card-title">{{ __('Edit User Profile') }}</h5>
        <div class="form-group">
            <form wire:submit.prevent="save" novalidate>

                <x-input.text-inline
                    wire:model="name"
                    id="name"
                    label="Name"
                    :error="$errors->first('name')">
                </x-input.text-inline>

                <x-input.text-inline
                    wire:model="username"
                    id="username"
                    label="Username"
                    leading-text="@"
                    help-text=""
                    :error="$errors->first('username')">
                </x-input.text-inline>

                <x-input.text-inline
                    wire:model="email"
                    id="email"
                    label="Email"
                    :error="$errors->first('email')">
                </x-input.text-inline>

                <x-input.textarea-inline
                    wire:model="presentation"
                    id="presentation"
                    label="Presentation"
                    placeholder="Write a short presentation of yourself."
                    :error="$errors->first('presentation')">
                </x-input.textarea-inline>

                <x-input.password-inline
                    wire:model.lazy="password"
                    id="password"
                    label="Password"
                    :error="$errors->first('password')">
                </x-input.password-inline>

                <x-input.password-inline
                    wire:model.lazy="passwordConfirmation"
                    id="passwordConfirmation"
                    label="Confirm Password">
                </x-input.password-inline>

                {{--
                <label for="avatar" class="btn btn-success">Browse</label>
                <input wire:model="avatar" class="sr-only" id="avatar" type="file">
                --}}

                <x-input.fileupload-inline
                    wire:model="avatar"
                    id="avatar"
                    label="Avatar"
                    :error="$errors->first('avatar')">
                </x-input.fileupload-inline>

                <input class="btn btn-primary float-right" type="submit" value="Save">
            </form>
        </div>
    </div>
</div>
