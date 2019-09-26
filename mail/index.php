<?php

session_start();

if(isset($_SESSION['mail']))
{
  require 'mymails.php';
}
else
{
  require '../forms/signin.php';
}


?>