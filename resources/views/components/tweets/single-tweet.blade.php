<li class="list-group-item list-group-item-action">
    <div class="media mt-1">
        <a href="{{ route('profiles.show', $tweet->user) }}">
            <img src="{{ $tweet->user->avatar }}" class="mr-3 rounded-pill" alt="..." width="50" height="50">
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
        </div>
    </div>
</li>
