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
    <div class="input-group mb-2 col-sm-9">
        @if ($leadingText)
            <div class="input-group-prepend">
                <div class="input-group-text">{{ $leadingText }}</div>
            </div>
        @endif
        <input
            {{ $attributes }}
            id="{{ $id }}"
            type="text"
            class="form-control rounded-right @if($error) is-invalid @endif"
            aria-describedby="{{ $label }}Help">
        <div class="invalid-feedback">@if($error) {{ $error }} @endif</div>
    </div>
</div>
