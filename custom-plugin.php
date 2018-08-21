<?php 

/**
  * @package Tuesday's Children Custom Plugin
  */

/*
Plugin Name: TC Plugin
Version: 1.0.0
Author: Force For Good
Text Domain: Tuesday's Children
*/

if (! defined( 'ABSPATH')){
	die;
}

function activate() {

	global $wpdb;

    $table_name = $wpdb->prefix . "profiles";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS `connections` (
      `connectionId` int(11) NOT NULL,
        `mentorId` int(11) NOT NULL,
        `menteeId` int(11) NOT NULL,
        `createdDate` varchar(200) DEFAULT NULL,
        `lastConnected` varchar(200) DEFAULT NULL
      ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);

    $sql = "CREATE TABLE IF NOT EXISTS `connections` (
      `connectionId` int(11) NOT NULL,
        `mentorId` int(11) NOT NULL,
        `menteeId` int(11) NOT NULL,
        `createdDate` varchar(200) DEFAULT NULL,
        `lastConnected` varchar(200) DEFAULT NULL
      ) $charset_collate; ";
    dbDelta($sql);

    $sql = "CREATE TABLE IF NOT EXISTS `potentialconnections` (
    `PotentialConnectionsId` int(11) NOT NULL,
      `mentorId` int(11) NOT NULL,
      `menteeId` int(11) NOT NULL,
      `matchScore` int(11) NOT NULL
    ) $charset_collate; ";
    dbDelta($sql);

    $sql = "CREATE TABLE IF NOT EXISTS `tc_feedbacks` (
    `feedbackId` int(11) NOT NULL,
      `profileId` int(11) NOT NULL,
      `Description` varchar(500) DEFAULT NULL,
      `createdDate` varchar(255) DEFAULT NULL
    ) $charset_collate; ";
    dbDelta($sql);

    $sql = "CREATE TABLE IF NOT EXISTS `users` (
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
      `interest` varchar(256) DEFAULT NULL,
      `matchStatus` int(11) NOT NULL DEFAULT '0',
      `resource` varchar(256) DEFAULT NULL,
      `yearsProfession` varchar(255) DEFAULT NULL,
      `numCandidate` varchar(255) DEFAULT NULL,
      `prevJobs` varchar(255) DEFAULT NULL,
      `pursuingDegree` varchar(255) DEFAULT NULL,
      `otherInfo` varchar(255) DEFAULT NULL,
      `companyAddress` varchar(255) DEFAULT NULL,
      `employmentType` varchar(255) DEFAULT NULL,
      `otherDegree` varchar(255) DEFAULT NULL,
      `tcAffiliation` varchar(256) DEFAULT NULL,
      `TCAffiliationBitMask` int(11) DEFAULT '0',
      `InterestsBitMask` int(11) DEFAULT '0',
      `ResourcesBitMask` int(11) DEFAULT '0',
      `yearsEmployed` varchar(30) DEFAULT NULL,
      `currentEducation` varchar(255) DEFAULT NULL,
      `college` varchar(255) DEFAULT NULL,
      `locationCollege` varchar(255) DEFAULT NULL,
      `graduationDate` varchar(255) DEFAULT NULL,
      `tcAffiliation_other` varchar(255) DEFAULT NULL,
      `interest_other` varchar(255) DEFAULT NULL,
      `resource_other` varchar(255) DEFAULT NULL
    ) $charset_collate; ";
    dbDelta($sql);


    $sql = "CREATE TABLE IF NOT EXISTS `usertype` (
    `typeId` int(11) NOT NULL,
    `Description` varchar(100) DEFAULT NULL
    ) $charset_collate; ";
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