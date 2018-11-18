# BBPress integration for Sage 9 themes

This package enables BBPress integration with Sage 9 themes and Blade templates.

## Installation

Install the package **in your theme folder**:

```bash
cd wp-content/themes/your-sage-theme-folder
composer require supermundano/sage-bbpress
```

## Usage

Create `/resources/views/bbpress` folder in your theme and place there any template used by BBPress with `.blade.php` extension. This template will be loaded instead of a template from the BBPress plugin. If you want to replace particular template, please have a look into plugin folder `bbpress/templates/default/bbpress` and use same file name (and change the extension to `.blade.php`) as the original template.