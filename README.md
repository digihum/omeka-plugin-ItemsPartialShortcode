# omeka-plugin-ItemsPartialShortcode

This plugin extends the item shortcode to enable a new operator 'template' to specify a partial template other than 'single.php' in your theme to display the list of items.

Instructions for use:
- Copy single.php in your theme/items folder to custom-template-name.php
- Edit custom-template-name.php to make any amendments to your theme's default 'single.php'
- Use [itempartial template='custom-template-name'] along with other arguements in your shortcode use. Note, don't add .php to your template-shortcode. 