---
name: zeus-accordion
description: Use when grouping Filament form fields, infolist entries, or Blade content into collapsible accordions with lara-zeus/accordion.
---

# Lara Zeus Accordion

## Overview & Requirements
`lara-zeus/accordion` provides collapsible `Accordions` / `Accordion` layout components for Filament Forms and Infolists, plus standalone `<x-zeus-accordion::accordion>` Blade components powered by Alpine.js.
- **PHP**: `^8.1`
- **Filament**: `^5.0`
- **Dependencies**: `spatie/laravel-package-tools ^1.19`
- **Package Name**: `lara-zeus/accordion` (Service Provider: `LaraZeus\Accordion\AccordionServiceProvider`)

## Installation
```bash
composer require lara-zeus/accordion
```

## Configuration & Migrations
No migrations or configuration files are published by this package.

Include the package views in your Tailwind CSS / Filament theme configuration so styles compile:
```js
// tailwind.config.js (v3)
'./vendor/lara-zeus/accordion/resources/views/**/*.blade.php',
```
```css
/* Tailwind v4 theme CSS */
@source '../../../../vendor/lara-zeus/accordion/resources/views/**/*.blade.php';
```

## Filament Panel Registration
No panel plugin registration is required. Use the components directly in Filament schemas or Blade views.

## Core Usage & Examples

### In Filament Forms
```php
use Filament\Forms\Components\TextInput;
use LaraZeus\Accordion\Forms\Accordion;
use LaraZeus\Accordion\Forms\Accordions;

Accordions::make('Options')
    ->activeAccordion(2) // 1-based index (default: 1)
    ->isolated() // allow items to open/close independently
    ->accordions([
        Accordion::make('main-data')
            ->columns()
            ->label('User Details')
            ->icon('heroicon-o-user')
            ->badge('New')
            ->badgeColor('info')
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
            ]),
    ]);
```

### In Filament Infolists
```php
use Filament\Infolists\Components\TextEntry;
use LaraZeus\Accordion\Infolists\Accordion;
use LaraZeus\Accordion\Infolists\Accordions;

Accordions::make('Details')
    ->activeAccordion(1)
    ->isolated()
    ->accordions([
        Accordion::make('summary')
            ->columns()
            ->label('User Details')
            ->icon('heroicon-o-user')
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('email'),
            ]),
    ]);
```

### Standalone Blade Component
```blade
<x-zeus-accordion::accordion :activeAccordion="'item-1'">
    <x-zeus-accordion::accordion.item
        accordionId="item-1"
        :isIsolated="true"
        :label="__('Title')"
        icon="heroicon-o-chevron-right"
        badge="New Item"
        badgeColor="danger"
    >
        <p>Accordion content</p>
    </x-zeus-accordion::accordion.item>
</x-zeus-accordion::accordion>
```

## Common Pitfalls / Anti-Patterns
- **Zero-based `activeAccordion()`**: `Accordions::activeAccordion()` matches `$loop->iteration` starting at `1`; passing `0` leaves all panels collapsed.
- **Confusing `activeAccordion` prop in Blade vs PHP**: In `Accordions::make()`, `activeAccordion()` takes a 1-based `int`; in `<x-zeus-accordion::accordion>`, the `:activeAccordion` prop expects the matching `accordionId` string.
- **Missing `@source` / Tailwind `content` path**: Without scanning `vendor/lara-zeus/accordion/resources/views/**/*.blade.php`, container padding, borders, and dark-mode styles will be missing.
