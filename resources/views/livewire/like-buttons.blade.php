<div class="btn-group btn-group-sm">
    <button wire:click="like()"
            type="button" class="btn
            @if ($tweet->isLikedBy(current_user()))
            btn-success
            @else
            btn-light
            @endif
            rounded-pill mr-2 pt-0 pb-0"
            >
        <i class="far fa-thumbs-up mt-1">
            <strong>{{ $tweet->likeCount() ?? "0" }}</strong>
        </i>
    </button>

    <button wire:click="dislike()"
            type="button" class="btn
            @if ($tweet->isDislikedBy(current_user()))
            btn-danger
            @else
            btn-light
            @endif
            rounded-pill mr-2 pt-0 pb-0"
            >
        <i class="far fa-thumbs-down mt-1">
            <strong>{{ $tweet->dislikeCount() ?? "0" }}</strong>
        </i>
    </button>
</div>
