<?php require_once('../connect/connect.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Center</title>
    <link rel="icon" href="../img/clinic.ico">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/webstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"  />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
        <style>
    .custom-file-input.selected:lang(th)::after {
      content: "" !important;
    }
    .custom-file {
      overflow: hidden;
    }
    .custom-file-input {
      white-space: nowrap;
    }
  </style>
</head>
<body class="Myfont">
  <?php
  include ('navbar.php');
  $admin_ID = $_REQUEST["admin_ID"];
  if( empty($_GET['admin_ID']) || ( $_GET['token'] != md5($_GET['admin_ID'].'@Confirm') )){
   exit('รหัสไม่ถูกต้อง');
} else {
  $query1 = "SELECT * FROM admin WHERE admin_ID = $admin_ID";
  $result1 = mysqli_query($dbConnect, $query1);
  $row1 = mysqli_fetch_array($result1);
}
  ?>
  <br> <br>
    <div class="container Myfont"style="min-height:1000px;" >
      <div class="row" >
   <div class="col-xl-4 " style=" box-shadow:0px 0px 5px #000; padding:15px; border-radius: 10px;">
     <center>
     <img src="profile/<?php echo $row1['admin_Image'] ?>" class="img-fluid img-thumbnail w-75 ">
       <p>รูปโปรไฟล์</p>
      </center>
       <form action="changeIMG-Admin.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="admin_ID"value="<?php echo  $_SESSION["admin_ID"]; ?>" >
         <input type="hidden" name="admin_Name"value="<?php echo  $row1["admin_Name"]; ?>" >
         <div class="input-group">
             <div class="custom-file">
               <input type="file" name="admin_Image" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput">
               <label class="custom-file-label" for="customFileInput">แก้ไขรูปโปรไฟล์</label>
             </div>
             <div class="input-group-append">
               <button name="submit"class="btn btn-warning" type="submit" id="customFileInput">เปลี่ยน</button>
             </div>
           </div>
       </form>
<br>
     <ul class="nav nav-pills flex-column" style="font-size:18px;" >
             <li class="nav-item">
          <a class="nav-link " href="editeAdmin.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION["admin_ID"].'@Confirm'); ?>" role="button">แก้ไขข้อมูลส่วนตัว</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="changePassAdmin.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION["admin_ID"].'@Confirm'); ?>" role="button">แก้ไขรหัสผ่าน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">รายการจอง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">ตรวจสอบสถานะการจอง</a>
        </li>
      </ul>
   </div>
   <div class="col-sm-2"  >
   </div>
    <div class="col-xl-6" style="font-size:18px;"  >
      <p style="text-align: center;padding-top:15px;" >ข้อมูล Admin :  <?php echo $row1['admin_Name'];?> <?php echo $row1['admin_Surname'];?></p>
      <p>รหัสสมาชิก : <?php echo $row1['admin_ID'];?></p>
      <p>ชื่อ : <?php echo $row1['admin_Name'];?></p>
      <p>นามสกุล : <?php echo $row1['admin_Surname'];?></p>
      <p>เบอร์โทร : <?php echo $row1['admin_Phone'];?></p>
      <p>ที่อยู่ : <?php echo $row1['admin_Address'];?></p>
      <p>Email : <?php echo $row1['admin_Email'];?></p>
    </div>
    </div>
  </div>
      <?php include("../footer.php"); ?>
    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
          var name = document.getElementById("customFileInput").files[0].name;
          var nextSibling = e.target.nextElementSibling
          nextSibling.innerText = name
        })
      </script>
  </body>
</html>