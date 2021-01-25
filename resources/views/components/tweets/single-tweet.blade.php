<li class="list-group-item list-group-item-action">
    <div class="media mt-1">
        <a href="{{ route('profiles.show', $tweet->user) }}">
            <img src="{{ $tweet->user->avatar_url }}" class="mr-3 rounded-pill" alt="..." width="50" height="50">
        </a>
        <div class="media-body">
            <h6 class="mt-0">
                <a href="{{ route('profiles.show', $tweet->user) }}">
                    <b>{{ $tweet->user->name }}</b>
                </a>
            </h6>
            <p class="">
                {{ $tweet->body }}
            </p>
            <livewire:like-buttons :tweet="$tweet"/>
            <small class="float-right">{{ $tweet->created_at->diffForHumans() }}</small>
        </div>
    </div>
</li>
