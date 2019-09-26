<?php 
session_start();
require '../database/db.inc.php';
include '../non-pages/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['submit'])) { 

        require 'signin.inc.php';
        
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
                <h1>Signin</h1>
                <h4>in your iMails Account</h4>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-box">
                                <input type="text" value="<?php
                                                             if(isset($_SESSION['mail']))
                                                             echo $_SESSION['mail']; 
                                                        ?>" 
                                name="u_mail" required/>
                                <label>Email *</label>
                                <spam >eg.demo@imails.tk</spam>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-box">
                                <input type="password" name="u_password" required/>
                                <label>Password *</label>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="next-button">
                            <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                    <label id="forgot-label"><a href="signup.php">Create Account?</a></label>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>      

<?php  include '../non-pages/footer.php';  ?>   