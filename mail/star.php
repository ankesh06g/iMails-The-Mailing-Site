<?php
session_start();
require '../database/db.inc.php';

$mail = $_SESSION['mail'];
$lname = $_SESSION['lname'];
$fname = $_SESSION['fname']; 
 
  $sql = "SELECT * FROM mails WHERE c_2= '$mail'  AND trash=0  AND draft=0 AND star=1;";
  $result = mysqli_query($mysqli, $sql);
  $inbox=mysqli_num_rows($result);
  $opt = "";
  if (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_array($result))
      {
          $opt .= "<tr>
          <td class='col-1'><i class='far fa-star'></i>&nbsp;&nbsp;";
          $opt.= $row['c_1'];
          $opt .= "</td>
            <td class='col-2'>";
          $opt .= $row['sub'];
          $opt .= "</td>
            <td class='col-3'>";
          $short_msg = substr($row['message'],0,60);
          $opt .= $short_msg;
          $opt .= "</td>
            <td class='col-4'>";
          $opt .= $row['date'];
          $opt .= "</td>
            </tr>";
     }
  $sql = "SELECT * FROM mails WHERE c_1= '$mail'  AND trash=0  AND draft=0 AND star=1;";
  $result = mysqli_query($mysqli, $sql);
  $inbox=mysqli_num_rows($result);
  $opt = "";
  if (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_array($result))
      {
          $opt .= "<tr>
          <td class='col-1'><i class='far fa-star'></i>&nbsp;&nbsp; To:";
          $opt.= $row['c_2'];
          $opt .= "</td>
            <td class='col-2'>";
          $opt .= $row['sub'];
          $opt .= "</td>
            <td class='col-3'>";
          $short_msg = substr($row['message'],0,60);
          $opt .= $short_msg;
          $opt .= "</td>
            <td class='col-4'>";
          $opt .= $row['date'];
          $opt .= "</td>
            </tr>";
     }
  }}
  else
  {
    $opt .= "<tr>
              <td><center>Sorry, you don't have any mail</center></td>
             </tr>";
  }
?>

<table class="mailList table table-hover" id="MailList">
        <?php echo $opt; ?>  
</table>