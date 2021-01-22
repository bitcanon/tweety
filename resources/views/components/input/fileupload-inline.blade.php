@props([
    'id',
    'label' => 'LabelText',
    'leadingText' => false,
    'error' => null,
])

<div class="form-group form-row">
    <label class="col-sm-3 col-form-label" for="{{ $id }}">
        {{ $label }}
    </label>
    <div class="custom-file input-group mb-2 col-sm-9">
        <label class="custom-file-label" for="{{ $label }}"
               data-browse="{{ __('Browse') }}">{{ __("Select an image...") }}</label>
        <input
            {{ $attributes }}
            type="file"
            id="{{ $id }}"
            class="custom-file-input @if($error) is-invalid @endif"
            aria-describedby="{{ $label }}Help">
        <div class="invalid-feedback">@if($error) {{ $error }} @endif</div>
    </div>
</div>

