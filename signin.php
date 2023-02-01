<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign-In</title>
</head>
<body>
    <?php
        include_once "details.php";
    ?>   

    <div class="signupform">
        <h1>SIGN-IN</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <span class="main-input signin">
                <span class ="required"><?php echo $passWordErr; ?></span>
                <input type="text" name="username" placeholder = "Username">
                <input type="password" name="password" placeholder = "Password">
            </span>
            <span class="middle">
                <span  class = "rem-me">
                    <input type="checkbox" class="checkbox">
                    <p>Remember me</p>
                </span> 
               <span class="forgot-password">
                   <a href="#"><p>Forgot Password</p></a>
               </span>
            </span>
            <span class="main-input">
                <input type="submit" name = "signup" value = "SIGN IN" class = "submit-signup">
            </span>
        </form>
    </div>
    <div class="image">
        <a href = "signup.php"><p class = "goto-next-page">Sign Up</p></a>
        <img src="images/sunflower.jpg" alt="image">
    </div>
    
</body>
</html>