<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function setUp(): void
    {
        // 祖先クラスの setUp() を忘れずにコールする。
        parent::setUp();
    }
    /**
     * A basic test example.
     */
    public function testThatTrueIsTrue(): void
    {
        $this->assertTrue(true);
    }
}
