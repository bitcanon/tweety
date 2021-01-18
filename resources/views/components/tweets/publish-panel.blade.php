<div class="form-group shadow-sm">
    <form method="POST" action="/tweets">
        @csrf
        <ul class="list-group">
            <li class="list-group-item">
                <textarea name="body" class="form-control mb-3" id="bodyTextarea" rows="3" placeholder="{{ __("What's on your mind?") }}"></textarea>
                @error('body')
                <p class="">{{ $message }}</p>
                @enderror
                <a href="{{ route('profiles.show', current_user()) }}">
                    <img
                        src="{{ auth()->user()->avatar }}"
                        class="float-left rounded-pill"
                        alt="your avatar"
                        width="40" height="40"
                    >
                </a>
                <button
                    type="submit"
                    class="btn btn-primary btn-sm float-right"
                >
                    Tweet
                </button>
            </li>
        </ul>
    </form>
</div>
