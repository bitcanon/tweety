<x-app>
    <!-- Form: Write a new Tweet -->
    <div class="card mb-4">
        <img src="{{ asset('img/bart_falling.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <img
                src="{{ $user->avatar }}"
                class="rounded-pill float-left mr-3"
                alt="your avatar"
                width="50" height="50"
            >
            <h5 class="card-title">{{ $user->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Joined {{ $user->created_at->diffForHumans() }}</h6>
            <p class="card-text">{{ $user->presentation }}</p>

            {{-- Only show follow/unfollow on other users profiles --}}
            @unless (current_user()->is($user))
                <livewire:follow-button :user="$user"/>
            @endunless

            {{-- Only show edit button if on logged in users profile --}}
            @can ('edit', $user)
                <a href="{{ route('profiles.edit', auth()->user()->username) }}"
                   class="btn btn-sm btn-secondary float-right">Edit Profile</a>
            @endcan
        </div>
    </div>

    <!-- The flow of Tweet -->
    <div class="list-group shadow-sm mb-4">
        @foreach ($user->tweets as $tweet)
            <x-tweets.single-tweet :tweet="$tweet"/>
        @endforeach
    </div>
</x-app>
