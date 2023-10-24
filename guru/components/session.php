<?php
  session_start();
  if($_SESSION['status']!="login"){
      header("location:../index.php");
  }
  if ($_SESSION['role']!="guru") {
      header("location:../index.php");
  }
?>