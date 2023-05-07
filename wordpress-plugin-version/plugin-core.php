
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
