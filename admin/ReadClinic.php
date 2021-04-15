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
    $query1 = "SELECT * FROM clinic WHERE clinic_ID =$clinic_ID";
    $result1 = mysqli_query($dbConnect, $query1);
    $row1 = mysqli_fetch_array($result1);
    ?>
    <div class="container" style="box-shadow: 0px 0px 3px #000;min-height:1000px;">
      <center>
        <br>
      <?php  if($row1["Status"] == '0'){ ?> <p class="text-light font-weight-bold bg-warning"style="box-shadow:0px 0px 3px #000; padding:10px; border-radius: 10px; font-size:22px;"  >คลินิกอยู่ในขั้นตอนกำลังรอการอนุมัติ</p> <?php } ?>
      <?php  if($row1["Status"]== '2'){ ?> <p class="text-light  font-weight-bold bg-danger"style="box-shadow:0px 0px 3px #000; padding:10px; border-radius: 10px; font-size:22px;"  >คลินิกของคุณยังไม่ผ่านการอนุมัติ </p>
      <p  class="text-danger  font-weight-bold" >**หมายเหตุ <?php echo $row1['Status_Note'];  ?></p>
      <?php } ?>
      <?php  if(($row1["clinic_Views"] >= 1000) and ($row1["clinic_Views"] <= 1099) ){ ?>
        <p class="text-light  font-weight-bold bg-warning"style="box-shadow:0px 0px 3px #000; padding:10px; border-radius: 10px; font-size:22px;"  >
        คลินิกจะถูกระงับ เนื่องจากไม่ได้ชำระค่าบริการ <br> </p> <?php } ?>
      <?php  if($row1["Status"] == '3'){ ?> <p class="text-light  font-weight-bold bg-danger"style="box-shadow:0px 0px 3px #000; padding:10px; border-radius: 10px; font-size:22px;"  >คลินิกถูกระงับ เนื่องจากไม่ได้ชำระค่าบริการ <br>


      </p> <?php } ?>
    </center>
    <center>
      <div class="fixed-bottom bg-warning">
        <form class="" action="permit.php" method="post">
          <p></p>
          <label for="" class="text-danger  font-weight-bold">หมายเหตุ : </label>
          <input type="text" name="clinic_ID" hidden value="<?php echo $row1['clinic_ID'];?>">
          <input type="text" name="Status_Note"  value="<?php echo $row1['Status_Note'];?>" required>
          <button type="submit" class="btn btn-primary" name="button" value="1" onclick="return confirm('คุณต้องการอนุมัติ ?')" >อนุมัติ</button>
          <button type="submit"  class=" btn btn-danger" name="button" value="2" onclick="return confirm('คุณไม่ต้องการอนุมัติ ?')" >ไม่อนุมัติ</button>
          <p></p>
        </form>
      </div>
      <div class="col-8"> <br>
        <p style="font-size:22px;"><?php echo $row1['clinic_Name'];?></p>
        <?php   include ('upload.php');  ?>
      </div>
      <div class="col-10">  <br>
        <div class="row no-gutters">
          <div class="col-md-4">
          <img src="../clinic/permit/<?php echo $row1['clinic_ImagePermit'] ?>" class="img-fluid img-responsive img-thumbnail w-75 ">
          <p>ใบอนุญาตประกอบการ</p>
          </div>
          <div class="col-sm-8" style="padding-top:30px;">
            <div class="table-responsive "style="font-size:18px;"  >
              <table class="table table-borderless table-sm" >
                <tr><td width="175">รหัสคลินิก </td><td><?php echo $row1['clinic_ID'];?></td></tr>
                <tr><td>ชื่อคลินิก: </td> <td><?php echo $row1['clinic_Name'];?></td></tr>
                <tr><td>ที่อยู่ </td><td>เลขที่ <?php echo $row1['clinic_NumAddress']; ?>&nbsp; <?php echo $row1['clinic_Address_Detil']; ?></td> </tr>
                <tr><td></td><td><?php echo $row1['clinic_Address_GPS'];?></td></tr>
                <tr><td>เบอร์โทร</td> <td><?php echo $row1['clinic_Phone'];?></td></tr>
                <tr><td>Email  </td> <td><?php echo $row1['clinic_Email'];?></td></tr>
                <tr><td>เลขที่ใบอนุญาต </td> <td><?php echo $row1['clinic_NumberPermit'];?></td></tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </center>
      <?php
      $sql1 = "SELECT * FROM clinic,doctor WHERE clinic.clinic_ID=doctor.clinic_ID and clinic.clinic_ID =$clinic_ID";
      $result_sql = mysqli_query($dbConnect, $sql1);
      ?>
      <hr>
      <center><p style="font-size:18px;">แพทย์ประจำคลินิก</p>
      <?php  if(mysqli_affected_rows($dbConnect)==0){echo "<center><p>ไม่มีข้อมูล </p></center>"; }?>
      <?php while($row = mysqli_fetch_array($result_sql)){ ?>
      <div class="col-9"> <br>
        <div class="card">
        <div class="row no-gutters">
          <div class="col-md-3">
          <img src="../doctor/D_profile/<?php echo $row['doctor_Image']; ?>" class="img-fluid">
          </div>
          <div class="col">
            <div class="card-body text-left">
            <h5 class="card-title"><?php echo $row['doctor_Name'] ; ?> <?php echo $row['doctor_Surname'] ; ?></h5>
            <span class="card-text">เลขที่ใบอนุญาต <?php echo $row['doctor_License']; ?></span>
            <span class="card-text"> <?php echo $row['doctor_Details']; ?></span>
            </div>
          </div>
          <div class="col-md-3" >
            <img src="../doctor/ImagePermit/<?php echo $row['doctor_ImagePermit']; ?>" class=" img-fluid w-100">
          </div>
        </div>
        </div>
      </div>
      <?php } ?>
      </center>
      <div style="height:200px;"></div>
    </div>
    <?php include("../footer.php"); ?>
    </body>
  </html>
