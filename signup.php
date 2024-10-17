<?php

include_once 'header.php';

?>

<div class="split-screen">
    
        <div class="left-signup">
           <section class="desc">
                <h1>WELCOME BACK!</h1>
                <p>To keep connected with us, please begin with your personal info</p>
                <button class="signupPage-login-btn" type="submit" onclick="document.location='login.php'">SIGN IN</button>
            </section>
        </div>

        <div class="right-signup">

            <form action="inc/signup.inc.php" method="POST">
                <section class="copy">
                    <h2>Create Account</h2>
                </section>
                <div class="input-container fname">
                    <label for="fname">FIRST NAME</label>
                    <input type="text" id="fname" name="firstName">
                </div>
                <div class="input-container lname">
                    <label for="lname">LAST NAME</label>
                    <input type="text" id="lname" name="lname">
                </div>
                <div class="input-container email">
                    <label for="email">EMAIL ADDRESS</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="input-container password">
                    <label for="password">PASSWORD</label>
                    <input type="password" id="password" name="password">
                </div>
                 <div class="input-container userType">
                    <label for="userType">USER TYPE</label>
                    <select name="userType" class="input-field">
                                 <option value="user">User</option>
                                 <option value="admin">Admin</option>
                    </select>
                </div>
          
                <button class="signupPage-signup-btn" type="submit" name="submit" onclick="document.location='signup.php'">SIGN UP</button>

            </form>
        </div>

        <?php 
        //checking for error
        if (isset($_GET["error"])) {  
          if($_GET["error"] == "emptyinput") {
            echo "<script type='text/JavaScript'>";
            echo "alert('Fill in all fields!')";
            echo"</script>";
          }
          else if ($_GET["error"] == "invalidemail") {
            echo "<script type='text/JavaScript'>";
            echo "alert('Choose a proper email!')";
            echo"</script>";
          }
          else if ($_GET["error"] == "none") {
            echo "<script type='text/JavaScript'>";
            echo "alert('You have signed up!')";
            echo"</script>";
          }
        }
       ?>
</div> 

<?php
    include_once 'footer.php';
?>
        

        
