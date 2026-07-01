@props([
    'activeAccordion' => null,
    'accordionId' => null,
    'isIsolated' => false,
    'icon' => null,
    'label' => '',
    'badge' => null,
    'badgeColor' => null,
    'iteration' => 1,
])
@php
    $id = $accordionId ?? uniqid('accordion-', true);
@endphp
<div
    x-data="{
        id: @js($id),
        @if($isIsolated) activeAccordion: @js($activeAccordion), @endif
    }"
    x-on:expand="activeAccordion = id"
    :class="{
        'bg-gray-100 dark:bg-gray-800': activeAccordion == id,
        'bg-white dark:bg-gray-900': activeAccordion != id,
        'zeus-accordion-container zeus-accordion-container-{{ $iteration }} group first:rounded-t-xl last:rounded-b-xl': true
    }"
>
    <button
        type="button"
        @click="setActiveAccordion(id)"
        class="zeus-accordion-btn zeus-accordion-btn-{{ $iteration }} flex items-center justify-between w-full text-start select-none"
    >
        <div
            :class="{
                'px-4 py-4 flex font-medium items-center justify-center text-gray-500 group-hover:text-primary-600 gap-2': true ,
                'text-primary-600 dark:text-primary-500': activeAccordion == id ,
                'text-gray-500 dark:text-white/70': activeAccordion != id
            }"
        >
            @if ($icon !== null)
                <x-filament::icon
                    :icon="$icon"
                    class="h-5 w-5 hover:text-primary-600"
                />
            @endif

            {{ $label }}

            @if (filled($badge))
                <x-filament::badge :color="$badgeColor" size="sm" class="w-max">
                    {{ $badge }}
                </x-filament::badge>
            @endif
        </div>
        <span
            :class="{
                'rotate-180': activeAccordion == id,
                'me-3 duration-200 ease-out': true,
            }"
        >
            @svg('heroicon-m-chevron-down', 'w-4 h-4')
        </span>
    </button>
    <div x-show="activeAccordion == id" x-collapse x-cloak>
        <div class="p-4 bg-white dark:bg-gray-900">{{ $slot }}</div>
    </div>
</div>
