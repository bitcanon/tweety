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
            <div class="row">
                {{-- Tweet Like Form --}}
                <form method="POST" action="#">
                    @csrf
                    <button class="btn btn-light btn-sm rounded-pill"
                            style="padding-top: 0.05em; padding-bottom: 0; font-size: 0.75em; margin-right: 0.5em;">
                        <i class="far fa-thumbs-up"> <strong>0</strong></i>
                    </button>
                </form>
                {{-- Tweet Dislike Form --}}
                <form method="POST" action="#">
                    @csrf
                    <button class="btn btn-light btn-sm rounded-pill"
                            style="padding-top: 0.05em; padding-bottom: 0; font-size: 0.75em;">
                        <i class="far fa-thumbs-down"> <strong>0</strong></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</li>
