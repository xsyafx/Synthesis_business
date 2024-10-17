<?php

  require_once '../PHP/dBase.php';

  
  if(isset($_POST['update']))
  {

   $news_id = mysqli_real_escape_string($conn, $_POST['news_id']);
     // Get news title
   $newsTitle = mysqli_real_escape_string($conn, $_POST['newsTitle']);
   // Get news details
   $newsDescription = mysqli_real_escape_string($conn, $_POST['newsDescription']);
   // Get image name
   $image = $_FILES['image']['name'];

   // image file directory
   $target = "../images/".basename($image);

   $query = "UPDATE news SET newsTitle='$newsTitle', newsDescription='$newsDescription', newsImage='$image' WHERE newsID ='$news_id' ";

   $query_run = mysqli_query($conn, $query);

   if($query_run)
   {
      echo "News Updated Successfully";
      header("Location: ../manageNews.php");
   }
   else
   {
      echo "News Not Updated";
      header("Location: ../manageNews.php");
   }

   if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
   }else{
    $msg = "Failed to upload image";
    header("Location: ../manageNews.php?error=$msg");
}
  }
?>