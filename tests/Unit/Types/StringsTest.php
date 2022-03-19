<?php

namespace Tests\Unit\Types;

use Illuminate\Support\Collection;
use Tests\TestCase;

class StringsTest extends TestCase
{
    /** @test */
    public function it_registers_the_strings_macro_on_collections()
    {
        $this->assertTrue(Collection::hasMacro('strings'));
    }

    /** @test */
    function it_returns_all_strings_from_the_collection()
    {
        $input = new Collection([
            'a', 'b',-1, 0, 1, 3, 1.2, ['array'], new \stdClass()
        ]);

        $result = $input->strings();

        $this->assertEquals(
            new Collection(['a', 'b']),
            $result
        );
    }
}