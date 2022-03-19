<?php

namespace IFresh\Collection\Macro\Number;

/**
 * @mixin \Illuminate\Support\Collection
 */
class GreaterThan
{
    public function __invoke(): callable
    {
        return function($minimalValue){
            $numbers = $this->filter(function ($value) {
                return is_integer($value) || is_double($value);
            });

            return $numbers->filter(function($value) use ($minimalValue) {
                return $value > $minimalValue;
            });
        };
    }
}