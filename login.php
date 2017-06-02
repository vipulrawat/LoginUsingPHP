<?php
    require 'db.php';
    session_start();

    if(isset($_SESSION['user_id'])){
      header("Location: /loginMark2");
    }
    if(!empty($_POST['email']) && !empty($_POST['password'])){
      $e=$_POST['email'];
      $p=$_POST['password'];
      //$sql="SELECT id,email,pass FROM users WHERE email='$e'";
      $sql="SELECT id,pass FROM users WHERE email='$e'";
      $result=$conn->query($sql);
      //echo $result;
      $row=$result->fetch_assoc();
      if(count($row)>0 && password_verify($p,$row['pass'])){
        $_SESSION['user_id']=$row['id'];
        header("Location: /loginMark2");
      }else {
        echo "Login Failed";
      }
      //if(!$row=$result->fetch_assoc()){
        //echo "Your username and password is incorrect";
      //}
      //else {
        //$_SESSION['id']=$row['id'];
        //echo $row['pass'];
      //}


    }

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Here</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>


    <div class="header">
        <a href="index.php">Home</a>
    </div>

    <h1>Login Below</h1>
  <span>or <a href="register.php">register here</a></span>
    <form action="login.php" method="post">
      <input type="email" name="email" placeholder="Enter your email">
      <input type="password" name="password" placeholder="and password">

      <input type="submit" name="submit">
    </form>

  </body>
</html>
