<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LoginMark2</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="header">
        <a href="index.php">Home</a>
    </div>
    <?php if(isset($_SESSION['user_id'])) :?>
      <br>WELCOME! You are successfully logged in.
      <br><a href="logout.php">Logout</a>
    <?php else: ?>
    <h1>Please Login or Register</h1>
    <a href="login.php">Login</a> or
    <a href="register.php">Register</a>

  <?php endif; ?>
  </body>
</html>
