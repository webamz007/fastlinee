@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-red']) }} style="color: red;">
        {{ $status }}
    </div>
@endif
