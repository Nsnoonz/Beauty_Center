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
    <div class="container" style="box-shadow: 0px 0px 3px #000;min-height:1000px;">
      <br>
      <center>
      <p class="" style="font-size:18px;">แพทย์ประจำคลินิก</p>
      <?php
     $sql1 = "SELECT * FROM clinic,doctor WHERE clinic.clinic_ID=doctor.clinic_ID and clinic.clinic_ID =$clinic_ID";
     $result_sql = mysqli_query($dbConnect, $sql1);
      if(mysqli_affected_rows($dbConnect)==0){echo "<p>ไม่มีข้อมูล </p>"; }?>
      <a  style="" href="registerDoctor.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>">+แพทย์ประจำคลินิก</a></center>
       <?php while($row = mysqli_fetch_array($result_sql)){ ?>
        <center>
          <div class="col-9">
            <br>
            <div class="card">
              <div class="row no-gutters">

                 <div class="col-md-3">
                   <img src="D_profile/<?php echo $row['doctor_Image']; ?>" class="img-fluid">
                 </div>
                  <div class="col-sm-6">
                    <div class="card-body text-left">
                    <h5 class="card-title"><?php echo $row['doctor_Name'] ; ?> <?php echo $row['doctor_Surname'] ; ?></h5>
                    <span class="card-text">เลขที่ใบอนุญาต <?php echo $row['doctor_License']; ?></span>
                    <span class="card-text"> <?php echo $row['doctor_Details']; ?></span>
                    <span >แก้ไขภาพโปรไฟล์แพทย์</span>
                    <form action="changeProfileDoctor.php" method="post" enctype="multipart/form-data">
                      <div class="form-row " style="box-shadow:0px 0px 0px ; padding:5px;">
                        <div class="col-12"  >
                           <input type="hidden" name="doctor_ID" value="<?php echo  $row["doctor_ID"]; ?>" >
                           <input type="hidden" name="doctor_Name" value="<?php echo  $row["doctor_Name"]; ?>" >
                          <input type="hidden" name="clinic_ID" value="<?php echo  $row["clinic_ID"]; ?>" >
                          <input type="file"name="doctor_Image" accept="image/*"  >
                       </div>
                           <div class="col-sm">
                           <input class="btn btn-outline-primary  btn-sm "  style="margin-top: 5px;"  type="submit" value="แก้ไขภาพ" >
                         </div>
                         </div>
                         </form>
                      </div>
                  </div>
                  <div class="col-md-3" style="box-shadow:0px 0px 1px ;" >
                    <img src="ImagePermit/<?php echo $row['doctor_ImagePermit']; ?>" class=" img-fluid w-100">
                    <span class="text-center" >เปลี่ยนภาพใบอนุญาต</span>
                    <form action="changeLicenseDoctor.php" method="post" enctype="multipart/form-data">
                      <div class="form-row "  style="padding:5px;" >
                        <div class="col-12">
                         <input type="hidden" name="doctor_ID" value="<?php echo  $row["doctor_ID"]; ?>" >
                         <input type="hidden" name="doctor_Name" value="<?php echo  $row["doctor_Name"]; ?>" >
                         <input type="hidden" name="clinic_ID" value="<?php echo  $row["clinic_ID"]; ?>" >
                          <input type="file" name="doctor_ImagePermit" accept="image/*" >
                        </div>
                          <div class="col-sm text-left">
                          <input class="btn btn-outline-primary  btn-sm" style="margin-top: 5px;" type="submit"  value="แก้ไขภาพ">
                          </div>
                      </div>
                    </form>
                  </div>


              </div>
              <div class="card-footer text-right">
               <span class="text-muted" style="font-Size:20px;">
                 <a  class="btn btn-primary" href="editeDoctor.php?doctor_ID=<?php echo  $row["doctor_ID"]; ?>&token=<?php echo md5( $row["doctor_ID"].'@Confirm'); ?>" role="button">แก้ไข</a>
                 <a class="btn btn-danger" onclick="return confirm('confirm Delete ?')" href="deleteDoctor.php?doctor_ID=<?php echo  $row["doctor_ID"]; ?>&clinic_ID=<?php echo   $row["clinic_ID"];?>&token=<?php echo md5( $row["clinic_ID"].'@Confirm'); ?>" role="button">ลบ</a>
               </span>
               </div>
            </div>
          </div>
        </center>



        <?php } ?>
        </center>
            <br><br>
    </div>

    <?php include("../footer.php"); ?>

</body>
</html>
