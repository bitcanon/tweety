@props([
    'id',
    'label' => 'LabelText',
    'error' => null,
])

<div class="form-group form-row">
    <label class="col-sm-3 col-form-label" for="{{ $id }}">
        {{ $label }}
    </label>
    <div class="input-group mb-2 col-sm-9">
        <input
            {{ $attributes }}
            id="{{ $id }}"
            type="password"
            class="form-control rounded-right @if($error) is-invalid @endif"
        />
        <div class="invalid-feedback">@if($error) {{ $error }} @endif</div>
    </div>
</div>
