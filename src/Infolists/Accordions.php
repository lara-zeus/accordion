<?php

namespace LaraZeus\Accordion\Infolists;

use Closure;
use Filament\Schemas\Components\Tabs;
use LaraZeus\Accordion\Concerns\CanBeIsolated;

class Accordions extends Tabs
{
    use CanBeIsolated;

    protected string $view = 'zeus-accordion::forms.accordions';

    protected int | Closure $activeAccordion = 1;

    public function activeAccordion(int | Closure $activeAccordion): static
    {
        $this->activeAccordion = $activeAccordion;

        return $this;
    }

    public function getActiveAccordion(): int
    {
        return $this->evaluate($this->activeAccordion);
    }

    public function accordions(array | Closure $accordions): static
    {
        $this->childComponents($accordions);

        return $this;
    }
}
