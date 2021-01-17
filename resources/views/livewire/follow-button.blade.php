<div>
    <button wire:click="toggle_follow()" class="btn btn-sm btn-primary float-right">
        {{ $is_following_user ? "Unfollow" : "Follow" }} {{-- $user->username --}}
    </button>
</div>
