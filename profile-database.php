<?php
if(isset($_POST['register'])){
    $userType= $_POST["userType"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $phonenumber = $_POST["phonenumber"];
    $dob = $_POST["dob"];
    $companyName = $_POST["companyName"];
    $companyAddress = $_POST["companyAddress"];
    $jobTitle = $_POST["jobTitle"];
    $jobResponisibility = $_POST["jobResponisibility"];
    $interest = $_POST["interest"];
    $yearsProfession = $_POST["yearsProfession"];
    $professions = $_POST["professions"];
    $resource = $_POST["resource"];
    $numCandidate = $_POST["numCandidate"];
    $prevJobs = $_POST["prevJobs"];
    $tcAffiliation = $_POST["tcAffiliation"];
    $education = $_POST["education"];
    $otherDegree = $_POST["otherDegree"];
    $pursuingDegree = $_POST["pursuingDegree"];
    $otherInfo = $_POST["otherInfo"];
    $employmentType = $_POST["employmentType"];
    $degree = $_POST["degree"];

    $tcAffiliation_other = $_POST["tcAffiliation_other"];
    $interest_other = $_POST["interest_other"];
    $resource_other = $_POST["resource_other"];

    $tcAffiliationBitMask = 0;
    $interestBitMask = 0;
    $resourceBitMask = 0;

    if(!empty($tcAffiliation)){
        $N = count($tcAffiliation);
        for($i = 0; $i < $N; $i++) {
            if((int) $tcAffiliation[$i] == 4) { $tcAffiliationBitMask = 0; break;}
            if((int) $tcAffiliation[$i] == 5) { break;}
            $tcAffiliationBitMask += pow(2, (int) $tcAffiliation[$i]);

        }
    }
    if(!empty($interest)){
        $N = count($interest);
        for($i = 0; $i < $N; $i++) {
            if((int) $interest[$i] == 13) { break;}
            $interestBitMask += pow(2, (int) $interest[$i]);
        }
    }
    if(!empty($resource)){
        $N = count($resource);
        for($i = 0; $i < $N; $i++) {
            if((int) $resource[$i] == 5) { break;}
            $resourceBitMask += pow(2, (int) $resource[$i]);
        }
    }
     echo "tc bitmask to " . $tcAffiliationBitMask . "<br>";
     echo "interest bitmask to " . $interestBitMask . "<br>";
     echo "resource bitmask to " . $resourceBitMask . "<br>";




    //insert
    global $wpdb;
    $table_name = "users";

    $wpdb->insert(
            $table_name, //table
            array(
                'firstname' => $firstname, 
                'lastname' => $lastname, 
                'username' => $username, 
                'password' => $password, 
                'email' => $email, 
                'dob' => $dob, 
                'phonenumber' => $phonenumber, 
                'userType' => $userType, 
                'education' => $education, 
                'degree' => $degree, 
                'professions' => $professions, 
                'companyName' => $companyName, 
                'jobTitle' => $jobTitle, 
                'jobResponisibility' => $jobResponisibility, 
                'interest' => $interest[0], 
                'resource' => $resource[0], 
                'tcAffiliation' => $tcAffiliation[0], 
                'yearsProfession' => $yearsProfession, 
                'numCandidate' => $numCandidate,                
                'prevJobs' => $prevJobs, 
                'pursuingDegree' => $pursuingDegree, 
                'otherInfo' => $otherInfo, 
                'companyAddress' => $companyAddress, 
                'employmentType' => $employmentType,
                'otherDegree' => $otherDegree,
                'TCAffiliationBitMask'=> $tcAffiliationBitMask,
                'InterestsBitMask' => $interestBitMask,
                'ResourcesBitMask' =>$resourceBitMask),
            array('%s', '%s') //data format  
    );

    $result = $wpdb->get_row("SELECT id FROM Users WHERE username = '$username' and password = '$password'");

    if (($result) != null) {
        $_SESSION['login_user'] = $username;
        $_SESSION[`id`] = $result->id;
    }
    else{
        echo "<div id='loginmsg'>Wrong Username</div>";
    }
}
?>