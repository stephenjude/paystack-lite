<?php

namespace Stephenjude\PaystackLite\Tests\Concerns;

trait RendersBlade
{
    /**
     * Compile blade markup into PHP code.
     *
     * @param string $viewContent blade markup
     * @param array $viewData
     * @return string
     */
    protected function compileBlade($viewContent, $viewData = [])
    {
        return app('blade.compiler')->compileString($viewContent);
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
     * @param string $phpCode
     * @return string
     */
    protected function getCodeOutput($phpCode)
    {
        ob_start();

        // emulate variable shared with all views
        $__env = app('view');

        eval('?>'.$phpCode);
        $output = ob_get_contents();

        ob_end_clean();

        return $output;
    }

    /**
     * Render blade markup to HTML.
     *
     * Output is trimmed.
     *
     * @param string $viewContent blade markup
     * @param array $viewData
     * @return string
     */
    protected function renderBlade($viewContent, $viewData = [])
    {
        return trim($this->getCodeOutput($this->compileBlade($viewContent, $viewData)));
    }
}
