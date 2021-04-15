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
  </head>
  <body class="Myfont">
    <?php
 include("navbar.php");
 $clinic_ID = $_REQUEST["clinic_ID"];
 if( empty($_GET['clinic_ID']) || ( $_GET['token'] != md5($_GET['clinic_ID'].'@Confirm') ))
 {
   exit('<center><br>รหัสไม่ถูกต้อง</center>');
 }
 ?>
      <div class="container  Myfont" style="box-shadow: 0px 0px 1px #000; min-height:1000px;"><br>
      <p class="text-center" style="font-size:18px;">เวลาทำการคลินิก</p>
    <?php $sql = "SELECT * FROM clinic,clinicday WHERE clinic.clinic_ID=clinicday.clinic_ID and clinic.clinic_ID =$clinic_ID";
      $result = mysqli_query($dbConnect, $sql);
      if(mysqli_affected_rows($dbConnect)==0){echo "<center><p>ไม่มีข้อมูล</p> </center>"; }
      ?>
      <center>
      <a  style="" href="registerClinicday.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>">+เพิ่มบริการของคุณ</a></center>
      <br>


      <div class=" table-responsive  " style="font-size:18px;"  >
        <table class="table   w-100">
          <?php    $query2 = "SELECT * FROM clinic,clinicday WHERE clinic.clinic_ID=clinicday.clinic_ID and clinic.clinic_ID =$clinic_ID ";
            $result2 = mysqli_query($dbConnect, $query2);
            while ($row2=mysqli_fetch_array($result2)) {?>
              <tr>
                <td>วันทำการ</td>
                <td><?php  echo $row2["clinicDay_Name"];  ?></td>
                <td>เวลาเปิดทำการ</td>
                <td><?php echo $row2["clinicDay_Start"]; ?></td>
                <td>เวลาปิดทำการ</td>
                <td><?php echo $row2["clinicDay_End"]; ?></td>
                <td> <a  class="btn btn-primary" href="editeClinicDay.php?clinicDay_ID=<?php echo  $row2["clinicDay_ID"]; ?>&clinic_ID=<?php echo   $row2["clinic_ID"];?>&token=<?php echo md5( $row2["clinic_ID"].'@Confirm'); ?>" role="button">แก้ไข</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('confirm Delete ?')"  href="deleteClinicDay.php?clinicDay_ID=<?php echo  $row2["clinicDay_ID"]; ?>&clinic_ID=<?php echo   $row2["clinic_ID"];?>&token=<?php echo md5( $row2["clinic_ID"].'@Confirm'); ?>" role="button">ลบ</a></td>
              </tr>

<?php } ?>
       </table>
       </div>

</body>

</html>
