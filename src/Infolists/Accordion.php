<?php

namespace LaraZeus\Accordion\Infolists;

use Closure;
use Filament\Infolists\Components\Component;
use Filament\Support\Concerns\HasBadge;
use Filament\Support\Concerns\HasIcon;
use Illuminate\Support\Str;

class Accordion extends Component
{
    use HasBadge;
    use HasIcon;

    protected string $view = 'zeus-accordion::infolists.accordion';

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

    public static function make(string | Closure | null $label = null): static
    {
        $static = app(static::class, ['label' => $label]);
        $static->configure();

        return $static;
    }
}
