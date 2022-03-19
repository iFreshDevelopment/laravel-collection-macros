<?php

namespace Tests\Unit\Types;

use Illuminate\Support\Collection;
use Tests\TestCase;

class IntegersTest extends TestCase
{
    /** @test */
    public function it_registers_the_integers_macro_on_collections()
    {
        $this->assertTrue(Collection::hasMacro('integers'));
    }

    /** @test */
    function it_returns_all_integers_from_the_collection()
    {
        $input = new Collection([
            -1, 0, 1, 3, 'a', 'b', 1.2, ['array'], new \stdClass()
        ]);

        $result = $input->integers();

        $this->assertEquals(
            new Collection([-1, 0, 1, 3]),
            $result
        );
    }
}