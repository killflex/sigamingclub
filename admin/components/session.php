<?php
  session_start();
  if($_SESSION['status']!="login"){
      header("location:../index.php");
  }
  if ($_SESSION['role']!="admin") {
      header("location:../index.php");
  }
?>