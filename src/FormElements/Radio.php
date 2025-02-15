<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class Radio
{
    public function render($name, $options, $class = 'col-span-12')
    {
        $radioButtons = "<fieldset class=\"mb-4 {$class}\"><legend class=\"text-lg font-semibold\">Select an option</legend>";
        foreach ($options as $value => $text) {
            $radioButtons .= "<label class=\"inline-flex items-center mr-4\"><input type=\"radio\" name=\"{$name}\" value=\"{$value}\" class=\"form-radio mr-1\"> {$text}</label>";
        }
        $radioButtons .= "</fieldset>";
        return $radioButtons;
    }
}
