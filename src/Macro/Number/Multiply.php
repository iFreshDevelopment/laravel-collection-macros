<?php

namespace IFresh\Collection\Macro\Number;

use IFresh\Collection\Exceptions\CollectionContentException;

/**
 * @mixin \Illuminate\Support\Collection
 */
class Multiply
{
    public function __invoke(): callable
    {
        return function() {
            $numbers = $this->filter(function ($value) {
                return is_integer($value) || is_double($value);
            });

            if ($numbers->count() < 2) {
                throw new CollectionContentException('At least 2 integers needed.');
            }

            return $numbers->reduce(function ($carry, $item) {
                return $carry * $item;
            }, 1);
        };
    }
}