<?php 
session_start();
require '../database/db.inc.php';
include '../non-pages/setting_head.php'; 

$mail = $_SESSION['mail'];
$lname = $_SESSION['lname'];
$fname = $_SESSION['fname']; 
 
  $sql = "SELECT * FROM log_activity WHERE C_id= '$mail' order by date desc;";
  $result = mysqli_query($mysqli, $sql);
  $inbox=mysqli_num_rows($result);
  $opt = "";
  if (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_array($result))
      {
          $opt .= "<tr>
          <td >     ";
          $opt.= $row['Message'];
          $opt .= "</td>
            <td>";
          $opt .= $row['Date'];
          $opt .= "</td>
            </tr>";
     }
  }
  else
  {
    $opt .= "<tr>
              <td><center>Sorry, you don't have any activity</center></td>
             </tr>";
  }
?>
<br><br>
<div class="row">
  <div class="col-sm-12">
    <div class="heading1">
      Device Activity & Security Events
    </div>
  </div>
</div><br><br>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <table class="mailList table table-hover" id="MailList">
      <?php echo $opt; ?>  
    </table>
  </div>
  <div class="col-sm-3"></div>
</div>
<br><br>
<?php  include '../non-pages/footer.php';  ?>  

