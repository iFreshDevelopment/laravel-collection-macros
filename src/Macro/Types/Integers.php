<?php
namespace Ifresh\Collection\Macro\Types;
use Illuminate\Support\Collection;

/**
 * @mixin Collection
 */
class Integers
{
    public function __invoke(): callable
    {
        return function() {
            return $this->filter(fn($item) => is_integer($item));
        };

    }
}