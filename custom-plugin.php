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
    $sql = "CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `phonenumber` varchar(200) DEFAULT NULL,
  `userType` int(11) NOT NULL,
  `education` varchar(255) DEFAULT NULL,
  `degree` varchar(200) DEFAULT NULL,
  `professions` varchar(255) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'Pending Review',
  `companyName` varchar(200) DEFAULT NULL,
  `jobTitle` varchar(200) DEFAULT NULL,
  `jobResponisibility` varchar(200) DEFAULT NULL,
  `interest` int(11) DEFAULT '0',
  `matchStatus` int(11) NOT NULL DEFAULT '0',
  `resource` int(11) DEFAULT NULL,
  `yearsProfession` varchar(255) DEFAULT NULL,
  `numCandidate` varchar(255) DEFAULT NULL,
  `prevJobs` varchar(255) DEFAULT NULL,
  `pursuingDegree` varchar(255) DEFAULT NULL,
  `otherInfo` varchar(255) DEFAULT NULL,
  `companyAddress` varchar(255) DEFAULT NULL,
  `employmentType` varchar(255) DEFAULT NULL,
  `otherDegree` varchar(255) DEFAULT NULL,
  `tcAffiliation` int(11) DEFAULT '4',
  `TCAffiliationBitMask` int(11) DEFAULT '0',
  `InterestsBitMask` int(11) DEFAULT '0',
  `ResourcesBitMask` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    // dbDelta($sql);

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
require_once(ROOTDIR . 'connections.php');
require_once(ROOTDIR . 'potential-connection.php');
require_once(ROOTDIR . 'profile-connection.php');
require_once(ROOTDIR . 'connection-details.php');
// require_once(ROOTDIR . 'schools-update.php');

