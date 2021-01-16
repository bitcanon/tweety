<div class="btn-group btn-group-sm">
    <button wire:click="like()" type="button" class="btn btn-light rounded-pill mr-2"><i class="far fa-thumbs-up">
            <strong>{{ $likes ?? "0" }}</strong></i></button>
    <button wire:click="dislike()" type="button" class="btn btn-light rounded-pill"><i class="far fa-thumbs-down">
            <strong>{{ $dislikes ?? "0" }}</strong></i></button>
</div>
