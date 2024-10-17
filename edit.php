<?php
    include_once 'header.php';
    require_once 'PHP/dBase.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>

    <link rel="stylesheet" href="CSS/edit.css">
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
                        <?php
                           if(isset($_GET['id']))
                           {
                                $news_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELEct * FROM news WHERE newsID='$news_id' ";
                                $query_run = mysqli_query($conn, $query);
 
                                if(mysqli_num_rows($query_run) > 0){
                                    $news = mysqli_fetch_array($query_run);
                                    ?>
                                        <form action="Admin/update.php" method="POST" enctype="multipart/form-data">
                                            <h3 class="title">Update News</h3>

                                            <input type="hidden" name="news_id" value="<?= $news['newsID'] ?>">

                                            <div class="input-row">
                                                <div class="input-group">
                                                    <label for="newsTitle">News Title</label><br>
                                                    <input type="text" name="newsTitle" class="newsTitle" value="<?=$news['newsTitle']; ?>">
                                                </div>
                                                <div class="input-group">
                                                    <label for="newsDetails">News Details</label><br>
                                                    <textarea class="newsDetails" rows="4" cols="50" name="newsDescription"><?=$news['newsDescription']; ?></textarea>
                                                </div> 

                                                <div class="input-row">
                                                    <div class="input-group">
                                                    <label for="newsImage">News Image</label><br>
                                                    <input type="file" name="image" class="newsImage" value="<?=$news['newsImage']; ?>">
                                                    <img src="images/<?=$news['newsImage']; ?>" alt="">
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="submit" name="update" id="post-btn">Update</button>
                                        </form>
                                    <?php
                                }
                                else
                                {
                                    echo "<h4>no Such ID Found</h4>";
                                }
                           }
                        ?>
                        </div>
                    </header>

    </nav> 
</body>
</html>



