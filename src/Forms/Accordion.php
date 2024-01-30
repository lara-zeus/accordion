<?php

namespace LaraZeus\Accordion\Forms;

use Closure;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Contracts\CanConcealComponents;
use Filament\Support\Concerns\HasBadge;
use Filament\Support\Concerns\HasIcon;
use Illuminate\Support\Str;

class Accordion extends Component implements CanConcealComponents
{
    use HasBadge;
    use HasIcon;

    protected string $view = 'zeus-accordion::forms.accordion';

    final public function __construct(string $label)
    {
        $this->label($label);
        $this->id(Str::slug($label));
    }

    public function getId(): string
    {
        return $this->getContainer()->getParentComponent()->getId() . '-' . parent::getId() . '-accordion';
    }

    public function getColumnsConfig(): array
    {
        return $this->columns ?? $this->getContainer()->getColumnsConfig();
    }

    public function canConcealComponents(): bool
    {
        return true;
    }

    public static function make(string | Closure | null $label = null): static
    {
        $static = app(static::class, ['label' => $label]);
        $static->configure();

        return $static;
    }
}
