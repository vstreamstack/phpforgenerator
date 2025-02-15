<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class Button
{
    public function render($text, $class = 'col-span-12', $onclick = '')
    {
        return "<div class=\"mb-4 {$class}\"><button type=\"button\" class=\"bg-gray-300 rounded p-2 w-full\" onclick=\"{$onclick}\">{$text}</button></div>";
    }
}
