<?php

if(isset($_POST['login'])){
	$username = $_POST["username"];
	$password = $_POST["password"];

     
	chckusername($username, $password);
	
}

function chckusername($username, $password){
	global $wpdb;
    $result = $wpdb->get_row("SELECT * FROM USERS WHERE `username` = '$username' and `password` = '$password'");
    if ($result != null) {
    	$_SESSION['login_user'] = $username;
        $_SESSION['id'] = $result->ID;
        $_SESSION['userType'] = $result->userType;
    }
    else{
        echo "<div id='loginmsg'>Wrong Username/Password Credential</div>";
        session_destroy();
    }
}
	