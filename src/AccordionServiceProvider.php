<?php

namespace LaraZeus\Accordion;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AccordionServiceProvider extends PackageServiceProvider
{
    public static string $name = 'zeus-accordion';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews();
    }
}
