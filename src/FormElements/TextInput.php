<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class TextInput
{
    public function render($name, $placeholder = '', $class = 'col-span-12')
    {
        return "<fieldset class=\"mb-4 {$class}\"><legend class=\"text-lg font-semibold\">{$placeholder}</legend><input type=\"text\" name=\"{$name}\" placeholder=\"{$placeholder}\" class=\"border rounded p-2 w-full\"></fieldset>";
    }
}
