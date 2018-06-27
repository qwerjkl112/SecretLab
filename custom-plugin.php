<?php 

/**
  * @package custom-plugin
  */

/*
Plugin Name: Sample Plugin
Description: first plugin
Version: 1.0.0
Author: Frank
Text Domain: custom-plugin
*/

if (! defined( 'ABSPATH')){
	die;
}

function activate() {

	global $wpdb;

    $table_name = $wpdb->prefix . "profiles";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` varchar(3) CHARACTER SET utf8 NOT NULL,
            `name` varchar(50) CHARACTER SET utf8 NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);

}

//activation 
register_activation_hook( __FILE__ , 'activate');

//sets up other necessary files
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'profiles-list.php');
require_once(ROOTDIR . 'profile-database.php');
require_once(ROOTDIR . 'profiles-create.php');
require_once(ROOTDIR . 'profile-page.php');
require_once(ROOTDIR . 'profile-login.php');
require_once(ROOTDIR . 'register-modal.php');
require_once(ROOTDIR . 'login-action.php');
require_once(ROOTDIR . 'profile-logout.php');
require_once(ROOTDIR . 'connections.php');
require_once(ROOTDIR . 'potential-connection.php');
require_once(ROOTDIR . 'profile-connection.php');
require_once(ROOTDIR . 'connection-details.php');
require_once(ROOTDIR . 'register-confirmation.php');
require_once(ROOTDIR . 'admin.php');
// require_once(ROOTDIR . 'schools-update.php');