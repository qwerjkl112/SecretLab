<?php 

if(isset($_POST['findMatch'])){
	findPotentialMatches();
}

if(isset($_POST['clearMatch'])){
    clearPotentialMatches();
}

function clearPotentialMatches(){
    global $wpdb;
    $table_name = "potentialconnections";
    $wpdb->query("DELETE FROM $table_name");
}

function findPotentialMatches(){
	global $wpdb;
    $table_name = "users";
    $menteesList = $wpdb->get_results("SELECT `TCAffiliationBitMask`, `InterestsBitMask`, `ResourcesBitMask`, `ID` FROM $table_name WHERE `usertype` = 0 AND `status` = 'Approved Member'");
    $mentorsList = $wpdb->get_results("SELECT `TCAffiliationBitMask`, `InterestsBitMask`, `ResourcesBitMask`, `ID` FROM $table_name WHERE `usertype` = 1 AND `status` = 'Approved Member'");

    $arrScore  = array();
    $arrMentor = array();
    $arrMentee = array();

    foreach ($menteesList as $mentee) {
    	$score = 0;
        $tcAffiliation_score = 0;
        $interest_score = 0;
        $resource_score = 0;

        $menteeTcAffiliationMask = $mentee->TCAffiliationBitMask;
        // echo "menteeTcAffiliationMask: " . $menteeTcAffiliationMask . " binary :" . decbin($menteeTcAffiliationMask) . '<br>';
        $menteeInterestMask = $mentee->InterestsBitMask;
        $menteeResourceMask = $mentee->ResourcesBitMask;

    	foreach ($mentorsList as $mentor) {
            $mentorTcAffiliationMask = $mentor->TCAffiliationBitMask;
            // echo "mentorTcAffiliationMask " . $mentorTcAffiliationMask . " binary :" . decbin($mentorTcAffiliationMask) . '<br>';
            $mentorInterestMask = $mentor->InterestsBitMask;
            $mentorResourceMask = $mentor->ResourcesBitMask;

            $commonTcAffiliationMask = ((int) $menteeTcAffiliationMask) & ((int) $mentorTcAffiliationMask);
            $commoninterestMask = ((int) $menteeInterestMask) & ((int) $mentorInterestMask);
            $commonResourceMask = ((int) $menteeResourceMask) & ((int) $mentorResourceMask);
            // echo "commonTcAffiliationMask " . $commonTcAffiliationMask . " binary :" . decbin($commonTcAffiliationMask) . '<br>';
            // echo "commoninterestMask " . $commoninterestMask . " binary :" . decbin($commoninterestMask) . '<br>';
            // echo "commonResourceMask " . $commonResourceMask . " binary :" . decbin($commonResourceMask) . '<br>';

            while($commonTcAffiliationMask) {
                $tcAffiliation_score += ($commonTcAffiliationMask & 1);
                $commonTcAffiliationMask = $commonTcAffiliationMask >> 1; 
            }
            while($commoninterestMask) {
                $interest_score += ($commoninterestMask & 1);
                $commoninterestMask = $commoninterestMask >> 1; 
            }
            while($commonResourceMask) {
                $resource_score += ($commonResourceMask & 1);
                $commonResourceMask = $commonResourceMask >> 1; 
            }

            // echo "tcAffiliation_score " . $tcAffiliation_score . " binary :" . decbin($tcAffiliation_score) .  '<br>'; 
            // echo "interest_score " . $interest_score . " binary :" . decbin($interest_score) .  '<br>'; 
            // echo "resource_score " . $resource_score . " binary :" . decbin($resource_score) .  '<br>'; 

    		$score = ($tcAffiliation_score * 2.25) + ($interest_score * 6.75) + ($resource_score * 13.5);
            // echo "<p style='color:red;'>final score is " . $score . '</p><br>';
    		if($score > 30){	
                array_push($arrScore, $score);
    			array_push($arrMentee, $mentee->ID);
    			array_push($arrMentor, $mentor->ID);
            }
    		$score = 0;
    	}
    }
    sort($arrScore);
    $arrScore = array_reverse($arrScore);
    $arrMentee = array_reverse($arrMentee);
    $arrMentor = array_reverse($arrMentor);
    $size = (sizeof($arrScore) >= 20) ? 20 : sizeof($arrScore);

    for($i = 0; $i < $size; $i++) {
    	// echo "score is " . $arrScore[$i] . " mentor id is " . $arrMentor[$i] . " mentee id is " . $arrMentee[$i];
    	$check = $wpdb->get_results("SELECT * FROM `potentialconnections` WHERE `mentorId` =  $arrMentor[$i] AND `menteeId` = $arrMentee[$i]");
        $check2 = $wpdb->get_results("SELECT * FROM `connections` WHERE `mentorId` =  $arrMentor[$i] AND `menteeId` = $arrMentee[$i]");
    	if(sizeof($check) == 0 && sizeof($check2) == 0){
	    	$wpdb->insert(
	            "potentialconnections", //table
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