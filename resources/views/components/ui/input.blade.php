@props([
    'type' => 'text',
    'label' => null,
    'name' => null,
    'id' => null,
])

@php
    $inputId = $id ?? $name ?? 'input-'.uniqid();
@endphp

<div {{ $attributes->only('class')->merge(['class' => 'w-full']) }}>
    @if ($label)
        <label for="{{ $inputId }}" class="mb-2 block font-mono text-xs uppercase tracking-widest text-neutral-500">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        id="{{ $inputId }}"
        @if ($name) name="{{ $name }}" @endif
        {{ $attributes->except('class')->merge([
            'class' => 'w-full border-0 border-b-2 border-brand bg-transparent px-3 py-2 font-mono text-sm text-foreground placeholder:text-neutral-500 focus-visible:bg-neutral-100 focus-visible:outline-none min-h-[44px]',
        ]) }}
    >
</div>
