<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class RangeInput
{
    public function render($name, $min, $max, $step = 1, $class = 'col-span-12')
    {
        return "<fieldset class=\"mb-4 {$class}\"><legend class=\"text-lg font-semibold\">Select a value</legend><input type=\"range\" name=\"{$name}\" min=\"{$min}\" max=\"{$max}\" step=\"{$step}\" class=\"w-full\"></fieldset>";
    }
}
