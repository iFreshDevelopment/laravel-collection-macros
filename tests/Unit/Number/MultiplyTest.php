<?php

namespace Tests\Unit\Number;

use IFresh\Collection\Exceptions\CollectionContentException;
use Illuminate\Support\Collection;
use Tests\TestCase;

class MultiplyTest extends TestCase
{
    /** @test */
    function it_registers_the_multiply_macro_to_collections()
    {
        $this->assertTrue(
            Collection::hasMacro('multiply')
        );
    }
    
    /** @test */
    function it_multiplies_integers_in_a_collection()
    {
        $input = new Collection([1, 2, 3]);
        
        $output = $input->multiply();
        
        $this->assertEquals(6, $output);
    }

    /** @test */
    function it_escapes_non_doubles_and_non_integers()
    {
        $input = new Collection([1, 2, 3, 'foo']);

        $output = $input->multiply();

        $this->assertEquals(6, $output);
    }

    /** @test */
    function it_multiplies_integers_and_integers_in_a_collection()
    {
        $input = new Collection([2.5, 3]);

        $output = $input->multiply();

        $this->assertEquals(7.5, $output);
    }

    /** @test */
    function it_multiplies_doubles_in_a_collection()
    {
        $input = new Collection([1.2, 2.3, 3.4]);

        $output = $input->multiply();

        $this->assertEquals(9.384, $output);
    }

    /** @test */
    function it_throws_exception_when_less_than_two_numbers()
    {
        $this->expectException(CollectionContentException::class);

        $input = new Collection([1]);

        $input->multiply();
    }
}