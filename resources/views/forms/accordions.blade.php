@php
    $isIsolated = $isIsolated();
    $getActiveAccordion = $getActiveAccordion();
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
    <x-zeus-accordion::accordion :activeAccordion="$getActiveAccordion">
        @foreach ($getChildComponentContainer()->getComponents() as $accordion)
            <x-zeus-accordion::accordion.item
                :label="$accordion->getLabel()"
                :icon="$accordion->getIcon()"
                :badge="$accordion->getBadge()"
                :badge-color="$accordion->getBadgeColor()"
                :isIsolated="$isIsolated"
                :activeAccordion="$getActiveAccordion"
            >
                {{ $accordion }}
            </x-zeus-accordion::accordion.item>
        @endforeach
    </x-zeus-accordion::accordion>
</div>
