<?php
    include "header.php";
    include "PHP/dBase.php";

    $sql = "SELECT * FROM news";
    $all_news = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business News</title>
    <link rel="stylesheet" href="CSS/index.css">
   
</head>

<body>
                      <main>

                          <?php
                                while($row = mysqli_fetch_assoc($all_news)) 
                            {
                          ?>   

                        <div class="card">
                           <div class="image">
                             <img src="images/<?php echo $row['newsImage']; ?>" alt="News Images" width="100px" height="100px" >
                           </div>
                            <div class="caption">
                                <h5 class="news-title"> <?php echo $row['newsTitle']; ?></h5>
                            </div>
                            <a href="view.php?id=<?php echo $row['newsID']; ?>">
                              <button class="view">View More</button>
                            </a>
                        </div>

                        <?php
                         }
                        ?>
                      </main>

</body>
</html>

<?php
    include_once 'footer.php';
?>