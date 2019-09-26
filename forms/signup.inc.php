<?php
    

    $_SESSION['fname'] = mysqli_real_escape_string($mysqli,$_POST['u_first_name']);
    $_SESSION['lname'] = mysqli_real_escape_string($mysqli,$_POST['u_last_name']);
    $_SESSION['n_mail'] = mysqli_real_escape_string($mysqli,$_POST['u_mail']);

    $u_first_name = mysqli_real_escape_string($mysqli,$_POST['u_first_name']);
    $u_last_name = mysqli_real_escape_string($mysqli,$_POST['u_last_name']);
    $u_mail = mysqli_real_escape_string($mysqli,$_POST['u_mail'])."@imails.tk";
    $u_password = mysqli_real_escape_string($mysqli,$_POST['u_password']);
    $u_repassword = mysqli_real_escape_string($mysqli,$_POST['u_repassword']);
                                   

    $sql = "SELECT * FROM customers WHERE C_id='$u_mail'";
    if ($result=mysqli_query($mysqli,$sql))
    {
         $rowcount=mysqli_num_rows($result);
        if($rowcount > 0)
        {
            $_SESSION['message'] = "
                <div class='alert alert-warning'>
                    <strong>Warning!</strong> User with this email is already exists!
                </div>
                ";
            require '../pages/message.php';

        }
        else 
        { 
            if($u_password != $u_repassword)
            {
                $_SESSION['message'] = "
                                    <div class='alert alert-warning'>
                                        <strong>Warning!</strong> Both password shoud be same!
                                    </div>
                                    ";
                require '../pages/message.php';
            }
            else
            {
                $sql = "INSERT INTO customers(`C_id`, `Fname`, `Lname`, `Password`) VALUES ('$u_mail', '$u_first_name', '$u_last_name', '$u_password')";
                if(mysqli_query($mysqli,$sql))
                {
                    $a = $u_mail;
                    $sql = "CALL `signup`('$a');";
                    $result = mysqli_query($mysqli, $sql);

                    $msg = "Hi". $u_first_name .", Thank you for creating a iMails Account.";

                    $sql = "CALL `welcome`('$a', '$msg');";
                    $result = mysqli_query($mysqli, $sql);

                    $sql = "CALL `theme`('$a');";
                    $result = mysqli_query($mysqli, $sql);

                    $sql = "INSERT INTO recovery(`C_id`) VALUES ('$u_mail')";
                    $result = mysqli_query($mysqli, $sql);

                    $_SESSION['message'] = "
                                    <div class='alert alert-success'>
                                        <strong>Success!</strong> Your account has been created!
                                    </div>
                                    <span class='light'>Now share with your friend...</span></br></br>
                                    <center><label id='forgot-label'><a href='signin.php'>Sign in?</a></label><center>
                                    ";
                     require '../pages/message.php';
                }
            }
        }
    }

?>