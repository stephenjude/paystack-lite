<?php

namespace Stephenjude\PaystackLite\Tests;

class DirectivesTest extends TestCase
{
    public function test_paystack_popop_directive()
    {
        $blade_directive = '@paystack';

        $expected_html_output = file_get_contents(base_path('outputs/popup_output.txt'));

        $this->assertBladeRenders($expected_html_output, $blade_directive);
    }

    public function test_paystack_embedded_directive()
    {
        $blade_directive = "@paystackEmbeded(1000, 'onPaymentCompleted', 'customer@email.com')";

        $expected_html_output = file_get_contents(base_path('outputs/embedded_output.txt'));

        $this->assertBladeRenders($expected_html_output, $blade_directive);
    }
}
