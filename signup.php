<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign-Up</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "project1db";
     
        $conn = new mysqli($servername,$username,$password,$dbname);
        if($conn->connect_error) {
            die("connection failed: " . mysqli_connect_error());
        }

       $firstNameErr = $lastNameErr = $userNameErr = $passWordErr = $repeatPassWordErr = $tncErr = $notMatch = $duplicateErr = "";
       $firstName = $lastName = $userName = $passWord = $repeatPassWord = $tnc = "";
       if($_SERVER["REQUEST_METHOD"] == "POST"){
           if(empty($_POST["firstname"])){
               $firstNameErr = "First name is required";
           }else{
               $firstName = test_input($_POST["firstname"]);
           }
           if(empty($_POST["lastname"])){
               $lastNameErr = "Last name is required";
           }else{
               $lastName = test_input($_POST["lastname"]);
           }
           if(empty($_POST["username"])){
               $userNameErr = "User name is required";
           }else{
               $userName = test_input($_POST["username"]);
           }
           if(empty($_POST["password"])){
               $passWordErr = "password is required";
           }else{
               $passWord = test_input($_POST["password"]);
           }
           if(empty($_POST["repeatpassword"])){
            $repeatPassWordErr = "Repeat password is required";
           }else{
            $repeatPassWord = test_input($_POST["repeatpassword"]);
           }
           if(empty($_POST["tnc"])){
            $tncErr = "Agree to Terms and Conditions";
           }else{
            $tnc = test_input($_POST["tnc"]);
           }

           if(!empty($firstName) && !empty($lastName) && !empty($userName) && !empty($passWord) && !empty($repeatPassWord) && !empty($tnc) ){
                $duplicate = "SELECT username FROM p1applicants WHERE username = '$userName'";

                $duplicateCheck = mysqli_query($conn,$duplicate);
                if(mysqli_num_rows($duplicateCheck) > 0){
                   $duplicateErr = "This username already exist!";
                }else if(mysqli_num_rows($duplicateCheck) < 1){
                    if($passWord == $repeatPassWord){
                        $sql = "INSERT INTO p1applicants(firstname,lastname,username,passwordkey,repeatpasswordkey) VALUES ('$firstName','$lastName','$userName','$passWord','$repeatPassWord')";
                        if ($conn->query($sql) === TRUE) {
                            header("Location: signin.php");
                        }
                    }else{
                       $notMatch = "Passwords do not match";
                    }
                }
                
           }
             
         
       }
       function test_input($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }
    ?>
    <div class="signupform">
        <h1>SIGN-UP</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <span class="main-input">
                <input type="text" name="firstname" placeholder = "First name">
                <span class ="required">* <?php echo $firstNameErr; ?></span>
                <input type="text" name="lastname" placeholder = "Last name">
                <span class ="required">* <?php echo $lastNameErr; ?></span>
                <input type="text" name="username" placeholder = "Username">
                <span class ="required">* <?php echo $userNameErr,$duplicateErr; ?></span>
                <input type="password" name="password" placeholder = "Password">
                <span class ="required">* <?php echo $passWordErr; ?></span>
                <input type="password" name="repeatpassword" placeholder = "Repeat Password">
                <span class ="required">* <?php echo $repeatPassWordErr, $notMatch; ?></span>
                <input type="submit" action = "signin.php" name = "signup" value = "SIGN UP" class = "submit-signup">
            </span>
            <span class = "tnc">
                <input type="checkbox" class="checkbox" value = "ticked" name = "tnc">
               <p> I agree to the <a href="#">Terms</a> and <a href="#">Private Policy</a></p>
            </span>
        </form>
    </div>
    <div class="image">
    <a href = "signin.php"><p class = "goto-next-page">Sign In</p></a>
        <img src="images/person.jpg" alt="image">
    </div>
</body>
</html>