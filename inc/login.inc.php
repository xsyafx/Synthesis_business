<?php
if (isset($_POST["submit"])) {
    $firstName = $_POST["firstName"];
    $password = $_POST["password"];

    require_once '../PHP/dBase.php';
    require_once 'functions.inc.php';

    //if user did not insert anything
    if(emptyInputLogin($firstName, $password) !== false){    
        header("location: ../login.php?error=emptyinput");
        exit();
     }

    //login the user
    loginUser($conn, $firstName, $password);  
    
 }else{
      header("location: ../login.php");
      exit();
  }

