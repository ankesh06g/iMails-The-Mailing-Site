<?php
	
	session_start();			
    require '../database/db.inc.php';

    $a = $_SESSION['mail'];
    
    $sql = " CALL `logout`('$a');";
    $result = mysqli_query($mysqli, $sql);
    
    require 'logout_reg.php';
    
?>