<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class ColorInput
{
    public function render($name, $class = 'col-span-12')
    {
        return "<fieldset class=\"mb-4 {$class}\"><legend class=\"text-lg font-semibold\">Select a color</legend><input type=\"color\" name=\"{$name}\" class=\"border rounded p-0\"></fieldset>";
    }
}
