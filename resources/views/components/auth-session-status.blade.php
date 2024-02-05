@props(['status'])

@if ($status)
    <div style="color: #01c324;">
        {{ $status }}
    </div>
@endif
