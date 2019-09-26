<?php

    $theme = mysqli_real_escape_string($mysqli,$_POST['gc_theme']);

    $a = $_SESSION['mail'];
    $sql = "UPDATE `theme` SET `theme`= '$theme' ,`Date`= CURRENT_TIMESTAMP  WHERE `C_id` = '$a';";
    if(mysqli_query($mysqli, $sql))
    {
    	mysqli_query($mysqli, $sql);
    	$_SESSION['message'] = "
                <div class='alert alert-success'>
                    <strong>Warning!</strong> Wallpaper updated successfuly!
                </div>
                ";
    require '../pages/message.php';
    }
    else{
    	$_SESSION['message'] = "
                <div class='alert alert-warning'>
                    <strong>Warning!</strong> Wallpaper not updated successfuly!
                </div>
                ";
    require '../pages/message.php';
    }