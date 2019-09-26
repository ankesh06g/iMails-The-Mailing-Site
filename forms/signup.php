<?php 
require '../database/db.inc.php';
session_start();
include '../non-pages/header.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['submit'])) { 

        require 'signup.inc.php';
        
    }
}
?>
<link rel="stylesheet" href="../repository/css/forms.css" type="text/css">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="box">
                <div class="logo logo-m">
                    iMails
                </div>
                <h1>Sign Up</h1>
                <h4>Create your iMails Account</h4>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6"><br>
                            <div class="input-box">
                                <input type="text"  name="u_first_name" value="<?php
                                                             if(isset($_SESSION['fname']))
                                                             echo $_SESSION['fname']; 
                                                        ?>" autocomplete="off" required/>
                                <label>First name *</label>
                            </div>
                        </div>
                        <div class="col-sm-6"><br>
                            <div class="input-box">
                                <input type="text" name="u_last_name" value="<?php
                                                             if(isset($_SESSION['lname']))
                                                             echo $_SESSION['lname']; 
                                                        ?>" autocomplete="off" required/>
                                <label>Last name *</label>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="input-box">
                                <input type="text" name="u_mail" value="<?php
                                                             if(isset($_SESSION['n_mail']))
                                                             echo $_SESSION['n_mail']; 
                                                        ?>" autocomplete="off" required/>
                                <label>New mail *</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-box">
                                <div class="signup_extension">
                                @imails.tk
                            </div>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-box">
                                <input type="password" name="u_password" autocomplete="off" required/>
                                <label>Password *</label>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-box">
                                <input type="password" name="u_repassword" autocomplete="off" required/>
                                <label>Retype password *</label>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="next-button">
                            <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                    <label id="forgot-label"><a href="signin.php">Sign in?</a></label>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>  
<?php include '../non-pages/footer.php';?>        