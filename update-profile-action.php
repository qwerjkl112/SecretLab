<?php

if (isset($_POST['updateProfile'])) {
    $profifleId = $_SESSION[`id`];
    $firstname = $_SESSION[`id`];
    $lastname = $_SESSION[`id`];
    $username = $_SESSION[`id`];
    $password = $_SESSION[`id`];
    $email = $_SESSION[`id`];
    $dob = $_SESSION[`id`];
    $profifleId = $_SESSION[`id`];
    $profifleId = $_SESSION[`id`];
   	updateProfile($profileId);
   	$
}

function updateProfile($profileId){
    if (isset($_POST['update'])) {
    $table_name = "users";
    $wpdb->update(
            $table_name, //table
            array('ID' => $id), //data
            array('firstname' => $id), //where
            array('lastname' => $id), //where
            array('firstname' => $id), //where
            array('firstname' => $id), //where
            array('firstname' => $id), //where
            array('firstname' => $id), //where
            array('firstname' => $id), //where
            array('%s'), //data format
            array('%s') //where format
    );
}
}


SELECT `ID`, `firstname`, `lastname`, `username`, `password`, `email`, `dob`, `phonenumber`, `userType`, `employmentField`, `education`, `degree`, `professions`, `affiliation`, `status`, `companyName`, `jobTitle`, `jobResponisibility`, `interest` FROM `Users` WHERE 1
