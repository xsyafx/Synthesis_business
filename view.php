<?php
    ob_start();
    include_once 'header.php';
    include "PHP/dBase.php";
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>

    <link rel="shortcut icon" href="http://bit.ly/ghfavicon" width=32px>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link rel="prefetch" href="pic/pause1.svg">
	<link rel="prefetch" href="pic/play1.svg">
	<link rel="prefetch" href="pic/stop1.svg">
    <link rel="stylesheet" href="CSS/view.css">    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="JS/voiceSynthesis.js" defer></script>

    <script>
        function validateForm() {
        let x = document.forms["myForm"]["firstName"].value;
        let y = document.forms["myForm"]["comment"].value;
        if (x == "" && y=="") {
            alert("Please fill in all the fields!");
            return false;
        }
    }
   </script>
</head>
<body>
    <?php 
        $id = $_GET['id']; 
        $query = mysqli_query($conn, "SELECT * FROM news WHERE $id = newsID");
        while($row=mysqli_fetch_array($query)){
            $newsTitle = $row['newsTitle'];
            $newsImage = $row['newsImage'];
            $newsDescription = $row['newsDescription'];   
    ?>

        <div>
            <button id=play></button> &nbsp;
            <button id=pause></button> &nbsp;
            <button id=stop></button>
	    </div>

        <article>
            <h1><?php echo $newsTitle; ?></h1>
            <img src="images/<?php echo $newsImage; ?>" alt="" width="100%" style="margin: auto;filter: brightness(1.2);"/>
            <p><?php echo $newsDescription?></p>

    
                <h5>Join Our Conversation</h5>
                <?php
                    if(isset($_SESSION['message']))
                    {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                ?>
          
                <div class="comment-box" style="z-index: 1. 1000;">
                    <form action="view.php?id=<?php echo $id; ?>" method="POST" name="myForm" onsubmit="return validateForm()"> 
                        <input type="text" name="firstName" placeholder="Full Name...">
                        <textarea name="comment" class="commentText" placeholder="Type Your Comment..."></textarea><br>
                        <button type="submit" value="comment" name="submit" class="send">Send</button>
                    </form>
                </div>    
                
                <ul class="list-group">
                    <?php 
                       $sql2 = "SELECT * FROM comment WHERE newsID = $id and status=1 ORDER BY commentID DESC";
                       $result2 = mysqli_query($conn, $sql2);
                       if(mysqli_num_rows($result2)>0){
                          while($row = mysqli_fetch_assoc($result2))
                          {
                    ?>
                        <li class="list-group-item">
                        <span class="secondary-content"><?php echo $row['firstName'];?></span>
                            <div class="commentText"><?php echo $row['commentText']?></div>
                        </li>
                    <?php 
                         }
                        } 
                    ?>
                </ul>
        </article>

    <?php
        }
    ?>    
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $firstName = $_POST['firstName'];
        $comment = $_POST['comment'];
        $id1 = $_GET['id'];

        $firstName = mysqli_real_escape_string($conn, $firstName);
        $firstName = htmlentities($firstName);

        $comment = mysqli_real_escape_string($conn, $comment);
        $comment = htmlentities($comment);

        $id1 = mysqli_real_escape_string($conn, $id1);
        $id1 = htmlentities($id1);

        $sql = "INSERT INTO comment (newsID, firstName, commentText) VALUES ('$id', '$firstName', '$comment')";
        $result = mysqli_query($conn, $sql);

        if($result){
            
            $_SESSION['message'] = "<div class='commentMsg'>Comment Added Successfully. Please wait for the admin to approve your comment.</div>";
            // echo "Comment Added Successfully.";
            header("Location: view.php?id=$id1");
        }else{

            $_SESSION['message'] = "<div class='chip red black-text'>Sorry, something went wrong.</div>";
            // echo "Something went wrong!";
            header("Location: view.php?id=$id1");
        }
    }
?>

<?php
    include_once 'footer.php';
    ob_end_flush();
?>