---
title: Installation
weight: 3
---

## Installation

Install @zeus Accordion by running the following commands in your Laravel project directory.

```bash
composer require lara-zeus/accordion
```

## theme

add this path to your tailwind config file in the `content` array

```js
'./vendor/lara-zeus/accordion/resources/views/**/*.blade.php',
```

## Usage:

### use it in your form:

```php
Accordions::make('Options')
    ->activeAccordion(2)
    ->isolated()

    ->accordions([
        \LaraZeus\Accordion\Forms\Accordion::make('main-data')
            ->columns()
            ->label('User Details')
            ->icon('iconpark-commentone')
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
            ]),
    ]),
,
```