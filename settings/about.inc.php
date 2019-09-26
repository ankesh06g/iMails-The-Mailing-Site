<?php

    $u_first_name = mysqli_real_escape_string($mysqli,$_POST['a_fname']);
    $u_last_name = mysqli_real_escape_string($mysqli,$_POST['a_lname']);
    $B_date = mysqli_real_escape_string($mysqli,$_POST['a_b_date']);
    $Gender = mysqli_real_escape_string($mysqli,$_POST['a_gender']);

    $a = $_SESSION['mail'];
    $sql = "UPDATE `customers` SET `Fname`='$u_first_name', `Lname`='$u_last_name', `B_date`='$B_date', `Gender`='$Gender' WHERE `C_id` = '$a';";
    
    if(mysqli_query($mysqli, $sql))
    {
    	$sql = "CALL `cng_about`('$a');";
    	mysqli_query($mysqli, $sql);
    	$_SESSION['message'] = "
                <div class='alert alert-success'>
                    <strong>Warning!</strong> About info updated successfuly!
                </div>
                ";
    require '../pages/message.php';
    }
    else{
    	$_SESSION['message'] = "
                <div class='alert alert-warning'>
                    <strong>Warning!</strong> About info not updated successfuly!
                </div>
                ";
    require '../pages/message.php';
    }