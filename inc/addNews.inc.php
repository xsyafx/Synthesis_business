<?php

include "../PHP/dBase.php"; 

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['submit'])) {
   // Get news title
   $newsTitle = mysqli_real_escape_string($conn, $_POST['newsTitle']);
   // Get news details
   $newsDescription = mysqli_real_escape_string($conn, $_POST['newsDescription']);
   // Get image name
   $image = $_FILES['image']['name'];

   // image file directory
   $target = "../images/".basename($image);

   $sql = "INSERT INTO news (newsTitle, newsDescription, newsImage) VALUES (' $newsTitle', '$newsDescription', '$image')";
   // execute query
   mysqli_query($conn, $sql);
   header("Location: ../manageNews.php");

   if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
       $msg = "Image uploaded successfully";
   }else{
       $msg = "Failed to upload image";
       header("Location: ../addNews.php?error=$msg");
   }
}else{
  header("Location: ../manageNews.php");
}

$result = mysqli_query($conn, "SELECT * FROM news");
?>

