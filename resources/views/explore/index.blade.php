<x-app>
    <div class="row">
        @foreach($users as $user)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-sm-4">
                        <img src="{{ $user->avatar }}" class="card-img" alt="...">
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body">
                            <a href="{{ route('profiles.show', $user->username) }}">
                                <h5 class="card-title">{{ $user->name }}</h5>
                            </a>
                            <p class="card-text">{{ $user->presentation }}</p>
                            <p class="card-text"><small class="text-muted">Joined {{ $user->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app>
