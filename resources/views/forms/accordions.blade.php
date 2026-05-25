@php
    $isIsolated = $isIsolated();
    $activeAccordion = $getActiveAccordion();
@endphp
<div
    wire:ignore.self
    x-cloak
    {{
        $attributes
            ->merge([
                'id' => $getId(),
                'wire:key' => "{$this->getId()}.{$getStatePath()}." . 'accordions.container',
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)
            ->merge($getExtraAlpineAttributes(), escape: false)
    }}
>
    @php
        $accordions = $getChildComponentContainer()->getComponents();
        $activeAccordionId = null;
        
        $index = 1;
        foreach ($accordions as $accordion) {
            if ($index === $activeAccordion) {
                $activeAccordionId = $accordion->getId();
                break;
            }
            $index++;
        }
    @endphp

    <x-zeus-accordion::accordion :activeAccordion="$activeAccordionId">
        @foreach ($accordions as $accordion)
            <x-zeus-accordion::accordion.item
                :label="$accordion->getLabel()"
                :icon="$accordion->getIcon()"
                :badge="$accordion->getBadge()"
                :badge-color="$accordion->getBadgeColor()"
                :isIsolated="$isIsolated"
                :activeAccordion="$activeAccordionId"
                :accordionId="$accordion->getId()"
            >
                {{ $accordion }}
            </x-zeus-accordion::accordion.item>
        @endforeach
    </x-zeus-accordion::accordion>
</div>
