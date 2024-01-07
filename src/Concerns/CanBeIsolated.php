<?php

namespace LaraZeus\Accordion\Concerns;

use Closure;

trait CanBeIsolated
{
    protected bool | Closure $isIsolated = false;

    public function isolated(bool | Closure $condition = true): static
    {
        $this->isIsolated = $condition;

        return $this;
    }

    public function isIsolated(): bool
    {
        return $this->evaluate($this->isIsolated);
    }
}
