@props(['messages'])

@if ($messages)
    <ul class="text-sm text-red list-unstyled {{ $attributes->get('class') }}" style="color: red">
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
