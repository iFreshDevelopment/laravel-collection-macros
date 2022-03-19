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
            'toUpper' => \IFresh\Collection\Macro\String\ToUpper::class,
            'toLower' => \IFresh\Collection\Macro\String\ToLower::class,
            'multiply' => \IFresh\Collection\Macro\Number\Multiply::class,
            'lessThan' => \IFresh\Collection\Macro\Number\LessThan::class,
            'greaterThan' => \IFresh\Collection\Macro\Number\GreaterThan::class,
            'integers' => \IFresh\Collection\Macro\Types\Integers::class,
            'strings' => \IFresh\Collection\Macro\Types\Strings::class,
            'doubles' => \IFresh\Collection\Macro\Types\Doubles::class,
        ];
    }
}