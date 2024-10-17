<?php
   include("../PHP/dBase.php");
   
   if(isset($_GET['id']))
   {
       $id = $_GET['id'];
       $id = mysqli_real_escape_string($conn, $id);
       $id = htmlentities($id);

       $sql = "UPDATE comment SET status=1 WHERE commentID=$id";
       $result = mysqli_query($conn, $sql); 

       if($result){
          echo "<div class='chip green white-text'>Comment Approved.</div>";
       }else{
          echo "<div class='chip red black-text'>Sorry, Something Went Wrong.</div>";
       }
       
   }
?>