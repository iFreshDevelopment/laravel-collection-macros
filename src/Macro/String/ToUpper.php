<?php

namespace IFresh\Collection\Macro\String;

use Illuminate\Support\Str;


/**
 * @mixin \Illuminate\Support\Collection
 */
class ToUpper
{
    public function __invoke(): callable
    {
        return function() {
            return $this->map(function ($value) {
                if (is_string($value)) {
                    return Str::upper($value);
                }

                return $value;
            });
        };
    }
}