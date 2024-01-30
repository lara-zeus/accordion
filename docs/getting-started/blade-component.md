---
title: Blade Component
weight: 5
---

## Accordion Blade Component

you can use accordion as a blade component in any view you want

```html
<x-zeus-accordion::accordion activeAccordion="3">
    <x-zeus-accordion::accordion.item
            :isIsolated="true"
            :label="__('title')"
            icon="heroicon-o-chevron-right"
            badge="New Item"
            badgeColor="danger"
    >
        <div class="bg-white p-4 *:py-2">
            <p>title</p>
            <p>title</p>
        </div>
    </x-zeus-accordion::accordion.item>

    <x-zeus-accordion::accordion.item
            :isIsolated="true"
            :label="__('info')"
            icon="heroicon-o-chevron-right"
    >
        <div class="bg-white p-4 *:py-2">
            <p>info</p>
            <p>info</p>
            <p>info</p>
        </div>
    </x-zeus-accordion::accordion.item>

</x-zeus-accordion::accordion>
```
