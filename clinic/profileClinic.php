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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJMyTKzqxEUXFGz9GinAs4yhv2Zz_C7OM&callback=initMap&libraries=&v=weekly"defer></script>
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
<body>
  <?php
  include ('navbar.php');
  $clinic_ID = $_REQUEST["clinic_ID"];
  if( empty($_GET['clinic_ID']) || ( $_GET['token'] != md5($_GET['clinic_ID'].'@Confirm') )){
   exit('รหัสไม่ถูกต้อง');
 } else {
   $query1 = "SELECT * FROM clinic WHERE clinic_ID = $clinic_ID";
   $result1 = mysqli_query($dbConnect, $query1);
   $row1 = mysqli_fetch_array($result1);
}
?>
<div class=" container-fluid Myfont">
  <center>
    <br>
  <?php  if($row1["Status"] == '0'){ ?> <p class="text-light font-weight-bold bg-warning"style="box-shadow:0px 0px 3px #000; padding:10px; border-radius: 10px; font-size:22px;"  >คลินิกอยู่ในขั้นตอนกำลังรอการอนุมัติ</p> <?php } ?>
  <?php  if($row1["Status"]== '2'){ ?> <p class="text-light  font-weight-bold bg-danger"style="box-shadow:0px 0px 3px #000; padding:10px; border-radius: 10px; font-size:22px;"  >คลินิกของคุณยังไม่ผ่านการอนุมัติ </p>
  <p  class="text-danger  font-weight-bold" >**หมายเหตุ <?php echo $row1['Status_Note'];  ?></p>
  <?php } ?>
  <?php  if(($row1["clinic_Views"] >= 1000) and ($row1["clinic_Views"] <= 1099) ){ ?>
    <p class="text-light  font-weight-bold bg-warning"style="box-shadow:0px 0px 3px #000; padding:10px; border-radius: 10px; font-size:22px;"  >
    คลินิกของคุณจะถูกระงับ กรุณาชำระค่าบริการ <br><span style="font-size:15px; color:#000;">**เนื่องจากคลินิกของคุณมียอดเข้าชมคลินิก จากสมาชิก จำนวน <?php echo $row1["clinic_Views"] ?> ครั้ง คลินิกของคุณจะถูกระงับบริการเมื่อมีจำนวนผู้เข้าชม ครบ 1100 ครั้ง </span> </p> <?php } ?>
  <?php  if($row1["Status"] == '3'){ ?> <p class="text-light  font-weight-bold bg-danger"style="box-shadow:0px 0px 3px #000; padding:10px; border-radius: 10px; font-size:22px;"  >คลินิกของคุณถูกระงับ กรุณาชำระค่าบริการ   <br>       <span style="font-size:14px;">ขออภัย หากคุณได้ชำระค่าบริการแล้ว กรุณารอผู้ดูแลระบบตรวจสอบ</span></p> <?php } ?>
</center>
  <div class="row" >
<div class="col-xl-4 "  >
  <div style="box-shadow:0px 0px 3px #0082fa; padding:15px; border-radius: 10px; min-height: 850px;">
  <ul class="nav nav-pills flex-column" style="font-size:18px;" >
  <li class="nav-item"><a href="../doctor/AllDoctor.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>"><img src="../img/doctor.png" style="margin:10px;">แพทย์ประจำคลินิก</a></li>
  <li class="nav-item"><a href="clinicDay.php?clinic_ID=<?php echo $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>"><img src="../img/medical-appointment.png" style="margin:10px;" alt="">เวลาทำการ</a></li>
  <li class="nav-item"><a href="AllReviews.php?clinic_ID=<?php echo $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>"><img src="../img/add.png" style="margin:10px;" alt="">รีวิวเคสตัวอย่าง</a></li>
  <li class="nav-item"><a class="nav-link " href="editeClinic.php?clinic_ID=<?php echo $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>" role="button">แก้ไขข้อมูลคลินิก</a></li>
  <li class="nav-item"><a class="nav-link " href="changePassClinic.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>" role="button">แก้ไขรหัสผ่าน</a></li>
  <center><p>ใบอนุญาตประกอบการ</p><img src="permit/<?php echo $row1['clinic_ImagePermit'] ?>" class="img-fluid img-thumbnail w-75 "><br>

  </center>

  <?php if($row1['Status'] != '1'){ ?>
<br>  <p class="nav-item text-center text-primary">แก้ไขใบอนุญาตประกอบการ</p>
   <form action="changeImgPermit.php" method="post" enctype="multipart/form-data">
     <input type="hidden" name="clinic_ID"value="<?php echo  $_SESSION["clinic_ID"]; ?>" >
     <input type="hidden" name="clinic_Name"value="<?php echo  $row1["clinic_Name"]; ?>" >
     <div class="input-group">
         <div class="custom-file">
           <input type="file" name="clinic_ImagePermit" class="custom-file-input" accept="image/*"  id="customFileInput" aria-describedby="customFileInput">
           <label class="custom-file-label" for="customFileInput">ใบอนุญาตประกอบการ</label>
         </div>
         <div class="input-group-append">
           <button name="submit"class="btn btn-primary" type="submit" id="customFileInput">เปลี่ยน</button>
         </div>
       </div>
   </form>
   <?php } ?>
<br>
</ul>
<br>
</div>
</div>
<div class="col-sm-8">
  <center>
  <div class="col-10">
    <br>
    <?php   include ('upload.php');  ?>
  </div>
  </center>
    <br>
    <center>
    <div class="col-sm-6">
    <form action="changeImgClinic.php" method="post" enctype="multipart/form-data">
      <div class="form-row ">
        <div class="col-8">
          <input type="hidden" name="clinic_ID"value="<?php echo  $_SESSION["clinic_ID"]; ?>" >
          <input type="hidden" name="clinic_Name"value="<?php echo  $row1["clinic_Name"]; ?>" >
          <input type="file" name="clinic_Image[]" id="clinic_Image" accept="image/*"  multiple>
        </div>
          <div class="col">
          <input class="btn btn-primary btn-sm "  name="submit" type="submit"  value="แก้ไข">
          </div>
      </div>
      </form>
      </div>
  </center>
  <br>
 <div class=" table-responsive  " style="font-size:18px;"  >
   <table class="table   w-100">
      <tr><td width="200">รหัสคลินิก </td><td><?php echo $row1['clinic_ID'];?></td></tr>
      <tr><td>ชื่อคลินิก: </td> <td><?php echo $row1['clinic_Name'];?></td></tr>
      <tr><td>รายละเอียดคลินิก </td> <td><?php echo $row1['clinic_Detail'];?></td></tr>
      <tr>
        <td>ที่อยู่ </td><td>เลขที่ <?php echo $row1['clinic_NumAddress']; ?>&nbsp; <?php echo $row1['clinic_Address_Detil']; ?></td> </tr>
      <tr><td></td><td><?php echo $row1['clinic_Address_GPS'];?></td></tr>
      <tr><td>เบอร์โทร</td> <td><?php echo $row1['clinic_Phone'];?></td></tr>
      <tr><td>Email  </td> <td><?php echo $row1['clinic_Email'];?></td></tr>
      <tr><td>เลขที่ใบอนุญาต </td> <td><?php echo $row1['clinic_NumberPermit'];?></td></tr>
  </table>
 </div>
</div>
</div>
</div>
<div style="height:200px">

</div>
    <?php include("../footer.php"); ?>
<script>
    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
      var name = document.getElementById("customFileInput").files[0].name;
      var nextSibling = e.target.nextElementSibling
      nextSibling.innerText = name
    })
  </script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
