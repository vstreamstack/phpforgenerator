<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class CustomHtml
{
    public function render($html, $class = 'col-span-12')
    {
        return "<div class=\"mb-4 {$class}\">{$html}</div>";
    }
}
