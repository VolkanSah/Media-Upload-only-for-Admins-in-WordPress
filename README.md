# Media Upload only for "Admins" in WordPress

This code snippet provides a custom function for WordPress that restricts file uploads on the website to administrators or users with the appropriate permissions. This can help prevent unauthorized users from uploading malicious files or using your website for nefarious purposes, such as preparing for a crime with NFTs.

## Function Explanation
```php
if ( ! defined( 'WPINC' ) ) {
    die;
}

function media_upload_only_for_admin( $file ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        $file['error'] = 'You can\'t upload images without admin privileges!';
    }
    return $file;
}

add_filter( 'wp_handle_upload_prefilter', 'media_upload_only_for_admin' );
```

- The custom function media_upload_only_for_admin checks if the current user has the capability to manage_options, which is usually associated with administrators. If they do not have the required capability, an error message is added to the $file array, preventing the file upload.

- The add_filter() function hooks the custom function to the wp_handle_upload_prefilter filter, which is triggered before a file is uploaded to the WordPress media library.

## Why Use This Function?
By implementing this function, you can:

- Enhance the security of your WordPress website by preventing unauthorized file uploads.
- Protect your website from being used for illegal activities, such as preparing for a crime with NFTs. (Thats is the reason for this readme! I cach them today for harming good humans (Websites who helps children) :smile:
- Ensure that only users with the appropriate permissions can upload files, maintaining control over the content hosted on your website.
To use this function, simply add the code snippet to your theme's functions.php file or create a custom plugin to include it.

Plugin example: 
```php
<?php /**
 * @wordpress-plugin
 * Plugin Name:       Upload only for Admins!
 * Plugin URI:        http://wordpress-webmaster.de
 * Description:       Simple hooks for WordPress - Allow uploads only for Admins!
 * Version:           1.0.0
 * Author:            Volkan Sah 
 * Author URI:        http://volkansah.github.com
 * License:           GPL3+
 * License URI:       http://volkansah.github.com
 */
if ( ! defined( 'WPINC' ) ) {
	die;
	}
function media_upload_only_for_admin( $file ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        $file['error'] = 'You can\'t upload images without admin privileges!';
    }
    return $file;
}

add_filter( 'wp_handle_upload_prefilter', 'media_upload_only_for_admin' );
```


Note: Always make a backup of your website before making changes to the code and test the functionality in a staging environment to ensure it works as expected.

### Thank you for your support!
- If you appreciate my work, please consider [becoming a 'Sponsor'](https://github.com/sponsors/volkansah), giving a :star: to my projects, or following me. 
### Credits
- [VolkanSah on Github](https://github.com/volkansah)
- [Developer Site](https://volkansah.github.io)

### License
This project is licensed under the MIT - see the [LICENSE](LICENSE) file for details.



