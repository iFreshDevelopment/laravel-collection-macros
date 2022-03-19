<?php

namespace Tests\Unit\Types;

use Illuminate\Support\Collection;
use Tests\TestCase;

class DoublesTest extends TestCase
{
    /** @test */
    public function it_registers_the_doubles_macro_on_collections()
    {
        $this->assertTrue(Collection::hasMacro('doubles'));
    }

    /** @test */
    function it_returns_all_strings_from_the_collection()
    {
        $input = new Collection([
            1.2, 'a', 'b',-1, 0, 1, 3, ['array'], new \stdClass()
        ]);

        $result = $input->doubles();

        $this->assertEquals(
            new Collection([1.2]),
            $result
        );
    }
}