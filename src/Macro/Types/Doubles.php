<?php

namespace Ifresh\Collection\Macro\Types;
use Illuminate\Support\Collection;

/**
 * @mixin Collection
 */
class Doubles
{
    public function __invoke(): callable
    {
        return function() {
            return $this->filter(fn($item) => is_double($item));
        };

    }
}