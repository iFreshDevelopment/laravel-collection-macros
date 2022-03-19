<?php

namespace Tests\Unit\String;

use Illuminate\Support\Collection;
use Tests\TestCase;

class ToUpperTest extends TestCase
{
    /** @test */
    function it_registers_the_to_upper_macro_on_collections()
    {
        $this->assertTrue(
            Collection::hasMacro('toUpper')
        );
    }

    /** @test */
    function it_transforms_lowercase_text_to_uppercase()
    {
        $input = new Collection(['a', 'b', 'c']);

        $result = $input->toUpper();

        $this->assertEquals(
            new Collection(['A', 'B', 'C']),
            $result
        );
    }

    /** @test */
    function it_transforms_only_strings_to_uppercase()
    {
        $input = new Collection(['a', 'b', 1, 2]);

        $result = $input->toUpper();

        $this->assertEquals(
            new Collection(['A', 'B', 1, 2]),
            $result
        );
    }
}
