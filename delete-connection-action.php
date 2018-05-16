<?php

if(isset($_POST['delete_connection'])){
    $connectionId = $_POST["connectionid"];
	deleteConnection($connectionId);
	
}

function deleteConnection($connectionId){
    global $wpdb;
    $table_name = "Connections";
    $result = $wpdb->get_row("SELECT * FROM $table_name WHERE `connectionId` = $connectionId");

	$wpdb->delete(
            $table_name, //table
            array('connectionid' => $connectionId), 
            array('%d') //data format  
    );
    
    $mentorId = $result->mentorId;
    $menteeId = $result->menteeId;

    // $wpdb->query(
    //     "
    //     UPDATE `Users`
    //     SET matchStatus = 0
    //     WHERE ID = $mentorId OR ID = $menteeId
    //     "
    // );

    $wpdb->delete(
            "Feedbacks", //table
            array('connectionid' => $connectionId), 
            array('%d') //data format  
    );



}
	