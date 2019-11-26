<?php

namespace Stephenjude\PaystackLite\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Stephenjude\PaystackLite\Tests\Concerns\RendersBlade;
use Stephenjude\PaystackLite\Tests\Concerns\CreatesApplication;

class TestCase extends BaseTestCase
{
    use CreatesApplication, RendersBlade;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Assert that blade markup and view data render HTML markup.
     *
     * @param string $expected_html
     * @param string $blade_directive blade markup
     * @return void
     */
    protected function assertBladeRenders($expected_html, $blade_directive)
    {
        $this->assertEquals($expected_html, $this->renderBlade($blade_directive));
    }
}
