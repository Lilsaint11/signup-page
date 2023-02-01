<?php
     $servername = "localhost";
     $username = "username";
     $password = "password";
     $dbname = "project1db";
  
     $conn = new mysqli($servername,$username,$password,$dbname);
     if($conn->connect_error) {
         die("connection failed: " . mysqli_connect_error());
     }

    $firstName = $lastName = $userName = $passWord = $repeatPassWord = $tnc= $passWordErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
         $userName = $_POST["username"];
         $passWord = $_POST["password"];

         $sql = "SELECT username,passwordkey FROM p1applicants WHERE username = '$userName' AND passwordkey = '$passWord'";
         $result = mysqli_query($conn,$sql);
         if(mysqli_num_rows($result) > 0){
             header("Location: mainpage.php");
         }else{
             $passWordErr = "Invalid Username or Password!";
         }
     }
?>