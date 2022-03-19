<?php

namespace IFresh\Collection\Macro\Number;

/**
 * @mixin \Illuminate\Support\Collection
 */
class LessThan
{
    public function __invoke(): callable
    {
        return function($maximalValue){
            $numbers = $this->filter(function ($value) {
                return is_integer($value) || is_double($value);
            });

            return $numbers->filter(function($value) use ($maximalValue) {
                return $value < $maximalValue;
            });
        };
    }
}