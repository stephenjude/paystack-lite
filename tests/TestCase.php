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
     * @param string $expectedHtml
     * @param string $viewContent blade markup
     * @param array $viewData
     * @return void
     */
    protected function assertBladeRenders($expectedHtml, $viewContent, $viewData = [])
    {
        $this->assertEquals($expectedHtml, $this->renderBlade($viewContent, $viewData));
    }
}
