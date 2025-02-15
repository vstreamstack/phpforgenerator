<?php

namespace Mokakustudio\PhpFormBuilder\FormElements;

class FileInput
{
    public function render($name, $class = 'col-span-12')
    {
        return "<fieldset class=\"mb-4 {$class}\"><legend class=\"text-lg font-semibold\">Upload File</legend><input type=\"file\" name=\"{$name}\" class=\"border rounded p-2 w-full\"></fieldset>";
    }
}
