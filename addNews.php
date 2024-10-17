<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News</title>

    <link rel="stylesheet" href="CSS/addNews.css">
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

                            <form  novalidate action="inc/addNews.inc.php" method="post" enctype="multipart/form-data">

                            <h3 class="title">Add News</h3>
                            
                            <div class="input-row">
                                <div class="input-group">
                                    <label for="newsTitle">News Title</label><br>
                                    <input type="text" name="newsTitle" placeholder="Enter Title" class="newsTitle">
                                </div>
                                <div class="input-group">
                                    <label for="newsDetails">News Details</label><br>
                                    <textarea class="newsDetails" rows="4" cols="50" name="newsDescription"></textarea>
                                </div>
                            </diV>

                            <div class="input-row">
                                <div class="input-group">
                                <label for="newsImage">News Image</label><br>
                                <input type="file" name="image" class="newsImage">
                                </div>
                            </div>

                            <button id="post-btn" name="submit" value="Upload">Save and Post</button>
                        </form>
                        </div> 
                    </header>
                </nav>
</body>
</html>

<?php
    include_once 'footer.php';
?>