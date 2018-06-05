<?php

if(isset($_POST['deactivate_user'])){
	$profileId = $_POST["profileId"];
	deactivateUser($profileId);
	
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
