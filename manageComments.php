<?php
    include("PHP/dBase.php");
    include_once 'header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Comments</title>

    <link rel="stylesheet" href="CSS/manageComments.css">

    <script src="https://kit.fontawesome.com/9ed79d7954.js" crossorigin="anonymous"></script>
</head>

<body>

<nav>
                    <aside>
                        <ul>
                            <li><h1><span>NAVIGATION</span></h1></li>
                        </ul>
                        <ul>
                            <li id="home">
                                <a href="#home">
                                    <i class="fa fa-newspaper"></i>
                                    <span>News</span>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                <ul>
                                    <li><a href="addNews.php">Add News</a></li>
                                    <li><a href="manageNews.php">Manage News</a></li>
                                </ul>
                            </li>
                        </ul>`
                        <ul>
                            <li id="comment">
                                <a href="#comment">
                                    <i class="fa fa-comment"></i>
                                    <span>Comment</span>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                <ul>
                                     <li><a href="manageComments.php">Waiting for Approval</a></li>
                                </ul>
                            </li>
                        </ul>
                    </aside>
                    <header>
                        <div class="banner">
                          
                            <h3 class="title">Manage Unapproved Comments</h3>

                            <span id="message"></span>
                            
                            <?php 
                                $sql2 = "SELECT * FROM comment ORDER BY commentID";
                                $result2 = mysqli_query($conn, $sql2);
                                if(mysqli_num_rows($result2)>0){  
                            ?>
                                
            
                                <table class="content-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>FirstName</th>
                                            <th>Comment</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($row = mysqli_fetch_assoc($result2)){
                                                $commentID = $row['commentID'];
                                                $firstName = $row['firstName'];
                                                $commentText = $row['commentText'];
                                        ?>
                                            <tr>
                                                <td> <?php echo $commentID; ?></td>
                                                <td> <?php echo $firstName; ?></td>
                                                <td> <?php echo $commentText; ?></td>
                                                <td>
                                                    <span class="action_btn">
                                                        <a href="Admin/approve.php" class="approve-btn" id="<?php echo $row['commentID'];?>">Approve</a>
                                                        <form action="Admin/reject.php" method="POST">
                                                          <button type="submit" name="reject" value="<?php echo $commentID ?>" class="reject-btn">Reject</button>
                                                        </form>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                    </div>
                <?php
                    }
                    else{
                        echo "No Record Found";
                    }
                ?>
                        </div> 
                    </header>
                </nav>
</body>
</html>

<script>
    const approv = document.querySelectorAll(".approve-btn");
    approv.forEach(function(item, index)
    {
        item.addEventListener("click",approvNow)
    }) 

    function approvNow(e){
        e.preventDefault();
        if(confirm("Do you really want to approve"))
        {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "Admin/approve.php?id="+Number(e.target.id), true)
            xhr.onload=function()
            {
                const messg = xhr.responseText;
                const message = document.getElementById("message");
                message.innerHTML = messg;
            }
            xhr.send()
        }
    }

</script>

<script>
    const approv = document.querySelectorAll(".reject-btn");
    approv.forEach(function(item, index)
    {
        item.addEventListener("click",approvNow)
    }) 

    function approvNow(e){
        e.preventDefault();
        if(confirm("Do you really want to reject"))
        {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "Admin/reject.php?id="+Number(e.target.id), true)
            xhr.onload=function()
            {
                const messg = xhr.responseText;
                const message = document.getElementById("message");
                message.innerHTML = messg;
            }
            xhr.send()
        }
    }

</script>

<?php
    include_once 'footer.php';
?>
