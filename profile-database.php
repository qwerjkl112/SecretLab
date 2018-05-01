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

    //insert
    global $wpdb;
    $table_name = "Users";

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
                'interest' => $interest, 
                'resource' => $resource, 
                'tcAffiliation' => $tcAffiliation, 
                'yearsProfession' => $yearsProfession, 
                'numCandidate' => $numCandidate,                
                'prevJobs' => $prevJobs, 
                'pursuingDegree' => $pursuingDegree, 
                'otherInfo' => $otherInfo, 
                'companyAddress' => $companyAddress, 
                'employmentType' => $employmentType,
                'otherDegree' => $otherDegree), 
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