<?php

if(isset($_POST['create_connection'])){
    $mentorId = $_POST["mentorId"];
    $menteeId = $_POST["menteeId"];
	createConnection($mentorId, $menteeId);
}

if(isset($_POST['delete_potential_connections'])){
    $mentorId = $_POST["mentorId"];
    $menteeId = $_POST["menteeId"];
    deletePotentialConnection($mentorId, $menteeId);
}

function createConnection($mentorId, $menteeId){
    global $wpdb;
    $myDate = date('m/d/Y');
    $table_name = "Connections";
	$wpdb->insert(
            $table_name, //table
            array('mentorId' => $mentorId, 'menteeId' => $menteeId, 'createdDate' => $myDate, 'lastConnected' => $myDate), 
            array('%d', '%d', '%s', '%s') //data format  
    );

    $wpdb->query(
        "
        UPDATE `Users`
        SET matchStatus = 1
        WHERE ID = $mentorId OR ID = $menteeId
        "
    );

    $check = $wpdb->get_results("SELECT * FROM `PotentialConnections` WHERE `mentorId` =  $mentorId AND `menteeId` = $menteeId");
    if(sizeof($check) > 0) {
        deletePotentialConnection($mentorId, $menteeId);
    }

}

function deletePotentialConnection($mentorId, $menteeId) {
    global $wpdb;
    $wpdb->query(" DELETE FROM `PotentialConnections` WHERE mentorId = $mentorId OR menteeId = $menteeId ");
}
