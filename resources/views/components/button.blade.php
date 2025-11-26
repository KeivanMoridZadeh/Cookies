@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'disabled' => false
])

@php
    $classes = 'btn btn-' . $variant . ' btn-' . $size;
    if ($disabled) {
        $classes .= ' btn-disabled';
    }
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} @if($disabled) disabled @endif>
        {{ $slot }}
    </button>
@endif

<style>
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem 1rem;
    font-weight: 500;
    text-decoration: none;
    border: 1px solid transparent;
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-primary {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

.btn-primary:hover {
    background: var(--primary-dark);
    border-color: var(--primary-dark);
    transform: translateY(-1px);
}

.btn-secondary {
    background: var(--secondary);
    color: var(--text-primary);
    border-color: var(--secondary);
}

.btn-secondary:hover {
    background: var(--bg-white);
    color: var(--secondary);
    border-color: var(--secondary);
    transform: translateY(-1px);
}

.btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
}

.btn-md {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
}

.btn-lg {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
}

.btn-disabled {
    opacity: 0.6;
    cursor: not-allowed;
    pointer-events: none;
}
</style>