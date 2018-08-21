<?php

if(isset($_POST['deactivate_user'])){
    $profileId = $_POST["profileId"];
    deactivateUser($profileId);
    
}
if(isset($_POST['delete_user'])){
	$profileId = $_POST["profileId"];
	deleteUser($profileId);
	
}

if(isset($_POST['approve_user'])){
    $profileId = $_POST["profileId"];
    approveUser($profileId);
    
}

if(isset($_POST['request_feedback'])){
    $description = $_POST["description"];
    $profileId = $_POST["profileId"];
    requestFeedback($profileId, $description);
    
}

if(isset($_POST['admin_create'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    if($password === $confirm_password){
        admin_create($username, $password);
    }
}

if(isset($_POST['email_user'])){
    $to = $_POST["email"];
    $subject = $_POST["subject"];
    $txt = $_POST["txt"];
    email_user($to, $subject, $txt);
}

function email_user($to, $subject, $txt) {
    if(mail($to,$subject,$txt)){
    echo "<div class='alert alert-success'> <strong>Success!</strong> Email sent, statu is good </div>"; 
    }
    else {

    echo "<div class='alert alert-danger'> <strong>Failure!</strong> Email not sent </div>";

    }
}



function deactivateUser($profileId){
    global $wpdb;
	$wpdb->query(
        "
        UPDATE `users`
        SET status = 'Deactivated User'
        WHERE ID = $profileId
        "
    );

    echo "<div class='alert alert-success'> <strong>Success!</strong> Member has been deactivated! </div>";
}

function deleteUser($profileId){
    global $wpdb;
    $wpdb->query(
        "
        DELETE FROM `users`
        WHERE ID = $profileId
        "
    );

    echo "<div class='alert alert-success'> <strong>Success!</strong> Member has been deleted! </div>";
}
	

function approveuser($profileId){
    global $wpdb;
    $wpdb->query(
        "
        UPDATE `users`
        SET status = 'Approved Member'
        WHERE ID = $profileId
        "
    );

    echo "<div class='alert alert-success'> <strong>Success!</strong> Member has been approved </div>";
}

function requestFeedback($profileId, $description){
    global $wpdb;
    $myDate = date('m/d/Y');
    $table_name = "tc_feedbacks";
    $wpdb->insert(
            $table_name, //table
            array('profileId' => $profileId, 'Description' => $description, 'createdDate' => $myDate), 
            array('%d', '%s', '%s') //data format  
    );

    echo "<div class='alert alert-success'> <strong>Success!</strong> Your feedback Request has been submitted </div>";
}

function admin_create($username, $password){
    global $wpdb;
    $table_name = "users";
    $wpdb->insert(
            $table_name, //table
            array('firstname' => "admin", 'lastname' => "admin",'username' => $username, 'password' => $password, 'userType' => 2, 'status' => "admin"), 
            array('%s', '%s', '%s', '%s', '%s') //data format  
    );

    echo "<div class='alert alert-success'> <strong>Success!</strong> Admin Created </div>";
}
