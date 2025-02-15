<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class Switcher
{
    public function render($name, $label, $class = 'col-span-12', $checked = false)
    {
        $uniqueId = uniqid($name . '_');
        $checkedAttr = $checked ? 'checked' : '';
        $translateClass = $checked ? 'translate-x-full' : 'translate-x-0';
        $ballColor = $checked ? 'bg-green-500' : 'bg-white';

        return "
        <fieldset class=\"mb-4 {$class}\">
            <legend class=\"text-lg font-semibold\">{$label}</legend>
            <label class=\"inline-flex items-center cursor-pointer\">
                <input type=\"checkbox\" name=\"{$name}\" id=\"{$uniqueId}\" class=\"form-checkbox hidden\" {$checkedAttr} onchange=\"toggleSwitch('{$uniqueId}')\">
                <span class=\"relative\">
                    <span class=\"block w-14 h-8 bg-gray-300 rounded-full\"></span>
                    <span class=\"absolute left-1 top-1 {$ballColor} w-6 h-6 rounded-full transition-transform transform {$translateClass}\" id=\"ball-{$uniqueId}\"></span>
                </span>
            </label>
        </fieldset>";
    }
}
