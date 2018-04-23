<?php

session_start();
// Checking if user is logged in
if(isset($_SESSION["username"])){
  if($_SESSION["admin"]) {

    //Redirecting to admin home page

    header("location: admin_welcome.php");

  } else {
    echo "not admin";

    //Redirecting to member home page

    header("location: elev_welcome.php");
  }
}

$db = mysqli_connect("localhost","root","emilemil","test");

if(isset($_POST["username"])){
  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  //Check is user exists with correct password

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($db,$sql);

  if(mysqli_num_rows($result) == 1){

    echo "You logged in as " . $username;
    $_SESSION["username"] = $username;

    //Check if user is admin
    $sql2 = "SELECT * FROM users WHERE username='$username' AND admin='admin'";
    $result2 = mysqli_query($db,$sql2);
    if(mysqli_num_rows($result2) == 1){
      $_SESSION["admin"] = true;
    } else {
      $_SESSION["admin"] = false;
    }
  } else {
    echo "Incorrect username or password";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <!-- Login Form -->

  <div class="container">
    <form method="post" >

    <div>
      <input type="text" name="username" placeholder="Skriv inn brukernavn">
    </div>

    <div>
      <input type="password" name="password" placeholder="Skriv inn passordet ditt">
    </div>

    <div>
      <input type="submit" value="Log In">
    </div>

    </form>
  </div>

  </body>
</html>
