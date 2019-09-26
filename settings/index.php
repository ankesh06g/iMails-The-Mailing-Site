<?php
session_start();
require '../database/db.inc.php';
include '../non-pages/setting_head.php'; 

if(isset($_SESSION['mail']))
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        if (isset($_POST['submit'])) { 

        require 'about.inc.php';
        
        }
    }
    $a = $_SESSION['mail'];
    $sql = "SELECT * FROM `customers` WHERE C_id= '$a';";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        if($row = mysqli_fetch_array($result))
        {
            $fname = $row['Fname'];
            $lname = $row['Lname'];
            $b_date = $row['B_date'];
            $gender = $row['Gender'];
        }
    }
}
else
{
    echo"<script type='text/javascript'>
                window.location.href = 'http://imails.tk/forms/signin.php';
            </script>";  
}


?>
<br><br>
<div class="row">
  <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <div class="row">
        <div class="col-sm-12">
          <div class="heading1">
            Hi, <?php echo $_SESSION['fname'];?>
          </div>
          <div class="heading3">
            <center><?php echo $_SESSION['mail'];?></center>
          </div>
        </div>
      </div><br><br>
    <form method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-12">
          <div class="input-box">
            <input type="text" value="<?php echo $fname; ?>" name="a_fname" required/>
            <label>First Name *</label>
          </div>
        </div>
      </div><br><br>
      <div class="row">
        <div class="col-sm-12">
          <div class="input-box">
            <input type="text" value="<?php echo $lname; ?>"name="a_lname" required/>
            <label>Last Name *</label>
          </div>
        </div>
      </div><br><br>
      <div class="row">
        <div class="col-sm-12">
          <div class="input-box">
            <input type="date" value="<?php echo $b_date; ?>" name="a_b_date" required/>
            <label>Birth date </label>
          </div>
        </div>
      </div><br><br>
      <div class="row">
        <div class="col-sm-12">
          <div class="input-box">
            <input type="text" value="<?php echo $gender; ?>"name="a_gender" required/>
            <label>Gender </label>
          </div>
        </div>
      </div><br><br>
      <div class="row">
        <div class="col-sm-12">
          <center>
            <div class="next-button">
              <button type="submit" name="submit" id="submit" value="submit" class="btn btn-success">Update</button>
            </div>
          </center>
         </div>
      </div>
   </form>
  </div>
  <div class="col-sm-4"></div>
</div>    
<br><br>
<?php  include '../non-pages/footer.php';  ?>   