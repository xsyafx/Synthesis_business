<?php

include_once 'header.php';

?>

<div class="split-screen">
    
        <div class="left">

            <form action="inc/login.inc.php" method="POST"> 
                <section class="copy">
                    <h2>Login to Your Account</h2>
                </section>
                <div class="input-container email">
                    <label>FIRST NAME</label>
                    <span></span>
                    <input type="text" name="firstName">
                </div>
                <div class="input-container password">
                    <label for="password">PASSWORD</label>
                    <span></span>
                    <input type="password" name="password">
                </div>
          
                <button class="login-btn" type="submit" name="submit" onclick="document.location='login.php'">SIGN IN</button>

            </form>
        </div>

        <div class="right">
            <section class="desc">
                <h1>NEW HERE?</h1>
                <p>Sign Up and discover a great amount of stories on business</p>
                <button class="signup-btn" type="submit" onclick="document.location='signup.php'">SIGN UP</button>
            </section>
        </div>

        <?php 
        //checking for error
        if (isset($_GET["error"])) {  
          if($_GET["error"] == "emptyinput") {
            echo "<script type='text/JavaScript'>";
            echo "alert('Fill in all fields!')";
            echo"</script>";
          }
          else if ($_GET["error"] == "wronglogin") {
            echo "<script type='text/JavaScript'>";
            echo "alert('Incorrect Login Information!')";
            echo"</script>";
          }
        }
       ?>
</div> 

<?php
    include_once 'footer.php';
?>