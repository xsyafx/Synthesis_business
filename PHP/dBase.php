<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "news_db";

//create connection
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

//check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
   
}else{
  
}
?>