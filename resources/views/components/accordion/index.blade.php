@props([
    'activeAccordion' => null,
])
<div
    x-data="{
        activeAccordion: @js($activeAccordion),
        setActiveAccordion(id) {
            this.activeAccordion = (this.activeAccordion == id) ? '' : id
        }
    }"
    class="rounded-xl shadow-sm bg-white dark:bg-gray-900 ring-1 ring-gray-950/10 dark:ring-white/10 divide-y divide-gray-300 dark:divide-white/10"
>
    <div class="p-2">
        {{ $slot }}
    </div>
</div>