<?php

require_once '../PHP/dBase.php';

   if(isset($_POST['delete'])){

     $news_id = mysqli_real_escape_string($conn, $_POST['delete']);
     $query = "DELETE FROM news WHERE newsID = '$news_id' ";
     $result = mysqli_query($conn, $query);

     if($result){
          echo 'News Deleted Successfully';
          header("location: ../manageNews.php");
     }else
     {     
          echo 'News Not Deleted';
     }
   }else{
     header("location: ../manageNews.php");
   }

  
?>