<?php

if (isset($_POST["submit"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_type = $_POST["userType"];

    require_once '../PHP/dBase.php';    
    require_once 'functions.inc.php';

    //if user did not insert anything
    if(emptyInputSignup($firstName, $lastName, $email, $password, $user_type) !== false){    
       header("location: ../signup.php?error=emptyinput");
       exit();
    }
    //email is invalid
    if(invalidEmail($email) !== false){    
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    //email is taken by another user
    if(uidExists($conn, $firstName, $email) !== false){ 
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $firstName, $lastName, $email, $password, $user_type);
}
else{
    header("location: ../signup.php");
    exit();
}