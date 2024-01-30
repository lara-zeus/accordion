<?php

namespace LaraZeus\Accordion\Infolists;

use Closure;
use Filament\Infolists\Components\Component;
use Filament\Support\Concerns;
use LaraZeus\Accordion\Concerns\CanBeIsolated;

class Accordions extends Component
{
    use CanBeIsolated;
    use Concerns\HasExtraAlpineAttributes;

    protected string $view = 'zeus-accordion::infolists.accordions';

    protected int | Closure $activeAccordion = 1;

    final public function __construct(?string $label = null)
    {
        $this->label($label);
    }

    public static function make(?string $label = null): static
    {
        $static = app(static::class, ['label' => $label]);
        $static->configure();

        return $static;
    }

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
