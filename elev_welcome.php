<?php
session_start();
if(empty($_SESSION["username"]))
{
  header("location: public_login.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
