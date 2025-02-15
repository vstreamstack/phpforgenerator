<?php

namespace Mokakustudio\PhpFormBuilder;

use Mokakustudio\PhpFormBuilder\FormElements\TextInput;
use Mokakustudio\PhpFormBuilder\FormElements\DateInput;
use Mokakustudio\PhpFormBuilder\FormElements\ColorInput;
use Mokakustudio\PhpFormBuilder\FormElements\RangeInput;
use Mokakustudio\PhpFormBuilder\FormElements\Switcher;
use Mokakustudio\PhpFormBuilder\FormElements\Button;
use Mokakustudio\PhpFormBuilder\FormElements\Checkbox;
use Mokakustudio\PhpFormBuilder\FormElements\Select;
use Mokakustudio\PhpFormBuilder\FormElements\Radio;
use Mokakustudio\PhpFormBuilder\FormElements\FileInput;
use Mokakustudio\PhpFormBuilder\FormElements\Textarea;
use Mokakustudio\PhpFormBuilder\FormElements\SearchableSelect;
use Mokakustudio\PhpFormBuilder\FormElements\SelectAjax;
use Mokakustudio\PhpFormBuilder\FormElements\CustomHtml;
use Mokakustudio\PhpFormBuilder\FormElements\HiddenInput;

class FormBuilder
{
    public function createForm($action, $method = 'POST')
    {
        return "<form action=\"{$action}\" method=\"{$method}\" class=\"grid grid-cols-12 gap-4\">";
    }

    public function addTextInput($name, $placeholder = '', $class = 'col-span-12')
    {
        return (new TextInput())->render($name, $placeholder, $class);
    }

    public function addDateInput($name, $class = 'col-span-12')
    {
        return (new DateInput())->render($name, $class);
    }

    public function addColorInput($name, $class = 'col-span-12')
    {
        return (new ColorInput())->render($name, $class);
    }

    public function addRangeInput($name, $min, $max, $step = 1, $class = 'col-span-12')
    {
        return (new RangeInput())->render($name, $min, $max, $step, $class);
    }

    public function addSwitcher($name, $label, $class = 'col-span-12', $checked = false)
    {
        return (new Switcher())->render($name, $label, $class, $checked);
    }

    public function addButton($text, $class = 'col-span-12', $onclick = '')
    {
        return (new Button())->render($text, $class, $onclick);
    }

    public function addCheckbox($name, $label, $class = 'col-span-12')
    {
        return (new Checkbox())->render($name, $label, $class);
    }

    public function addSelect($name, $options, $class = 'col-span-12')
    {
        return (new Select())->render($name, $options, $class);
    }

    public function addRadio($name, $options, $class = 'col-span-12')
    {
        return (new Radio())->render($name, $options, $class);
    }

    public function addFileInput($name, $class = 'col-span-12')
    {
        return (new FileInput())->render($name, $class);
    }

    public function addTextarea($name, $placeholder = '', $class = 'col-span-12')
    {
        return (new Textarea())->render($name, $placeholder, $class);
    }

    public function addSearchableSelect($name, $options, $class = 'col-span-12')
    {
        return (new SearchableSelect())->render($name, $options, $class);
    }

    public function addSelectAjax($name, $apiEndpoint, $itemsKey = 'items', $textKey = 'id', $valueKey = 'value', $placeholder = 'Search...', $class = 'col-span-12')
    {
        return (new SelectAjax())->render($name, $apiEndpoint, $itemsKey, $textKey, $valueKey, $placeholder, $class);
    }

    public function addCustomHtml($html, $class = 'col-span-12')
    {
        return (new CustomHtml())->render($html, $class);
    }

    public function addHiddenInput($name, $value)
    {
        return (new HiddenInput())->render($name, $value);
    }

    public function createTabs($tabs)
    {
        $tabHeaders = '<div class="flex space-x-2 mb-4 col-span-12">';
        $tabContent = '<div class="tab-content bg-gray-50 col-span-12 -mt-6">';

        // Initialize an array to hold tab IDs for JavaScript usage
        $tabIds = [];

        foreach ($tabs as $tabName => $tabContentHtml) {
            $tabId = uniqid($tabName . '_');
            $tabIds[] = $tabId; // Collect tab IDs
            $tabHeaders .= "<button type=\"button\" class=\"tab-header px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-blue-300 focus:outline-none\" onclick=\"openTab('{$tabId}', this)\">{$tabName}</button>";
            $tabContent .= "<div id=\"{$tabId}\" class=\"tab-panel hidden p-4 border border-gray-300 rounded-lg\">{$tabContentHtml}</div>";
        }

        $tabHeaders .= '</div>';
        $tabContent .= '</div>';

        return $tabHeaders . $tabContent . FormScript::tabScript($tabIds);
    }

    public function closeForm()
    {
        return "</form>";
    }
}
