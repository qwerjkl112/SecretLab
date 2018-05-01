<?php 

if(isset($_POST['findMatch'])){
	findPotentialMatches();
}

function findPotentialMatches(){
	global $wpdb;
    $table_name = "users";
    $menteesList = $wpdb->get_results("SELECT * FROM $table_name WHERE `matchStatus` = 0 AND `UserType` = 0 ");
    $mentorsList = $wpdb->get_results("SELECT * FROM $table_name WHERE `matchStatus` = 0 AND `UserType` = 1");

    $arrScore  = array();
    $arrMentor = array();
    $arrMentee = array();

    foreach ($menteesList as $mentee) {
    	$score = 0;
    	foreach ($mentorsList as $mentor) {
    		if($mentee->interest == $mentor->interest) $score += 30;
    		if($mentee->resource == $mentor->resource) $score += 60;
    		if($mentee->tcAffiliation == $mentor->tcAffiliation) $score +=10;
    		if($score > 0) {
    			array_push($arrScore, $score);
    			array_push($arrMentee, $mentee->ID);
    			array_push($arrMentor, $mentor->ID);
    		}
    		$score = 0;

    	}
    }
    sort($arrScore);
    $size = (sizeof($arrScore) >= 10) ? 10 : sizeof($arrScore);

    for($i = 0; $i < $size; $i++) {
    	// echo "score is " . $arrScore[$i] . " mentor id is " . $arrMentor[$i] . " mentee id is " . $arrMentee[$i];
    	$check = $wpdb->get_results("SELECT * FROM `PotentialConnections` WHERE `mentorId` =  $arrMentor[$i] AND `menteeId` = $arrMentee[$i]");
    	if(sizeof($check) == 0){
	    	$wpdb->insert(
	            "PotentialConnections", //table
	            array(
	                'mentorId' => $arrMentor[$i], 
	                'menteeId' => $arrMentee[$i], 
	                'matchScore' => $arrScore[$i]),
	            array(
	            	'%d', '%d', '%d')
	        );
	    };
            	    
    }




}