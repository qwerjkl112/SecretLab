<?php

if(isset($_POST['leave_feedback'])){
    $senderId = $_POST["SenderId"];
    $receiverId = $_POST["ReceiverId"];
    $rating = $_POST["Rating"];
    $connectionId = $_POST["connectionid"];
    $Description = $_POST["Description"];
	leaveFeedback($senderId, $receiverId, $rating, $connectionId, $Description);
}

function leaveFeedback($senderId, $receiverId, $rating, $connectionId, $Description){
    global $wpdb;
    $myDate = date('m/d/Y');
    $table_name = "Feedbacks";
	$wpdb->insert(
            $table_name, //table
            array('SenderId' => $senderId, 'ReceiverId' => $receiverId, 'Rating' => $rating, 'Description' => $Description, 'dateCommented' => $myDate, 'connectionId' => $connectionId), 
            array('%d', '%d', '%d', '%s', '%s', '%d') //data format  
    );

    $wpdb->query(
        $wpdb->prepare("
        UPDATE `Connections`
        SET lastConnected = %s
        WHERE connectionId = %d
        ",
        $myDate, $connectionId)
    );

    echo "<div class='alert alert-success'> <strong>Success!</strong> Your Feedback has been updated! </div>";
}
