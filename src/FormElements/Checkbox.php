<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class Checkbox
{
    public function render($name, $label, $class = 'col-span-12')
    {
        return "<fieldset class=\"mb-4 {$class}\"><legend class=\"text-lg font-semibold\">{$label}</legend><label class=\"inline-flex items-center\"><input type=\"checkbox\" name=\"{$name}\" class=\"form-checkbox mr-1\"> {$label}</label></fieldset>";
    }
}
