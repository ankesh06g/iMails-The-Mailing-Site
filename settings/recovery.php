<?php  
session_start();
include '../non-pages/setting_head.php';  
require '../database/db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['submit'])) { 

        require 'recovery.inc.php';
    }
}

$mail = $_SESSION['mail'];
$lname = $_SESSION['lname'];
$fname = $_SESSION['fname']; 
 
  $sql = "SELECT * FROM log_recovery WHERE C_id= '$mail' order by date asc;";
  $result = mysqli_query($mysqli, $sql);
  $inbox=mysqli_num_rows($result);
  $opt = "";
  if (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_array($result))
      {
          $opt = "<div class='heading3'> Recovery Mail :</div>";
          $opt .= $row['Email'];
          $opt .= "<div class='heading3'> Last changed on:</div>";
          $opt .= $row['Date'];
     }
  }
  else
  {
    $opt = "<div class='heading3'> Recovery Mail :</div>";
          $opt .= 'Not Filled';
          $opt .= "<div class='heading3'> Last changed on:</div>";
          $opt .= 'Null';
  }
?>
<br><br>
<div class="row">
  <div class="col-sm-12">
    <div class="heading1">
      Account Recovery Option
    </div>
  </div>
</div><br><br>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <?php echo $opt; ?>  
    <br><br><br><br><br><br>
    <div class="heading3">
      Change Recovery Option
    </div><br>
    <form method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-12">
          <div class="input-box">
             <input type="text" name="r_mail" required/>
              <label>Recovery Mail</label>
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
  <div class="col-sm-3"></div>
</div>
<br><br>
   

<?php  include '../non-pages/footer.php';  ?>  

