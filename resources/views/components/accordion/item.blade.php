@props([
    'activeAccordion' => 1,
    'isIsolated' => false,
    'icon' => null,
    'label' => '',
    'badge' => null,
    'badgeColor' => null,
])
<div
    x-data="{
        id: $id('accordion'),
        @if($isIsolated) activeAccordion: 'accordion-{{ $activeAccordion }}', @endif
    }"
    :x-on:form-validation-error.window="
        $nextTick(() => {
            let error = $el.querySelector('[data-validation-error]')
            if (! error) {
                return
            }
            setActiveAccordion($id('accordion'));
        })
    "
    :class="{
        'bg-gray-100 dark:bg-gray-800': activeAccordion == id,
        'bg-white dark:bg-gray-900': activeAccordion != id,
        'group first:rounded-t-xl last:rounded-b-xl': true
     }"
>
    <button
        type="button"
        @click="setActiveAccordion(id)"
        class="flex items-center justify-between w-full text-start select-none"
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
