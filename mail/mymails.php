<?php

    require '../database/db.inc.php';

    $mail = $_SESSION['mail'];
    $lname = $_SESSION['lname'];
    $fname = $_SESSION['fname']; 
 
    $sql = "SELECT * FROM mails WHERE c_2= '$mail'  AND trash=0  AND draft=0;";
    $inbox=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $sql = "SELECT * FROM mails WHERE c_1= '$mail' AND trash=0  AND draft=0;";
    $sent=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $sql = "SELECT * FROM mails WHERE c_1= '$mail' AND draft=1;";
    $draft=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $sql = "SELECT * FROM mails WHERE c_1= '$mail'  AND trash=1 ;";
    $trash1=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $sql = "SELECT * FROM mails WHERE c_2= '$mail'  AND trash=1 ;";
    $trash2=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $trash = $trash1 + $trash2;
    $sql = "SELECT * FROM mails WHERE c_1= '$mail'  AND trash=0  AND draft=0 AND star=1;";
    $star1=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $sql = "SELECT * FROM mails WHERE c_2= '$mail'  AND trash=0  AND draft=0 AND star=1;";
    $star2=mysqli_num_rows(mysqli_query($mysqli, $sql));
    $star= $star1 + $star2;
    
    $sql = "SELECT * FROM `theme` WHERE  `C_id`= '$mail';";
    $result=mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        if($row = mysqli_fetch_array($result))
        {
            $theme = $row['theme'];
        }
    }
    $x = "background-image: url('../repository/img/";
    $x .= $theme;
    $x .= ".jpg');";
  
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        if (isset($_POST['submit'])) { 
    
        require '../forms/send.php';
            
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>iMails</title>
  <meta charset="utf-8">
   <link rel="icon" href="../repository/images/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../repository/css/bootstrap.min.css">
  <link rel="stylesheet" href="../repository/css/main.css">
  <script src="../repository/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="../repository/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body style="<?php echo $x; ?>">
<div class="container-fluid"> 
  <div class="row ">
    <div class="col-sm-2">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="logo">iMails</h1>
        </div>
      </div>
    </div>
    <div class="col-sm-10"><br>
       <div class="row" >
        <div class="col-sm-1">
          <a href="#"><i class="bar  fas fa-arrow-left"></i></a>
        </div>
        <div class="col-sm-9">
          <input class="bar" type="text" placeholder="Search mail" id="SearchBox" onkeyup="SearchMailFunction()">
        </div>
        <div class="col-sm-2">
          <i class="fas fa-user-circle" data-toggle="dropdown"></i>
            <div class="dropdown-menu">
              <a class="dropdown-item"><i class="fas fa-user"></i>&nbsp;&nbsp; <?php echo $fname; ?> <?php echo $lname; ?></a>
              <a class="dropdown-item"><i class="fas fa-envelope-open"></i>&nbsp;&nbsp; <?php echo $mail; ?></a>
              <a class="dropdown-item" href="../settings"><i class="fas fa-wrench"></i> &nbsp;&nbsp;Settings</a>
              <a class="dropdown-item" href="../forms/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp; Logout</a>
            </div>
        </div>
      </div><br>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2" >
      <center>
        <div class="compose_btn" data-toggle="modal" data-target="#myModal">
          <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Compose
        </div>
      </center><br>
                    <!-- The Modal -->
                      <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Compose</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <style>
                                .box .input-box{
                                        position: relative;
                                    }
                                    .box .input-box input,textarea,select{
                                        width: 100%;
                                        padding: 10px,0;    
                                        font-size: 16px;
                                        margin-bottom: 10px;
                                        border: none;
                                        outline: none;
                                        border-bottom: 1px solid #09BCFF;
                                    }
                                    .box .input-box label{
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        color: #909090;
                                        padding: 10px,0;
                                        font-size: 16px;
                                        pointer-events: none;
                                        transition: .5s;
                                    }

                                    .box .input-box input:focus, textarea:focus{
                                        border-bottom: 2px solid #09BCFF;
                                    }

                                    .box .input-box input:focus ~ label, .box .input-box textarea:focus ~ label,
                                    .box .input-box input:valid ~ label, .box .input-box textarea:valid ~ label{
                                        top: -18px;
                                        left: 0;
                                        color: #09BCFF;
                                        font-size: 13px;
                                    }       
                            </style>
                            <div class="modal-body">
                              <div class="box">
                                <form method="post" enctype="multipart/form-data"><br>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="input-box">
                                        <input type="text" name="m_to" required autocomplete="off"/>
                                        <label>To *</label>
                                      </div>
                                    </div>
                                  </div><br><br>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="input-box">
                                        <input type="text" name="m_sub" autocomplete="off"/>
                                        <label>Sub *</label>
                                      </div>
                                    </div>
                                  </div><br><br>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="input-box">
                                        <textarea name="m_msg"  rows="4" autocomplete="off"></textarea>
                                        <label>Message *</label>
                                      </div>
                                    </div>
                                  </div><br><br>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <center><div class="next-button">
                                          <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Next</button>
                                      </div></center>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
      <div class="row">
          <div class="pils" onclick="inbox()">
            <i class="fas fa-inbox"></i>&nbsp;&nbsp;Inbox
            <spam class="mCount"><?php echo $inbox; ?></spam>
          </div>
      </div>
      <div class="row">
          <div class="pils" onclick="sent()">
            <i class="fab fa-telegram-plane"></i>&nbsp;&nbsp;&nbsp;Sent
            <spam class="mCount"><?php echo $sent; ?></spam>
          </div>
      </div>
      <div class="row">
          <div class="pils" onclick="star()">
            <i class="far fa-star"></i>&nbsp;&nbsp;Starred
            <spam class="mCount"><?php echo $star; ?></spam>
          </div>
      </div>
      <div class="row">
          <div class="pils" onclick="draft()">
            <i class="fas fa-file"></i>&nbsp;&nbsp;&nbsp;Drafts
            <spam class="mCount"><?php echo $draft; ?></spam>
          </div>
      </div>
      <div class="row">
          <div class="pils" onclick="trash()">
            <i class="far fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Trash
            <spam class="mCount"><?php echo $trash; ?></spam>
          </div>
      </div>
    </div>
    <div class="col-sm-10" id="demo">
    </div>
</div>   
</body>
<script src="../repository/js/main.js" type="text/javascript"></script>
</html>
