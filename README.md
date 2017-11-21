# SilverWare IconSetField Module

[![Latest Stable Version](https://poser.pugx.org/silverware/iconsetfield/v/stable)](https://packagist.org/packages/silverware/iconsetfield)
[![Latest Unstable Version](https://poser.pugx.org/silverware/iconsetfield/v/unstable)](https://packagist.org/packages/silverware/iconsetfield)
[![License](https://poser.pugx.org/silverware/iconsetfield/license)](https://packagist.org/packages/silverware/iconsetfield)

A responsive form field for [SilverStripe v4][silverstripe-framework], similar to CheckboxSetField... but with icons!

![IconSetField](https://i.imgur.com/9qGL9fF.gif)

## Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Issues](#issues)
- [Contribution](#contribution)
- [Attribution](#attribution)
- [Maintainers](#maintainers)
- [License](#license)

## Requirements

- [SilverStripe Framework v4][silverstripe-framework]
- [SilverWare Font Icons][silverware-font-icons] (includes [Font Awesome][font-awesome])
- default CSS classes are configured for the [Bootstrap][bootstrap] grid

## Installation

Installation is via [Composer][composer]:

```
$ composer require silverware/iconsetfield
```

**Note:** forms on the website will automatically load the field requirements if
the app is using [SilverWare][silverware]. If you are using a vanilla SilverStripe
project, you'll need to load the module script and styles in your app bundle
(jQuery is required):

- `silverware/iconsetfield: client/dist/js/bundle.js`
- `silverware/iconsetfield: client/dist/styles/bundle.css`

## Configuration

As with all SilverStripe modules, configuration is via YAML. Extensions to `LeftAndMain` and
`ContentController` are applied via `config.yml`.

### Theme

The module supports a theme for both the CMS and forms on the website. To
define the theme, use the following YAML configuration:

```yml
# Custom theme for CMS:

SilverStripe\Admin\LeftAndMain:
  iconsetfield_theme:
    hover-background: '<color>'
    hover-foreground: '<color>'
    checked-background: '<color>'
    checked-foreground: '<color>'
    checked-border: '<color>'

# Custom theme for website forms:

SilverStripe\CMS\Controllers\ContentController:
  iconsetfield_theme:
    hover-background: '<color>'
    hover-foreground: '<color>'
    checked-background: '<color>'
    checked-foreground: '<color>'
    checked-border: '<color>'
```

Replace each `<color>` with your desired color hex or rgba code.

### Columns

By default, the field uses Bootstrap column classes. You can change
the column classes by adding them to your YAML:

```yml
SilverWare\IconSetField\Forms\IconSetField:
  column_class_small: 'col-sm-%d'
  column_class_large: 'col-lg-%d'
```

## Usage

Create the field either as part of a `Form`, or within your `getCMSFields()` method:

```php
use SilverWare\IconSetField\Forms\IconSetField;

$field = IconSetField::create(
    'RelationName',
    'Title of field',
    [
        1 => [
            'icon' => 'envelope',
            'text' => 'Mail'
        ],
        2 => [
            'icon' => 'facebook',
            'text' => 'Facebook'
        ],
        3 => [
            'icon' => 'twitter',
            'text' => 'Twitter'
        ]
    ]
);
```

The first parameter is the name of the field or many-many relation to save to, and the
second is the field title.  The third parameter defines the source for the field,
and is a nested array consisting of ID values mapped to arrays containing
the icon code (i.e. `fa-<code>`) and the text for the option.

### Maximum Height

You can define a maximum height (in pixels) for your field by using the `setMaxHeight()` method:

```php
$field->setMaxHeight(200);
```

This will fix the maximum height of your field to 200 pixels, and add a scrollbar to view the
remaining options.

### Column Widths

The field supports custom column widths for small and large devices. By default,
the field uses a value of `6` for small devices, and `4` for large devices. Based
on the Bootstrap grid of `12`, this means you'll see two options per row on
small devices, and three options per row on large devices.

You can change these values by using:

```php
$field->setSmallWidth(4);  // 3 options per row on small devices
$field->setLargeWidth(3);  // 4 options per row on large devices
```

Options will always be one per row on the smallest screens (i.e. mobile).

## Issues

Please use the [GitHub issue tracker][issues] for bug reports and feature requests.

## Contribution

Your contributions are gladly welcomed to help make this project better.
Please see [contributing](CONTRIBUTING.md) for more information.

## Attribution

- Makes use of [Font Awesome][font-awesome] by [Dave Gandy](https://github.com/davegandy).
- Makes use of [Bootstrap][bootstrap] by the
  [Bootstrap Authors](https://github.com/twbs/bootstrap/graphs/contributors)
  and [Twitter, Inc](https://twitter.com).

## Maintainers

[![Colin Tucker](https://avatars3.githubusercontent.com/u/1853705?s=144)](https://github.com/colintucker) | [![Praxis Interactive](https://avatars2.githubusercontent.com/u/1782612?s=144)](http://www.praxis.net.au)
---|---
[Colin Tucker](https://github.com/colintucker) | [Praxis Interactive](http://www.praxis.net.au)

## License

[BSD-3-Clause](LICENSE.md) &copy; Praxis Interactive

[composer]: https://getcomposer.org
[silverstripe-framework]: https://github.com/silverstripe/silverstripe-framework
[silverware]: https://github.com/praxisnetau/silverware
[silverware-font-icons]: https://github.com/praxisnetau/silverware-font-icons
[font-awesome]: http://fontawesome.io
[bootstrap]: http://getbootstrap.com
[issues]: https://github.com/praxisnetau/silverware-iconsetfield/issues
