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
    <div class="container" style="box-shadow: 0px 0px 3px #000; min-height: 1000px;">
      <br><br>
      <center>
      <div class="col-9">
        <p class="text-left" style="font-size:18px;"> รายการจองทั้งหมด</p>
        <hr>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active " id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">รายการจองทั้งหมด</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-warning " id="wait-tab" data-toggle="tab" href="#wait" role="tab" aria-controls="wait" aria-selected="false">รอการยืนยัน</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-success " id="cf-tab" data-toggle="tab" href="#cf" role="tab" aria-controls="cf" aria-selected="false">ยืนยันการจอง</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" id="cc-tab" data-toggle="tab" href="#cc" role="tab" aria-controls="cc" aria-selected="false">ยกเลิกการจอง</a>
      </li>
  </ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade  show active" id="all" role="tabpanel" aria-labelledby="all-tab">
    <?php
  $sql_all = "SELECT * FROM booking,service,clinic ,member WHERE member.member_ID = booking.member_ID and service.service_ID = booking.service_ID and clinic.clinic_ID = service.clinic_ID
  and service.clinic_ID = $clinic_ID  order by booking.booking_Date";
    $result_all = mysqli_query($dbConnect, $sql_all);
      if(mysqli_affected_rows($dbConnect)==0){echo "<center><br><p>ไม่มีข้อมูล</p> </center>"; }
      while($row_all = mysqli_fetch_array($result_all)){ ?>
        <br>
        <div class="card border-light text-left ">
          <div class="card-header">รหัสการจอง <?php echo $row_all["booking_ID"]; echo "&nbsp;";  echo $row_all["service_Name"]; ?> </div>
          <div class="card-body">
            <span class="card-text"><?php echo $row_all["service_Description"]; ?></span>
            <span class=" card-text ">ลูกค้า : </span>
            <span class="card-text "> <?php echo $row_all["member_Name"]; echo "&nbsp;"; echo $row_all["member_Surname"]; ?> </span>
            <br>
            <span class=" card-text ">วันที่จอง</span>
            <span class="card-text "> <?php echo $row_all["booking_Date"]; ?> </span> &nbsp;
            <span class="card-text ">เวลาที่จอง</span>
            <span class=" card-text" ><?php echo $row_all["booking_Time"]; ?></span>
            <span class="card-text" >สถานะ</span>
            <span class=" card-text">
               <?php $status = $row_all["booking_Statu"];
            if ($status==0) {
            echo "รอการยืนยันจากคลินิก";
          } if ($status==1){
              echo "ยืนยันการจอง";
          }if ($status==2){
              echo "ยกเลิกการจอง";
          }
            ?></span>

            <br>
            <span class="card-text text-warning">หมายเหตุ</span>
              <span>
              <?php if($row_all["booking_Note"] ==''){ echo " -";} echo "&nbsp;"; echo  $row_all["booking_Note"] ; ?>
            </span>

          </div>
          <!-- <div class="card-footer text-right">
              <form class="" action="confirmBooking.php" method="post">
                <label for="" class="text-danger font-weight-bold">หมายเหตุ : </label>
                <input type="text" name="booking_ID" hidden  value="<?php echo $row_all['booking_ID'];?>">
                <input type="text" name="booking_Note"   value="<?php echo  $row_all['booking_Note']; ?> " required>
                <input type="text" name="time_update" hidden value="<?php echo "&nbsp; Update: "; echo date('Y-m-d H:i:s') ;  ?>" readonly>
                <button type="submit" class="btn btn-success" name="booking_Statu" value="1" onclick="return confirm('คุณต้องการอนุมัติ ?')" >อนุมัติการจอง</button>
                <button type="submit"  class=" btn btn-danger" name="booking_Statu" value="2" onclick="return confirm('คุณต้องการยกเลิกการจอง ?')" >ยกเลิกการจอง</button>
              </form>
          </div> -->
        </div>
      <?php } ?>
  </div>
  <div class="tab-pane fade" id="wait" role="tabpanel" aria-labelledby="wait-tab">
    <?php
  $sql_wait = "SELECT * FROM booking,service,clinic ,member WHERE member.member_ID = booking.member_ID and service.service_ID = booking.service_ID and clinic.clinic_ID = service.clinic_ID
  and service.clinic_ID = $clinic_ID and booking.booking_Statu = 0  order by booking.booking_Date";
    $result_wait = mysqli_query($dbConnect, $sql_wait);
      if(mysqli_affected_rows($dbConnect)==0){echo "<center><br><p>ไม่มีข้อมูล</p> </center>"; }
      while($row_wait = mysqli_fetch_array($result_wait)){ ?>
        <br>
        <div class="card border-light text-left ">
          <div class="card-header">รหัสการจอง <?php echo $row_wait["booking_ID"]; echo "&nbsp;";  echo $row_wait["service_Name"]; ?> </div>
          <div class="card-body">
            <span class="card-text"><?php echo $row_wait["service_Description"]; ?></span>
            <span class=" card-text ">ลูกค้า : </span>
            <span class="card-text "> <?php echo $row_wait["member_Name"]; echo "&nbsp;"; echo $row_wait["member_Surname"]; ?> </span>
            <br>
            <span class=" card-text ">วันที่จอง</span>
            <span class="card-text "> <?php echo $row_wait["booking_Date"]; ?> </span> &nbsp;
            <span class="card-text ">เวลาที่จอง</span>
            <span class=" card-text" ><?php echo $row_wait["booking_Time"]; ?></span>
            <br>
            <span class="card-text text-warning">หมายเหตุ</span>
              <span>
              <?php if($row_wait["booking_Note"] ==''){ echo " -";} echo "&nbsp;"; echo  $row_wait["booking_Note"] ; ?>
            </span>

          </div>
          <div class="card-footer text-right">
              <form class="" action="confirmBooking.php" method="post">
                <label for="" class="text-danger font-weight-bold">หมายเหตุ : </label>
                <input type="text" name="booking_ID" hidden  value="<?php echo $row_wait['booking_ID'];?>">
                <input type="text" name="booking_Note"   value="<?php  $row_wait['booking_Note']; ?> " required>
                <input type="text" name="time_update" hidden value="<?php echo "&nbsp; Update: "; echo date('Y-m-d H:i:s') ;  ?>" readonly>
                <button type="submit" class="btn btn-success" name="booking_Statu" value="1" onclick="return confirm('คุณต้องการอนุมัติ ?')" >อนุมัติการจอง</button>
                <button type="submit"  class=" btn btn-danger" name="booking_Statu" value="2" onclick="return confirm('คุณต้องการยกเลิกการจอง ?')" >ยกเลิกการจอง</button>
              </form>
          </div>
        </div>
      <?php } ?>
  </div>
  <div class="tab-pane fade" id="cf" role="tabpanel" aria-labelledby="cf-tab">
    <?php
    $sql_cf = "SELECT * FROM booking,service,clinic ,member WHERE member.member_ID = booking.member_ID and service.service_ID = booking.service_ID and clinic.clinic_ID = service.clinic_ID
    and service.clinic_ID = $clinic_ID and booking.booking_Statu = 1  order by booking.booking_Date";
    $result_cf = mysqli_query($dbConnect, $sql_cf);
      if(mysqli_affected_rows($dbConnect)==0){echo "<center><br><p>ไม่มีข้อมูล</p> </center>"; }
      while($row_cf = mysqli_fetch_array($result_cf)){ ?>
        <br>
        <div class="card border-light text-left ">
          <div class="card-header">รหัสการจอง <?php echo $row_cf["booking_ID"]; echo "&nbsp;";  echo $row_cf["service_Name"]; ?> </div>
          <div class="card-body">
            <span class="card-text"><?php echo $row_cf["service_Description"]; ?></span>
            <span class=" card-text ">ลูกค้า : </span>
            <span class="card-text "> <?php echo $row_cf["member_Name"]; echo "&nbsp;"; echo $row_cf["member_Surname"]; ?> </span>
            <br>
            <span class=" card-text ">วันที่จอง</span>
            <span class="card-text "> <?php echo $row_cf["booking_Date"]; ?> </span> &nbsp;
            <span class="card-text ">เวลาที่จอง</span>
            <span class=" card-text" ><?php echo $row_cf["booking_Time"]; ?></span>
            <br>
            <span class="card-text text-warning">หมายเหตุ</span>
              <span>
              <?php if($row_cf["booking_Note"] ==''){ echo " -";} echo "&nbsp;"; echo  $row_cf["booking_Note"] ; ?>
            </span>

          </div>
          <!-- <div class="card-footer text-right">
              <form class="" action="confirmBooking.php" method="post">
                <label for="" class="text-danger font-weight-bold">หมายเหตุ : </label>
                <input type="text" name="booking_ID" hidden  value="<?php echo $row_cf['booking_ID'];?>">
                <input type="text" name="booking_Note"   value="<?php  $row_cf['booking_Note']; ?> " required>
                <input type="text" name="time_update" hidden value="<?php echo "&nbsp; Update: "; echo date('Y-m-d H:i:s') ;  ?>" readonly>
                <button type="submit" class="btn btn-success" name="booking_Statu" value="1" onclick="return confirm('คุณต้องการอนุมัติ ?')" >อนุมัติการจอง</button>
                <button type="submit"  class=" btn btn-danger" name="booking_Statu" value="2" onclick="return confirm('คุณต้องการยกเลิกการจอง ?')" >ยกเลิกการจอง</button>
              </form>
          </div> -->
        </div>
      <?php } ?>
  </div>
  <div class="tab-pane fade" id="cc" role="tabpanel" aria-labelledby="cc-tab">
    <?php
  $sql_cc = "SELECT * FROM booking,service,clinic ,member WHERE member.member_ID = booking.member_ID and service.service_ID = booking.service_ID and clinic.clinic_ID = service.clinic_ID
  and service.clinic_ID = $clinic_ID and booking.booking_Statu = 2  order by booking.booking_Date";
    $result_cc = mysqli_query($dbConnect, $sql_cc);
      if(mysqli_affected_rows($dbConnect)==0){echo "<center><br><p>ไม่มีข้อมูล</p> </center>"; }
      while($row_cc = mysqli_fetch_array($result_cc)){ ?>
        <br>
        <div class="card border-light text-left ">
          <div class="card-header">รหัสการจอง <?php echo $row_cc["booking_ID"]; echo "&nbsp;";  echo $row_cc["service_Name"]; ?> </div>
          <div class="card-body">
            <span class="card-text"><?php echo $row_cc["service_Description"]; ?></span>
            <span class=" card-text ">ลูกค้า : </span>
            <span class="card-text "> <?php echo $row_cc["member_Name"]; echo "&nbsp;"; echo $row_cc["member_Surname"]; ?> </span>
            <br>
            <span class=" card-text ">วันที่จอง</span>
            <span class="card-text "> <?php echo $row_cc["booking_Date"]; ?> </span> &nbsp;
            <span class="card-text ">เวลาที่จอง</span>
            <span class=" card-text" ><?php echo $row_cc["booking_Time"]; ?></span>
            <br>
            <span class="card-text text-warning">หมายเหตุ</span>
              <span>
              <?php if($row_cc["booking_Note"] ==''){ echo " -";} echo "&nbsp;"; echo  $row_cc["booking_Note"] ; ?>
            </span>

          </div>
          <!-- <div class="card-footer text-right">
              <form class="" action="confirmBooking.php" method="post">
                <label for="" class="text-danger font-weight-bold">หมายเหตุ : </label>
                <input type="text" name="booking_ID" hidden  value="<?php echo $row_cc['booking_ID'];?>">
                <input type="text" name="booking_Note"   value="<?php  $row_cc['booking_Note']; ?>" required>
                <input type="text" name="time_update" hidden value="<?php echo "&nbsp; Update: "; echo date('Y-m-d H:i:s') ;  ?>" >
                <button type="submit" class="btn btn-success" name="booking_Statu" value="1" onclick="return confirm('คุณต้องการอนุมัติ ?')" >อนุมัติการจอง</button>
                <button type="submit"  class=" btn btn-danger" name="booking_Statu" value="2" onclick="return confirm('คุณต้องการยกเลิกการจอง ?')" >ยกเลิกการจอง</button>
              </form>
          </div> -->
        </div>
      <?php } ?>
  </div>
</div>
</div>
</center>
</div>
    <?php include("../footer.php"); ?>
    </body>
  </html>
