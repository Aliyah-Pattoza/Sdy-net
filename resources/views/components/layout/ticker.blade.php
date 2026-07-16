@props([
    'items' => [
        'Clarity over clutter',
        'Hierarchy is authority',
        'Print DNA, digital pace',
        'Zero radius. Full contrast.',
        'All the signal that\'s fit to print',
    ],
])

<div class="overflow-hidden border-y border-foreground bg-foreground text-background" aria-label="Edition ticker">
    <div class="ticker-track py-3 font-mono text-xs uppercase tracking-widest">
        @foreach ([1, 2] as $loopPass)
            <div class="flex shrink-0 items-center">
                @foreach ($items as $item)
                    <span class="mx-4 inline-flex items-center gap-3 whitespace-nowrap">
                        <x-ui.badge variant="accent">Live</x-ui.badge>
                        <span>{{ $item }}</span>
                        <span class="text-neutral-400" aria-hidden="true">|</span>
                    </span>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
