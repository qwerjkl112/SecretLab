<?php

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

function deleteUser($profileId){
    global $wpdb;
	$wpdb->delete(
            "Users", //table
            array('ID' => $profileId), 
            array('%d') //data format  
    );

    echo "<div class='alert alert-success'> <strong>Success!</strong> Member has been deleted! </div>";
}
	

function approveuser($profileId){
    global $wpdb;
    $wpdb->query(
        "
        UPDATE `Users`
        SET status = 'Approved Member'
        WHERE ID = $profileId
        "
    );

    echo "<div class='alert alert-success'> <strong>Success!</strong> Member has been approved </div>";
}

function requestFeedback($profileId, $description){
    global $wpdb;
    $myDate = date('m/d/Y');
    $table_name = "TC_Feedbacks";
    $wpdb->insert(
            $table_name, //table
            array('profileId' => $profileId, 'Description' => $description, 'createdDate' => $myDate), 
            array('%d', '%s', '%s') //data format  
    );

    echo "<div class='alert alert-success'> <strong>Success!</strong> Your feedback Request has been submitted </div>";
}
