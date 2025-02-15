<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class HiddenInput
{
    public function render($name, $value)
    {
        return "<input type=\"hidden\" name=\"{$name}\" value=\"{$value}\">";
    }
}
