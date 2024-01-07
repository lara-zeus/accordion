<?php

namespace App\Forms\Components;

use App\Filament\Concerns\CanBeIsolated;
use Closure;
use Filament\Forms\Components\Component;
use Filament\Support\Concerns;

class Accordions extends Component
{
    use CanBeIsolated;
    use Concerns\HasExtraAlpineAttributes;

    protected string $view = 'forms.components.accordions';

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
