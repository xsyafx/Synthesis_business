<?php
    include "header.php";?>
<?php
    include "PHP/dBase.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage News</title>

    <link rel="stylesheet" href="CSS/manageNews.css">

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
                                    <span class="miniTitle">News</span>
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
                                    <span class="miniTitle">Comment</span>
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
                           <h3 class="title">Manage News</h3>

                           <?php
                                include("PHP/dBase.php");
                                
                                $query = "SELECT * FROM news";
                                $result = mysqli_query($conn, $query);

                                if(mysqli_num_rows($result) > 0){
                            ?>

                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>News Title</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        while($row = mysqli_fetch_assoc($result)){
                                            $id = $row['newsID'];
                                            $newsTitle = $row['newsTitle'];
                                    ?>
                                        <tr>
                                            <td> <?php echo $id; ?></td>
                                            <td> <?php echo $newsTitle; ?></td>

                                            <td>
                                                <span class="action_btn">
                                                    <a href="edit.php?id=<?php echo $id?>" class="edit-btn">Edit</a>
                                                
                                                    <form action="Admin/delete.php" method="POST" enctype="multipart/form-data">
                                                        <button type="submit" name="delete" value="<?php echo $id ?>" class="delete-btn">Delete</button>
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

<?php
    include ('footer.php');
?>
