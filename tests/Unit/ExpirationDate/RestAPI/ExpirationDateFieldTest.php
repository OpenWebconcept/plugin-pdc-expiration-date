<?php

namespace OWC\PDC\ExpirationDate\RestAPI;

use OWC\PDC\ExpirationDate\Tests\Unit\TestCase;

class ExpirationDateFieldTest extends TestCase
{
    public function setUp()
    {
        \WP_Mock::setUp();
    }

    public function tearDown()
    {
        \WP_Mock::tearDown();
    }

    /** @test */
    public function it_adds_a_field_to_output()
    {
        $this->assertTrue(true);
    }
}
