<?php

namespace Tests\Unit\Number;

use Illuminate\Support\Collection;
use Tests\TestCase;

class GreaterThanTest extends TestCase
{
    /** @test */
    function it_registers_the_greater_than_macro_on_collections()
    {
        $this->assertTrue(
            Collection::hasMacro('greaterThan')
        );
    }

    /** @test */
    function it_returns_numbers_greater_than_the_threshold()
    {
        $input = new Collection([40, 30, 20, 10]);

        $output = $input->greaterThan(25);

        $this->assertEquals(new Collection([40, 30]), $output);
    }

    /** @test */
    function it_returns_an_empty_collection_when_nothing_passes_the_test()
    {
        $input = new Collection([10, 20, 30, 40]);

        $output = $input->greaterThan(50);

        $this->assertEquals(new Collection(), $output);
    }

    /** @test */
    function it_excludes_non_numerical_values()
    {
        $input = new Collection([40, 30, 20, 10, 'foo']);

        $output = $input->greaterThan(25);

        $this->assertEquals(new Collection([40, 30]), $output);
    }
}