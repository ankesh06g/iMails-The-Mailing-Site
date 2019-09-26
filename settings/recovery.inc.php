<?php

$r_mail = mysqli_real_escape_string($mysqli,$_POST['r_mail']);
$a = $_SESSION['mail'];
    $sql = "UPDATE `recovery` SET `Mail`='$r_mail' WHERE `C_id` = '$a';";
    if(mysqli_query($mysqli, $sql))
    {
    	$sql = "CALL `cng_mail`('$a', '$r_mail');";
    	mysqli_query($mysqli, $sql);
    	$_SESSION['message'] = "
                <div class='alert alert-success'>
                    <strong>Warning!</strong> Recovery mail updated successfuly!
                </div>
                ";
    require '../pages/message.php';
    }
    else{
    	$_SESSION['message'] = "
                <div class='alert alert-warning'>
                    <strong>Warning!</strong> Recovery mail not updated successfuly!
                </div>
                ";
    require '../pages/message.php';
    }