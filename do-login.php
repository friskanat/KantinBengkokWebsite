<?php
  session_start();
  include('dbconnect.php');
  $pass = "ha".$_POST[password]."ut";
  $res = $db->query("select * from user where username='".$_POST[username]."' and password=md5('".$pass."');");

  if (mysqli_num_rows($res)>0){
    $user = $res->fetch_assoc();
    $_SESSION[username] = $user[username];
    $_SESSION[nama] = $user[nama];
    header("Location: dashboard.php");
  } else {
    header("Location: login.php");
  }
?>
