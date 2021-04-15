<?php
require_once('../connect/connect.php');
?>
<?php if($_SESSION["loginStatus"]=="Admin"){?>
<nav class="navbar sticky-top  navbar-expand-lg navbar-dark bg-info Myfont  " >
  <a class="navbar-brand " href="index.php" style="font-family: 'Sriracha'; " role="button">
    Clinic Beauty Center
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link text-light" href="AllMember.php">สมาชิก</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="../AllClinic.php">คลินิก</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="registerServiceType.php">ประเภทบริการ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="../All_Article.php">บทความ</a>
      </li>
      <li class="nav-item"></a>
      </li>
    </ul>
      <ul class="navbar-nav">
      <li class="nav-item">
      <a  class="nav-link  text-light "  href="admin.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION['admin_ID'].'@Confirm'); ?>" role="button">
      Admin : <?php echo $_SESSION["email"]; ?> </a>
      </li>
      <li class="nav-item">
      <a class="nav-link  text-light" href="../logout.php">ออกจากระบบ</a>
      </li>
      </ul>
  </div>
</nav>
<?php } ?>
