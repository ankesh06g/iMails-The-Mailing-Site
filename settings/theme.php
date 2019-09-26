<?php 
session_start();
require '../database/db.inc.php';
include '../non-pages/setting_head.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['submit'])) { 

        require 'theme.inc.php';
        
    }
}

  $mail = $_SESSION['mail'];

  $sql = "SELECT * FROM theme WHERE C_id= '$mail';";
  $result = mysqli_query($mysqli, $sql);
  $inbox=mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_array($result))
      {
          $opt = "<div class='heading3'> Last changed on:</div>";
          $opt .= $row['Date'];
     }
  }
  else
  {
          $opt = "<div class='heading3'> Last changed on:</div>";
          $opt .= 'Null';
  }
 ?> 

<link rel="stylesheet" href="../repository/css/theme.css">
<link rel="stylesheet" href="../repository/css/setting.css">
<br><br>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <div class="heading1">
      Wallpapers
    </div><br><br>
    <?php echo $opt; ?>  
    <br><br>
  </div>
  <div class="col-sm-4"></div>
</div><br><br>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form method="post" enctype="multipart/form-data">
            <label class="btn btn-primary" data-toggle="collapse" data-target="#demo">choose theme</label><br><br>
             <div id="demo" class="collapse">
                <div class="container-fluid">
                    <div class="theme-toolbar">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="radio" id="1" name="gc_theme" value="">
                                <label for="1">
                                    <img src="../repository/img/1.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="2" name="gc_theme" value="2">
                                <label for="2">
                                    <img src="../repository/img/2.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="3" name="gc_theme" value="3">
                                <label for="3">
                                    <img src="../repository/img/3.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="4" name="gc_theme" value="4">
                                <label for="4">
                                    <img src="../repository/img/4.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="5" name="gc_theme" value="5">
                                <label for="5">
                                    <img src="../repository/img/5.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="6" name="gc_theme" value="6">
                                <label for="6">
                                    <img src="../repository/img/6.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="7" name="gc_theme" value="7">
                                <label for="7">
                                    <img src="../repository/img/7.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="8" name="gc_theme" value="8">
                                <label for="8">
                                    <img src="../repository/img/8.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="9" name="gc_theme" value="9">
                                <label for="9">
                                    <img src="../repository/img/9.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="10" name="gc_theme" value="10">
                                <label for="10">
                                    <img src="../repository/img/10.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="11" name="gc_theme" value="11">
                                <label for="11">
                                    <img src="../repository/img/11.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                             <div class="col-sm-4">
                                <input type="radio" id="12" name="gc_theme" value="12">
                                <label for="12">
                                    <img src="../repository/img/12.jpg" class="img-fluid theme-image">
                                    <i class="far fa-check-circle"></i>
                                </label>
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                              <center>
                                <div class="next-button">
                                  <button type="submit" name="submit" id="submit" value="submit" class="btn btn-success">Update</button>
                                </div>
                              </center>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-4"></div>
</div>
<br><br>

<?php  include '../non-pages/footer.php';  ?> 