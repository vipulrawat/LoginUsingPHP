<?php
    require 'db.php';
     session_start();
        if(isset($_SESSION['user_id'])){
          header("Location: /loginMark2");
        }
    $message='';
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $e=$_POST['email'];
        $p=password_hash($_POST['password'],PASSWORD_BCRYPT);
    //  TO CHECK THE WHETHER THE EMAIL ALREADY EXISTS
    $sql2="SELECT email FROM users WHERE email='$e'";
    $result=$conn->query($sql2);
    $emailcheck=mysqli_num_rows($result);
    if ($emailcheck>0) {

      header("Location: ./register.php?error=email");
      exit();
    }
    else{
          $sql="INSERT INTO users(email,pass) VALUES ('$e','$p');";
          //$conn->query($sql);
          if($conn->query($sql)===TRUE){
            $message="User created successfully";
          }else {
            $message="Some error have occured";
          }
        }
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
    </div><br>
    <?php
          $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

          if(strpos($url,'error=email')!== false){
            echo "The user already exits";
          }


     ?>
    <span id="msg">
    <?php
    if(!empty($message)){
      echo "<p><u>".$message."</u></p>";
    }
    ?>
  </span>
    <h1>Register Below</h1>
      <span>or <a href="login.php">login here</a></span>

      <form action="register.php" method="post">
        <input type="email" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="and password">
        <input type="password" placeholder="confirm password">
        <input type="submit" name="submit" value="Register">
      </form>

  </body>
</html>
