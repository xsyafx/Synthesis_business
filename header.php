<?php

  session_start();

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
    <title>LOGIN</title>
	<link rel="stylesheet" href="CSS/header.css">
</head>

<body>
       <div class="header">

          <div class="left-section">DAILY &nbsp <span style="color: #31728D;">BUSINESS NEWS</span></div>

          <div class="right-section">  

            <ul>
                  <?php
                    if (isset($_SESSION["useruid"])){
                      echo "<li><a href='inc/logout.inc.php'>LOG OUT</a></li>";
                    }
                    else{
                      echo "<li><a href='login.php'>LOG IN</a></li>";
                    }
                  ?>
            </ul>
          </div>

      </div>