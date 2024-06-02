
# Media Upload Only for "Admins" in WordPress

This code snippet provides a custom function for WordPress that restricts file uploads on the website to administrators or users with the appropriate permissions. This can help prevent unauthorized users from uploading malicious files or using your website for nefarious purposes.

## Table of Contents

- [Simple Function Explanation](#simple-function-explanation)
- [Why Use This Function?](#why-use-this-function)
- [Implementation](#implementation)
- [Best Practices](#best-practices)
- [Credits](#credits)
- [License](#license)

## Simple Function Explanation

```php
if ( ! defined( 'WPINC' ) ) {
    die;
}

function media_upload_only_for_admin( \$file ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        \$file['error'] = 'You can't upload images without admin privileges!';
    }
    return \$file;
}

add_filter( 'wp_handle_upload_prefilter', 'media_upload_only_for_admin' );
```

- The custom function \`media_upload_only_for_admin\` checks if the current user has the capability to \`manage_options\`, which is usually associated with administrators. If they do not have the required capability, an error message is added to the \`$file\` array, preventing the file upload.
- The \`add_filter()\` function hooks the custom function to the \`wp_handle_upload_prefilter\` filter, which is triggered before a file is uploaded to the WordPress media library.

## Why Use This Function?

By implementing this function, you can:

- Enhance the security of your WordPress website by preventing unauthorized file uploads.
- Protect your website from being used for illegal activities.
- Ensure that only users with the appropriate permissions can upload files, maintaining control over the content hosted on your website.

## Implementation

To use this function, add the code snippet to your theme's \`functions.php\` file or create a custom plugin to include it.

### Adding to \`functions.php\`

1. Open your WordPress theme directory.
2. Locate the \`functions.php\` file.
3. Add the code snippet to the end of the \`functions.php\` file.
4. Save the file.

### Creating a Custom Plugin

1. Create a new folder in the \`wp-content/plugins\` directory, e.g., \`media-upload-restrictor\`.
2. Inside this folder, create a PHP file, e.g., \`media-upload-restrictor.php\`.
3. Add the following plugin header to the top of the file:

```php
<?php
/*
Plugin Name: Media Upload Restrictor
Description: Restricts media uploads to administrators only.
Version: 1.0
Author: Volkan Sah
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

function media_upload_only_for_admin( \$file ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        \$file['error'] = 'You can't upload images without admin privileges!';
    }
    return \$file;
}

add_filter( 'wp_handle_upload_prefilter', 'media_upload_only_for_admin' );
?>
```

4. Activate the plugin through the WordPress admin dashboard.

## Best Practices

- **Backup**: Always make a backup of your website before making changes to the code.
- **Staging Environment**: Test the functionality in a staging environment to ensure it works as expected.
- **Security**: Regularly review and update your security practices to protect your WordPress site.

### Thank you for your support!

## Credits

- [VolkanSah on Github](https://github.com/volkansah)
- If you appreciate my work, give a :star: to my projects, follow me, or [become a sponsor](https://github.com/sponsors/volkansah).

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
