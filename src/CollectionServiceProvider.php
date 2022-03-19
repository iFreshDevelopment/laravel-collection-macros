<?php

namespace IFresh\Collection;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CollectionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Collection::make($this->macros())
            ->reject(fn ($class, $macro) => Collection::hasMacro($macro))
            ->each(fn ($class, $macro) => Collection::macro($macro, app($class)()));
    }

    /**
     * @return array<string, class-string>
     */
    private function macros(): array
    {
        return [
            'toUpper' => Macro\String\ToUpper::class,
            'toLower' => Macro\String\ToLower::class,
            'multiply' => Macro\Number\Multiply::class,
            'lessThan' => Macro\Number\LessThan::class,
            'greaterThan' => Macro\Number\GreaterThan::class,
            'integers' => Macro\Types\Integers::class,
        ];
    }
}