<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class Select
{
    public function render($name, $options, $class = 'col-span-12')
    {
        $select = "<fieldset class=\"mb-4 {$class}\"><legend class=\"text-lg font-semibold\">Select an option</legend><select name=\"{$name}\" class=\"border rounded p-2 w-full\">";
        foreach ($options as $value => $text) {
            $select .= "<option value=\"{$value}\">{$text}</option>";
        }
        $select .= "</select></fieldset>";
        return $select;
    }
}
