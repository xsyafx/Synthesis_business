<?php

//SIgn up
function emptyInputSignup($firstName, $lastName, $email, $password, $user_type) {    
  $result;
  if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($user_type)){
      $result = true;
  }else{
      $result = false;
  }
  return $result;
}

function invalidEmail($email) {    
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $result = true;
    }else{
        $result = false;
    }
    return $result;
  }

function uidExists($conn, $firstName, $email) { 
  $sql = "SELECT * FROM user WHERE firstName = ? OR userEmail = ?;";
  $stmt = mysqli_stmt_init($conn);  
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $firstName, $email); 
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt); 

  if($row = mysqli_fetch_assoc($resultData)) {  
    return $row;
  }
  else{
      $result = false;
      return $result; 
  }

  mysqli_stmt_close($stmt);
}


  //sign up the user
function createUser($conn, $firstName, $lastName, $email, $password, $user_type) {  
  $sql = "INSERT INTO user (firstName, lastName, userEmail, userPassword, userType) VALUES (?, ?, ?, ?, ?);";  
  $stmt = mysqli_stmt_init($conn);   
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  //to make password secure
  $hashedPwd = password_hash($password, PASSWORD_DEFAULT); 

  mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $hashedPwd, $user_type); 
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../signup.php?error=none");
  exit();
}

//Login
function emptyInputLogin($firstName, $password) {    
  $result;
  if(empty($firstName) || empty($password)){
      $result = true;
  }else{
      $result = false;
  }
  return $result;
}

    function loginUser($conn, $firstName, $password){
      $uidExists = uidExists($conn, $firstName, $firstName);
  
      if($uidExists === false){
          header("location: ../login.php?error=wrongloginfirstname");
          exit();
      }
  
      $pwdHashed = $uidExists["userPassword"];  
      $checkPwd = password_verify($password, $pwdHashed);
  
      if($checkPwd === false){
          header("location: ../login.php?error=wrongloginpassword");
          exit();
      }
      else if($checkPwd === true){

          $res=mysqli_query($conn, "SELECT * FROM user WHERE firstName='$firstName' AND userPassword='$pwdHashed'");
          $row = mysqli_fetch_assoc($res);
          session_start();
               $_SESSION["userid"] = $uidExists["userID"];
               $_SESSION["useruid"] = $uidExists["firstName"];
               
              if(($row['userType']=='user') && ($row['firstName'] == $firstName)){
                $_SESSION['user']=$row['firstName'];
                   header("location: ../index.php");
              }else if(($row['userType']=='admin') && ($row['firstName'] == $firstName)){
                $_SESSION['user']=$row['firstName'];
                   header("location: ../manageNews.php");
              }
          // session_start();
          // header("location: ../index.php");
          exit();
      } 
}