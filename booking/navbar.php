<?php require_once('../connect/connect.php');
error_reporting( error_reporting() & ~E_NOTICE );
?>
<?php session_start(); ?>
<?php if($_SESSION["loginStatus"]=="Member"){ ?>
<nav class="navbar sticky-top  navbar-expand-lg navbar-dark bg-info Myfont">
  <!-- <a class="navbar-brand" href="index.php?member_ID=<?php echo  $_SESSION["member_ID"]; ?>&token=<?php echo md5( $_SESSION['member_ID'].'@Confirm'); ?>" role="button">Clinic Beauty Center</a> -->
  <a class="navbar-brand " href="../index.php" style="font-family: 'Sriracha'; " role="button">
    Clinic Beauty Center
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <!-- <a class="nav-link" href="index.php?member_ID=<?php echo  $_SESSION["member_ID"]; ?>&token=<?php echo md5( $_SESSION['member_ID'].'@Confirm'); ?>" role="button">หน้าหลัก<span class="sr-only">(current)</span></a> -->
        <a class="nav-link  text-light" href="../index.php">หน้าหลัก</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-light" href="../All_Article.php">บทความความงาม</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-light" href="../AllClinic.php">คลินิก</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-light" href="../aboutUS.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-light"  href="../SearchMap.php"> ค้นหา  <img src="../img/loupe.png"></a>
      </li>
    </ul>
      <ul class="navbar-nav">
      <li class="nav-item">
      <a  class="nav-link  text-light" href="../member/profileMember.php?member_ID=<?php echo  $_SESSION["member_ID"]; ?>&token=<?php echo md5( $_SESSION['member_ID'].'@Confirm'); ?>" role="button">
      บัญชีของคุณ : <?php echo $_SESSION["email"]; ?></a>
      </li>
      <li class="nav-item">
      <a class="nav-link  text-light" href="../logout.php">ออกจากระบบ</a>
      </li>
      </ul>
  </div>
</nav>
<?php } else if($_SESSION["loginStatus"]=="Clinic"){ ?>
<nav class="navbar sticky-top  navbar-expand-lg navbar-dark bg-info Myfont">
  <a class="navbar-brand" style="font-family: 'Sriracha'; " href="index.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION['clinic_ID'].'@Confirm'); ?>" role="button">
  Clinic Beauty Center</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link  text-light" href="index.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION['clinic_ID'].'@Confirm'); ?>" role="button">หน้าหลัก<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-light" href="#">บริการของคุณ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-light"  href="../clinic/AllBooking.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION['clinic_ID'].'@Confirm'); ?>">รายการจอง</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-light" href="../clinic/payment.php">ชำระค่าบริการ</a>
      </li>
      <li class="nav-item"></a>
      </li>
    </ul>
      <ul class="navbar-nav">
      <li class="nav-item">
      <a  class="nav-link text-light" href="profileClinic.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION['clinic_ID'].'@Confirm'); ?>" role="button">
      คลินิก : <?php echo $_SESSION["email"]; ?> </a>
      </li>
      <li class="nav-item">
      <a class="nav-link  text-light" href="logout.php">ออกจากระบบ</a>
      </li>
      </ul>
  </div>
</nav>
<?php } else if($_SESSION["loginStatus"]=="Admin"){ ?>
<nav class="navbar sticky-top  navbar-expand-lg navbar-dark bg-info Myfont">
  <!-- <a class="navbar-brand" href="index.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION['admin_ID'].'@Confirm'); ?>" role="button">Clinic Beauty Center</a> -->
  <a class="navbar-brand" style="font-family: 'Sriracha'; " href="../admin/index.php" role="button">Clinic Beauty Center</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link text-light" href="../admin/AllMember.php">สมาชิก</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="../AllClinic.php">คลินิก</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="../admin/registerServiceType.php">ประเภทบริการ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="../All_Article.php">บทความ</a>
      </li>
      <li class="nav-item"></a>
      </li>
    </ul>
      <ul class="navbar-nav">
      <li class="nav-item">
      <a  class="nav-link text-light" href="../admin/admin.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION['admin_ID'].'@Confirm'); ?>" role="button">
      Admin : <?php echo $_SESSION["email"]; ?> </a>
      </li>
      <li class="nav-item">
      <a class="nav-link text-light" href="logout.php">ออกจากระบบ</a>
      </li>
      </ul>
  </div>
</nav>
<?php } ?>
