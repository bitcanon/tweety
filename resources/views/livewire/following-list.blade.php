<div class="card shadow-sm">
    <h5 class="ml-3 mt-3">Following</h5>
    @auth()
        @forelse(current_user()->follows as $user)
            <a href="{{ route('profiles.show', $user) }}" class="list-group-item list-group-item-action border-0 tw-list-group-item p-2">
                <img class="rounded-pill mr-2 ml-1" src="{{ $user->avatar }}" width="40" height="40">
                {{ $user->name }}
            </a>
        @empty
            <a href="{{ route('explore.index') }}" class="list-group-item list-group-item-action border-0 ">
                {{ __('Click here to Explore users.') }}
            </a>
        @endforelse
    @endauth
</div>
