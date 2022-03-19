<?php

namespace Tests\Unit\String;

use Illuminate\Support\Collection;
use Tests\TestCase;

class ToLowerTest extends TestCase
{
    /** @test */
    public function it_registers_the_to_lower_macro_on_collections()
    {
        $this->assertTrue(Collection::hasMacro('toLower'));
    }

    /** @test */
    function it_transforms_uppercase_strings_to_lowercase()
    {
        $input = new Collection([
            'A', 'B', 'C'
        ]);

        $result = $input->toLower();

        $this->assertEquals(
            new Collection(['a','b','c']),
            $result
        );
    }

    /** @test */
    function it_transforms_only_strings_to_lowercase()
    {
        $input = new Collection(['A', 'B', 1, 2]);

        $result = $input->toLower();

        $this->assertEquals(
            new Collection(['a', 'b', 1, 2]),
            $result
        );
    }
}