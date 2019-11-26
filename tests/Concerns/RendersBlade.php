<?php

namespace Stephenjude\PaystackLite\Tests\Concerns;

trait RendersBlade
{
    /**
     * Compile blade markup into PHP code.
     *
     * @param string $blade_directive blade markup
     * @return string
     */
    protected function compileBlade($blade_directive)
    {
        return app('blade.compiler')->compileString($blade_directive);
    }

    /**
     * Format a value as a string matching its primitive PHP syntax so it can be used
     * in generated PHP code.
     *
     * @param mixed $value
     * @return string
     */
    protected function stringify($value)
    {
        if (is_null($value)) {
            return 'null';
        }
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (is_string($value)) {
            if (strpos($value, 'MessageBag') !== false) { //is a new MessageBag object
                return $value;
            }

            return '"'.$value.'"';
        }

        return (string) $value;
    }

    /**
     * Execute PHP code and return the output.
     *
     * @param string $php_code
     * @return string
     */
    protected function getCodeOutput($php_code)
    {
        ob_start();

        // emulate variable shared with all views
        $__env = app('view');

        eval('?>'.$php_code);
        $output = ob_get_contents();

        ob_end_clean();

        return $output;
    }

    /**
     * Render blade markup to HTML.
     *
     * Output is trimmed.
     *
     * @param string $blade_directive blade markup
     * @return string
     */
    protected function renderBlade($blade_directive)
    {
        return trim($this->getCodeOutput($this->compileBlade($blade_directive)));
    }
}
