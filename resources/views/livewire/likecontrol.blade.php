<div class="btn-group btn-group-sm">
    <button wire:click="like()" type="button" class="btn btn-light rounded-pill mr-2"><i class="far fa-thumbs-up">
            <strong>{{ $likes }}</strong></i></button>
    <button wire:click="dislike()" type="button" class="btn btn-light rounded-pill"><i class="far fa-thumbs-down">
            <strong>{{ $dislikes  }}</strong></i></button>
</div>
