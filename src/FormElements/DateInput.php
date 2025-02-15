<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class DateInput
{
    public function render($name, $class = 'col-span-12')
    {
        return "<fieldset class=\"mb-4 {$class}\"><legend class=\"text-lg font-semibold\">Select a date</legend><input type=\"date\" name=\"{$name}\" class=\"border rounded p-2 w-full\"></fieldset>";
    }
}
