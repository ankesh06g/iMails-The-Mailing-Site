<?php

    $_SESSION['mail'] = mysqli_real_escape_string($mysqli,$_POST['u_mail']);
    $u_mail = mysqli_real_escape_string($mysqli,$_POST['u_mail']);
    $u_password = mysqli_real_escape_string($mysqli,$_POST['u_password']);  
    
    $sql = "select * from customers where C_id= '$u_mail';";
    $result = mysqli_query($mysqli, $sql);
    
    if (mysqli_num_rows($result) == 0)
    {
        $_SESSION['message'] = "
                    <div class='alert alert-warning'>
                        <strong>Warning!</strong> User with this email not exists!
                    </div>
                    ";
        require '../pages/message.php';
    }
    else
    {   
        if($row = mysqli_fetch_assoc($result)) 
        {
            if ($u_password == $row['Password'])
            {
                $a = $row['C_id'];
                $_SESSION['mail'] = $row['C_id'];
                $_SESSION['fname'] = $row['Fname'];
                $_SESSION['lname'] = $row['Lname'];
                $sql = "CALL `login_success`('$a');";
                $result = mysqli_query($mysqli, $sql);
                $sql = "CALL `login_alert`('$a');";
                $result = mysqli_query($mysqli, $sql);
                echo"<script type='text/javascript'>
                            window.location.href = '../mail';
                            </script>";
            }
            else
            {
                $a = $row['C_id'];
                $sql = "CALL `login_fail`('$a');";
                $result = mysqli_query($mysqli, $sql);
                $sql = "CALL `login_fail_alert`('$a');";
                $result = mysqli_query($mysqli, $sql);
                $_SESSION['message'] = "
                    <div class='alert alert-warning'>
                        <strong>Warning!</strong> Incorrect password!
                    </div>
                    ";
                require '../pages/message.php';
            }
        }
    }
