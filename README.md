# PHP Form Builder Library

A comprehensive PHP library for building web forms with various input types and advanced features.

## Features
- Create forms with a simple API
- Support for 15+ form element types
- Advanced components (searchable selects, AJAX selects)
- Tabbed interface support
- Grid-based layout system (Tailwind CSS classes)

## Installation

Install via Composer:

```bash
composer require mokakustudio/php-form-builder
```

## Usage

### Basic Form Creation
```php
use Mokakustudio\PhpFormBuilder\FormBuilder;

$form = new FormBuilder();
echo $form->createForm('/submit')
    ->addTextInput('name', 'Enter your name')
    ->addDateInput('birthdate')
    ->addButton('Submit')
    ->closeForm();
```

### Available Form Elements
| Element Type         | Method                     |
|----------------------|----------------------------|
| Text Input           | addTextInput()            |
| Date Input           | addDateInput()            |
| Color Input          | addColorInput()            |
| Range Input          | addRangeInput()            |
| Switcher             | addSwitcher()              |
| Button               | addButton()                |
| Checkbox             | addCheckbox()              |
| Select               | addSelect()                |
| Radio                | addRadio()                 |
| File Input           | addFileInput()             |
| Textarea             | addTextarea()              |
| Searchable Select    | addSearchableSelect()      |
| AJAX Select          | addSelectAjax()            |
| Custom HTML          | addCustomHtml()            |
| Hidden Input         | addHiddenInput()            |

### Advanced Features

#### Tabs Interface
```php
$tabs = [
    'Profile' => $form->addTextInput('name'),
    'Settings' => $form->addSwitcher('notifications', 'Enable Notifications')
];
echo $form->createTabs($tabs);
```

## Contributing
Contributions are welcome! Please follow these steps:
1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License
MIT License
