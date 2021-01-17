<x-app>
    <div class="row">
        @foreach($users as $user)
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="media">
                            <img src="{{ $user->avatar }}" class="mr-3 rounded-pill" alt="..." style="max-width: 75px;">
                            <div class="media-body">
                                <a href="{{ route('profiles.show', $user->username) }}">
                                    <h5 class="mt-0">{{ $user->name }}</h5>
                                </a>
                                <p>
                                    {{ $user->presentation }}
                                </p>
                                <small class="text-muted">Joined {{ $user->created_at->diffForHumans() }}</small>
                                <livewire:follow-button :user="$user"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app>
