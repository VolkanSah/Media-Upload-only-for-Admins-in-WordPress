# Wordpress-upload-control

```php
<?php /**
 * Plugin Name:       Upload only for admins
 * Plugin URI:        http://wordpress-webmaster.de
 * Description:       Uploads only for admins!
 * Version:           1.0.0
 * Author:            Volkan Sah 
 * Author URI:        http://wordpress-webmaster.de/
 * License:           GPL3+
 */
  if ( ! defined( 'WPINC' ) ) {
	die;
	}
 media_upload_only_for_admin( $file ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        $file['error'] = 'You can\'t upload images without admin privileges!';
    }
    return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'media_upload_only_for_admin' );

```
