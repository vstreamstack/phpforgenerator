<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class SelectAjax
{
    public function render($name, $apiEndpoint, $itemsKey = 'items', $textKey = 'id', $valueKey = 'value', $placeholder = 'Search...', $class = 'col-span-12')
    {
        $uniqueId = uniqid($name . '_');
        return "
        <fieldset class=\"mb-4 {$class}\">
            <legend class=\"text-lg font-semibold\">{$placeholder}</legend>
            <div class=\"relative\">
                <input type=\"text\" id=\"search-{$uniqueId}\" placeholder=\"{$placeholder}\" class=\"border rounded p-2 w-full\" oninput=\"fetchOptions('{$uniqueId}', '{$apiEndpoint}', '{$itemsKey}', '{$textKey}', '{$valueKey}')\">
                <ul id=\"options-{$uniqueId}\" class=\"absolute z-10 w-full p-2 mt-1 bg-white border border-gray-300 rounded shadow-lg hidden\"></ul>
            </div>
        </fieldset>";
    }
}
