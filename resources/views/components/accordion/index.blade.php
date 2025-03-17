@props([
    'activeAccordion' => 1,
])
<div x-data="{
        activeAccordion: 'accordion-{{ $activeAccordion }}',
        setActiveAccordion(id) {
            this.activeAccordion = (this.activeAccordion == id) ? '' : id
        }
    }"
     class="fi-accordion rounded-xl shadow-sm
        bg-white dark:bg-gray-900
        ring-1 ring-gray-950/10 dark:ring-white/10
        divide-y divide-gray-300 dark:divide-white/10
      "
>
    <div class="p-2">
        {{ $slot }}
    </div>
</div>