<x-app>
    {{-- Edit the user profile --}}
    <div class="card">
        <div class="card-body shadow-sm">
            <h5 class="card-title">{{ __('Edit User Profile') }}</h5>
            <div class="form-group">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif

            {{-- Edit Profile Form --}}
            <!-- Ignore browser validation (novalidate), let's do that with Laravel on server instead-->
                <form method="POST" action="{{ route('profiles.update', current_user()) }}"
                      enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="name">{{ __("Name") }}</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="{{ __("Name") }}"
                               value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="username">{{ __("Username") }}</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">profiles/</div>
                            </div>
                            <input class="form-control" type="text" name="username" id="username"
                                   placeholder="{{ __("Username") }}" value="{{ $user->username }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="email">{{ __("Email address") }}</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                               id="email"
                               aria-describedby="email_address_help" placeholder="{{ __("Email address") }}"
                               value="{{ $user->email }}">
                        @error('email') {{ $message }} @enderror
                        <small id="email_address_help"
                               class="form-text text-muted">{{ __("We'll never share your email with anyone else.") }}</small>
                    </div>
                    <!-- Don't forget https://www.npmjs.com/package/bs-custom-file-input
                    * Add these two lines before the closing </body> tag.
                    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
                    <script>bsCustomFileInput.init()</script>
                    -->

                    <div class="form-group">
                        <label class="sr-only" for="avatar">{{ __("Avatar") }}</label>
                        <div class="custom-file">
                            <label class="custom-file-label" for="avatar"
                                   data-browse="{{ __('Browse') }}">{{ __("Select an image...") }}</label>
                            <input class="custom-file-input" type="file" id="avatar" name="avatar" aria-describedby="avatar_help">
                            <small id="avatar_help"
                                   class="form-text text-muted">Create a free avatar at <a href="https://avatarmaker.com" target="_blank">https://avatarmaker.com</a></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="presentation">{{ __('Presentation') }}</label>
                        <textarea class="form-control" name="presentation" id="presentation"
                                  placeholder="Placeholder text message."
                                  aria-describedby="presentation_help">{{ $user->presentation  }}</textarea>
                        <small id="presentation_help"
                               class="form-text text-muted">{{ __("Write a few words in the text area.") }}</small>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __("Password") }}</label>
                        <input class="form-control" type="password" name="password" id="password"
                               placeholder="{{ __("Password") }}">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="password_confirmation">{{ __("Password Confirmation") }}</label>
                        <input class="form-control" type="password" name="password_confirmation"
                               id="password_confirmation" aria-describedby="password_confirmation_help"
                               placeholder="{{ __("Password Confirmation") }}">
                        <small id="password_confirmation_help"
                               class="form-text text-muted">{{ __("Your password will be encrypted.") }}</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">{{ __("Update") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
