@php
    $wa = config('sdynet.whatsapp');
    $message = 'Halo SDY NET, saya ingin bertanya tentang layanan internet.';
    $waLink = 'https://wa.me/'.$wa.'?text='.rawurlencode($message);
@endphp

<a
    href="{{ $waLink }}"
    target="_blank"
    rel="noopener"
    class="group fixed bottom-4 right-4 z-50 inline-flex items-center gap-3 border border-foreground bg-[#25D366] px-4 py-3 font-sans text-xs font-semibold uppercase tracking-widest text-white shadow-[4px_4px_0_0_#0B1F3A] transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[6px_6px_0_0_#0B1F3A] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground focus-visible:ring-offset-2 sm:bottom-6 sm:right-6"
    aria-label="Hubungi SDY NET via WhatsApp"
>
    <x-ui.wa-icon class="h-6 w-6" />
    <span class="hidden sm:inline">Chat WhatsApp</span>
</a>
