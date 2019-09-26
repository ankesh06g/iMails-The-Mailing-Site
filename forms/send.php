<?php
    
    $m_from = $_SESSION['mail'];
    $m_to = mysqli_real_escape_string($mysqli,$_POST['m_to']);
    $m_sub = mysqli_real_escape_string($mysqli,$_POST['m_sub']);
    $m_msg = mysqli_real_escape_string($mysqli,$_POST['m_msg']);
    $m_date = date("Y/m/d");
    $m_time = date("h:i:sa");;
                

    if($m_to == '' OR $m_sub == '' OR $m_msg == '')
    {
        $sql = "INSERT INTO `mails`(`c_1`, `c_2`, `sub`, `message`, `date`,`draft`) VALUES ('$m_from', '$m_to', '$m_sub', '$m_msg', CURRENT_TIMESTAMP, 1);";

        if(mysqli_query($mysqli,$sql))
        {
           echo"<script type='text/javascript'>
                            window.location.href = '../mail';
                            </script>";
        }
        else{
            echo "error";
        }
    }
    else
    {
        $sql = "INSERT INTO `mails`(`c_1`, `c_2`, `sub`, `message`, `date`) VALUES ('$m_from', '$m_to', '$m_sub', '$m_msg', CURRENT_TIMESTAMP);";

        if(mysqli_query($mysqli,$sql))
        {
           echo"<script type='text/javascript'>
                            window.location.href = '../mail';
                            </script>";
        }
        else{
            $sql = "INSERT INTO `mails`(`c_1`, `sub`, `message`, `date`, `draft`) VALUES ('$m_from', '$m_sub', '$m_msg', CURRENT_TIMESTAMP, 1);";

            if(mysqli_query($mysqli,$sql))
            {
               echo"<script type='text/javascript'>
                                window.location.href = '../mail';
                                </script>";
            }
        }
    }
    

?>