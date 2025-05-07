@props([
    'activeAccordion' => 1,
])
<div
    x-data="{
        activeAccordion: 'accordion-{{ $activeAccordion }}',
        setActiveAccordion(id) {
            this.activeAccordion = (this.activeAccordion == id) ? '' : id
        }
    }"
    class="zeus-accordion"
>
    <div class="zeus-accordion-container">
        {{ $slot }}
    </div>
</div>