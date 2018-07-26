<?php

if (isset($_POST['updateProfile'])) {
    echo $_POST["username"];
    $profileId = $_POST["profileId"];
    $resource = $_POST["resource"];
    $interest = $_POST["interest"];
    $tcAffiliation = $_POST["tcAffiliation"];

    $tcAffiliation_other = $_POST["tcAffiliation_other"];
    $interest_other = $_POST["interest_other"];
    $resource_other = $_POST["resource_other"];

    $tcAffiliationBitMask = 0;
    $interestBitMask = 0;
    $resourceBitMask = 0;

    $tcAffiliationString = [];
    $interestString = [];
    $resourceString = [];

    if(!empty($tcAffiliation)){
        $N = count($tcAffiliation);
        for($i = 0; $i < $N; $i++) {
            switch ((int) $tcAffiliation[$i]) {
                case 0:
                    array_push($tcAffiliationString, "9/11 Family Member");
                    break;
                case 1:
                    array_push($tcAffiliationString, "First Responder/First Responder Family Member");
                    break;
                case 2:
                    array_push($tcAffiliationString, "Military");
                    break;
                case 3:
                    array_push($tcAffiliationString, "Volunteer");
                    break;
                case 4:
                    array_push($tcAffiliationString, "Prefer not to answer");
                    break;
                case 5: 
                    array_push($tcAffiliationString, $tcAffiliation_other);
                default:
                    break;
            }
            $tcAffiliationBitMask += pow(2, (int) $tcAffiliation[$i]);
        }
    }
    if(!empty($interest)){
        $N = count($interest);
        for($i = 0; $i < $N; $i++) {
            switch ((int) $interest[$i]) {
                case 0:
                    array_push($interestString, "Finance");
                    break;
                case 1:
                    array_push($interestString, "Non Profit");
                    break;
                case 2:
                    array_push($interestString, "Human Resource");
                    break;
                case 3:
                    array_push($interestString, "Retail");
                    break;
                case 4:
                    array_push($interestString, "Law");
                    break;
                case 5:
                    array_push($interestString, "Media");
                    break;
                case 6:
                    array_push($interestString, "Education");
                    break;
                case 7:
                    array_push($interestString, "Publishing");
                    break;
                case 8:
                    array_push($interestString, "Journalism");
                    break;
                case 9:
                    array_push($interestString, "Advertising");
                    break;
                case 10:
                    array_push($interestString, "Marketing");
                    break;
                case 11:
                    array_push($interestString, "PR");
                    break;
                case 12:
                    array_push($interestString, "Technology");
                    break;
                case 13:
                    array_push($interestString, $interest_other);
                    break;
            }
            $interestBitMask += pow(2, (int) $interest[$i]);
        }
    }
    if(!empty($resource)){
        $N = count($resource);
        for($i = 0; $i < $N; $i++) {
            switch ((int) $tcAffiliation[$i]) {
                case 0:
                    array_push($resourceString, "Resume Writing");
                    break;
                case 1:
                    array_push($resourceString, "Networking");
                    break;
                case 2:
                    array_push($resourceString, "Career Advancement");
                    break;
                case 3:
                    array_push($resourceString, "Career Change");
                    break;
                case 4:
                    array_push($resourceString, "General Professional Help");
                    break;
                case 5: 
                    array_push($resourceString, $resource_other);
                    break;
            }
            $resourceBitMask += pow(2, (int) $resource[$i]);
        }
    }

 
    $resourceString = implode(",\n" , $resourceString);
    $interestString = implode(",\n" , $interestString);
    $tcAffiliationString = implode(",\n" , $tcAffiliationString);
   	updateProfile($profileId, $tcAffiliationBitMask, $interestBitMask, $resourceBitMask, $resourceString, $interestString, $tcAffiliationString, $tcAffiliation_other, $interest_other, $resource_other);
}

function updateProfile($profileId, $tcAffiliationBitMask, $interestBitMask, $resourceBitMask, $resourceString, $interestString, $tcAffiliationString, $tcAffiliation_other, $interest_other, $resource_other){
    if (isset($_POST['update'])) {
    $table_name = "users";
    $wpdb->update(
            $table_name, //table
            array(
            'tcAffiliation' => $tcAffiliationString, 
            'interest' => $interestString, 
            'resource' => $resourceString,
            'TCAffiliationBitMask'=> $tcAffiliationBitMask,
            'InterestsBitMask' => $interestBitMask,
            'ResourcesBitMask' =>$resourceBitMask,
            'tcAffiliation_other' => $tcAffiliation_other,
            'interest_other' => $interest_other,
            'resource_other' => $resource_other
            ),
            array('id' => $profileId));
    }
}
