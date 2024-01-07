<div
    wire:ignore.self
    x-cloak
    {{
        $attributes
            ->merge([
                'id' => $getId(),
                'wire:key' => "{$this->getId()}.{$getStatePath()}." . Accordions::class . '.container',
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)
            ->merge($getExtraAlpineAttributes(), escape: false)
            ->class([
                'fi-fo-accordions rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10',
            ])
    }}
>

    @php
        $isIsolated = $isIsolated();
        $getActiveAccordion = $getActiveAccordion();
    @endphp

    <div x-data="{
                    activeAccordion: 'accordion-{{ $getActiveAccordion }}',
                    setActiveAccordion(id) {
                        this.activeAccordion = (this.activeAccordion == id) ? '' : id
                    }
                }"
         class="relative w-full mx-auto overflow-hidden text-sm divide-y divide-gray-200 dark:divide-white/5 rounded-xl"
    >
        @foreach ($getChildComponentContainer()->getComponents() as $accordion)
            <div
                x-data="{
                    id: $id('accordion'),
                    @if($isIsolated) activeAccordion: 'accordion-{{ $getActiveAccordion }}', @endif
                }"
                 class="cursor-pointer group">
                <button
                    type="button"
                    @click="setActiveAccordion(id)"
                    :class="{ 'bg-gray-100 dark:bg-gray-800': activeAccordion == id }"
                    class="flex items-center justify-between w-full p-4 text-start select-none"
                >
                    <span
                        :class="{
                                'text-custom-600': activeAccordion == id ,
                                'text-gray-500': activeAccordion != id
                            }"
                        class="flex gap-2 font-medium items-center justify-center text-gray-500 group-hover:text-custom-600">
                        @if ($accordion->getIcon())
                            <x-filament::icon
                                :icon="$accordion->getIcon()"
                                class="fi-accordion-item-icon h-6 w-6 shrink-0 transition duration-75"
                            />
                        @endif
                        {{ $accordion->getLabel() }}
                    </span>
                    <span :class="{ 'rotate-180': activeAccordion == id }">
                        @svg('heroicon-c-chevron-down','w-4 h-4 duration-200 ease-out')
                    </span>
                </button>
                <div x-show="activeAccordion == id" x-collapse x-cloak>
                    {{ $accordion }}
                </div>
            </div>
        @endforeach
    </div>
</div>
