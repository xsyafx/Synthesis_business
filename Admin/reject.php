<?php
   include("../PHP/dBase.php");
   
   if(isset($_POST['reject'])){

      $comment_id = mysqli_real_escape_string($conn, $_POST['reject']);
      $query = "DELETE FROM comment WHERE commentID = '$comment_id' AND status=0";
      $result = mysqli_query($conn, $query);
 
      if($result){
           echo 'Comment Deleted Successfully';
           header("location: ../manageComments.php");
      }else
      {     
           echo 'Comment Not Deleted';
      }
    }else{
      header("location: ../manageComments.php");
    }
?>