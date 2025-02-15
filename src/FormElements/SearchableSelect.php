<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class SearchableSelect
{
    public function render($name, $options, $class = 'col-span-12')
    {
        $optionsHtml = '';
        foreach ($options as $value => $text) {
            $optionsHtml .= "<li data-value=\"{$value}\" class=\"p-2 cursor-pointer hover:bg-gray-200\">{$text}</li>";
        }

        $uniqueId = uniqid($name . '_');

        return "
        <fieldset class=\"mb-4 {$class}\">
            <legend class=\"text-lg font-semibold\">Select an option</legend>
            <div class=\"relative\">
                <input type=\"text\" id=\"search-{$uniqueId}\" placeholder=\"Search...\" class=\"border rounded p-2 w-full\" onfocus=\"this.nextElementSibling.style.display='block'\" oninput=\"filterOptions(this)\">
                <ul id=\"options-{$uniqueId}\" class=\"absolute z-10 w-full h-64 overflow-y-scroll p-2 mt-1 bg-white border border-gray-300 rounded shadow-lg hidden\">
                    {$optionsHtml}
                </ul>
            </div>
        </fieldset>";
    }
}
