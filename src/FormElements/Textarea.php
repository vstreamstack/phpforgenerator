<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class Textarea
{
    public function render($name, $placeholder = '', $class = 'col-span-12')
    {
        return "<fieldset class=\"mb-4 {$class}\"><legend class=\"text-lg font-semibold\">{$placeholder}</legend><textarea name=\"{$name}\" placeholder=\"{$placeholder}\" class=\"border rounded p-2 w-full\"></textarea></fieldset>";
    }
}
