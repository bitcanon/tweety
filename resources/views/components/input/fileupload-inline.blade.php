@props([
    'id',
    'label' => 'LabelText',
    'leadingText' => false,
    'error' => null,
])

<div class="form-group form-row">
    <label class="col-sm-3 col-form-label" for="{{ $id }}">
        {{ $label }}: {{ $avatar ?? 'None' }}
    </label>

    <div class="input-group mb-2 col-sm-9">
        <label for="avatar" class="btn btn-secondary">Browse</label>
        <input {{ $attributes }} class="sr-only  @if($error) is-invalid @endif" id="avatar" type="file">
        <div class="invalid-feedback">@if($error) {{ $error }} @endif</div>
    </div>

</div>
