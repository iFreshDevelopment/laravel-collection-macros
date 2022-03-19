<?php

namespace Tests\Unit\Number;

use Illuminate\Support\Collection;
use Tests\TestCase;

class LessThanTest extends TestCase
{
    /** @test */
    function it_registers_the_less_than_macro_on_collections()
    {
        $this->assertTrue(
            Collection::hasMacro('lessThan')
        );
    }

    /** @test */
    function it_returns_numbers_less_than_the_threshold()
    {
        $input = new Collection([10, 20, 30, 40]);

        $output = $input->lessThan(25);

        $this->assertEquals(new Collection([10, 20]), $output);
    }

    /** @test */
    function it_returns_an_empty_collection_when_nothing_passes_the_test()
    {
        $input = new Collection([10, 20, 30, 40]);

        $output = $input->lessThan(5);

        $this->assertEquals(new Collection(), $output);
    }

    // @todo: mooiere naam bedenken
    /** @test */
    function it_flikkers_away_non_numerical_values()
    {
        $input = new Collection([10, 20, 30, 40, 'foo']);

        $output = $input->lessThan(25);

        $this->assertEquals(new Collection([10, 20]), $output);
    }
}