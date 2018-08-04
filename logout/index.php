<?php
session_start();
if(isset($_SESSION['admin']) || isset($_SESSION['name'])  || isset($_SESSION['email'])  ){
    unset($_SESSION['name']);
     unset($_SESSION['email']);
     unset($_SESSION['admin']);
  
    header("location:../");
}


?>