<?php 
require '../database/db.inc.php';
include '../non-pages/header.php';
?>


<link rel="stylesheet" href="../repository/css/setting.css">
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="../mail">iMails</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;&nbsp;About Me</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my_activities.php"><i class="fas fa-chart-line"></i>&nbsp;&nbsp;&nbsp;My Activities</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="recovery.php"><i class="fas fa-recycle"></i>&nbsp;&nbsp;&nbsp;Recovery</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="theme.php"><i class="far fa-image"></i>&nbsp;&nbsp;&nbsp;Theme</a>
      </li> 
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; My Account &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#"><i class="fas fa-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['fname']; echo ' '; echo $_SESSION['lname']; ?> </a>
            <a class="dropdown-item" href="#"><i class="fas fa-envelope-open"></i>&nbsp;&nbsp; <?php echo $_SESSION['mail']; ?></a>
            <a class="dropdown-item" href="../forms/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
          </div>
        </li>
    </ul>
  </div>  
</nav>