<?php require_once('../connect/connect.php');
   error_reporting( error_reporting() & ~E_NOTICE );
?>
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
    <?php    include("navbar.php"); ?>
    <?php if($_SESSION["loginStatus"]=="Member"){ ?>
    <?php
      $member_ID = $_REQUEST['member_ID'];
      if( empty($_GET['member_ID']) || ( $_GET['token'] != md5($_GET['member_ID'].'@Confirm') ))
      {
        exit('<center><br>รหัสไม่ถูกต้อง</center>');
      }
      $sql = "SELECT * FROM booking,service WHERE service.service_ID = booking.service_ID
      and booking.member_ID = $member_ID  order by booking.booking_ID Desc";
      $result = mysqli_query($dbConnect, $sql);
      if(mysqli_affected_rows($dbConnect)==0){echo "<center><br><p>ไม่มีข้อมูล</p> </center>"; }
    ?>
    <div class="container" style="box-shadow: 0px 0px 3px #000;min-height:1000px;">
      <center> <br><br>
      <div class="col-9">
          <p class="text-left" style="font-size:20px;">รายการจองของคุณ</p>
          <hr>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">รายการจองทั้งหมด</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="wait-tab" data-toggle="tab" href="#wait" role="tab" aria-controls="wait" aria-selected="false">รอการยืนยัน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="cf-tab" data-toggle="tab" href="#cf" role="tab" aria-controls="cf" aria-selected="false">ยืนยันการจอง</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="cc-tab" data-toggle="tab" href="#cc" role="tab" aria-controls="cc" aria-selected="false">ยกเลิกการจอง</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php while($row = mysqli_fetch_array($result)){ ?>
              <br>
              <div class="card border-light text-left ">
                <div class="card-header">รหัสการจอง <?php echo $row["booking_ID"]; echo "&nbsp;";  echo $row["service_Name"]; ?> </div>
                <div class="card-body">
                  <span class="card-text"><?php echo $row["service_Description"]; ?></span>
                  <span class="card-text">วันที่จอง</span>
                  <span class="card-text"> <?php echo $row["booking_Date"]; ?> </span> &nbsp;
                  <span class="card-text ">เวลาที่จอง</span>
                  <span class=" card-text" ><?php echo $row["booking_Time"]; ?></span>
                  <br>
                  <span class="card-text ">หมายเหตุ</span>
                    <span>
                    <?php if($row["booking_Note"] ==''){ echo " -";} echo "&nbsp;"; echo  $row["booking_Note"] ; ?>
                  </span>
                  <span class="card-text " >สถานะ</span>
                  <span class=" card-text">
                     <?php $status = $row["booking_Statu"];
                  if ($status==0) {
                  echo "รอการยืนยันจากคลินิก";
                } if ($status==1){
                    echo "ยืนยันเรียบร้อยแล้วค่ะ";
                }if ($status==2){
                    echo "ยกเลิกการจอง";
                }
                  ?></span>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="tab-pane fade" id="wait" role="tabpanel" aria-labelledby="wait-tab">
            <?php
            $sql_wait = "SELECT * FROM booking,service WHERE service.service_ID = booking.service_ID
            and booking.member_ID = $member_ID and booking.booking_Statu = 0  order by booking.booking_ID Desc";
            $result_wait = mysqli_query($dbConnect, $sql_wait);
            if(mysqli_affected_rows($dbConnect)==0){echo "<center><br><p>ไม่มีข้อมูล</p> </center>"; }
             while($row_wait = mysqli_fetch_array($result_wait)){ ?>
               <br>
               <div class="card border-light text-left ">
                 <div class="card-header">รหัสการจอง <?php echo $row_wait["booking_ID"]; echo "&nbsp;";  echo $row_wait["service_Name"]; ?> </div>
                 <div class="card-body">
                   <span class="card-text"><?php echo $row_wait["service_Description"]; ?></span>
                   <span class=" card-text">วันที่จอง</span>
                   <span class="card-text"> <?php echo $row_wait["booking_Date"]; ?> </span> &nbsp;
                   <span class="card-text">เวลาที่จอง</span>
                   <span class=" card-text" ><?php echo $row_wait["booking_Time"]; ?></span><br>
                   <span class="card-text ">หมายเหตุ</span>
                     <span>
                     <?php if($row_wait["booking_Note"] ==''){ echo " -";} echo "&nbsp;"; echo  $row_wait["booking_Note"] ; ?>
                   </span>
                   <span class="card-text " >สถานะ</span>
                   <span class=" card-text">
                      <?php $status = $row_wait["booking_Statu"];
                   if ($status==0) {
                   echo "รอการยืนยันจากคลินิก";
                 } if ($status==1){
                     echo "ยืนยันเรียบร้อยแล้วค่ะ";
                 }if ($status==2){
                     echo "ยกเลิกการจอง";
                 }
                   ?></span>
                 </div>
               </div>
               <div class="card-footer text-right">
              <span class="text-muted" style="font-Size:20px;">
                 <form action= "UpStatusBooking.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="booking_ID" value="<?php echo  $row_wait["booking_ID"]; ?>" >
                  <input type="hidden" name="booking_Statu" value="<?php echo  $row_wait["booking_Statu"]; ?>" >
                  <input type="hidden" name="member_ID" value="<?php echo  $row_wait["member_ID"]; ?>" >
                  <input class="btn btn-outline-primary  btn-sm "  style="margin-top: 5px;"  type="submit" value="ยกเลิกการจอง" >
                </form>
              </span>
              </div>
             <?php } ?>
          </div>
          <div class="tab-pane fade" id="cf" role="tabpanel" aria-labelledby="cf-tab">
            <?php
            $sql_cf = "SELECT * FROM booking,service,clinic WHERE service.service_ID = booking.service_ID and clinic.clinic_ID = service.clinic_ID
            and booking.member_ID = $member_ID and booking.booking_Statu = 1  order by booking.booking_ID Desc";
            $result_cf = mysqli_query($dbConnect, $sql_cf);
            if(mysqli_affected_rows($dbConnect)==0){echo "<center><br><p>ไม่มีข้อมูล</p> </center>"; }
             while($row_cf = mysqli_fetch_array($result_cf)){ ?>
               <br>
               <div class="card border-light text-left ">
                 <div class="card-header">รหัสการจอง <?php echo $row_cf["booking_ID"]; echo "&nbsp;";  echo $row_cf["service_Name"]; ?>
                   By <a href="../ReadClinic.php?clinic_ID=<?php echo  $row_cf["clinic_ID"]; ?>&token=<?php echo md5( $row_cf["clinic_ID"].'@Confirm'); ?> " role="button"><?php echo $row_cf['clinic_Name'] ; ?></a>
                  </div>
                 <div class="card-body">
                   <span class="card-text"><?php echo $row_cf["service_Description"]; ?></span>
                   <span class=" card-text">วันที่จอง</span>
                   <span class="card-text"> <?php echo $row_cf["booking_Date"]; ?> </span> &nbsp;
                   <span class="card-text ">เวลาที่จอง</span>
                   <span class=" card-text" ><?php echo $row_cf["booking_Time"]; ?></span><br>
                   <span class="card-text ">หมายเหตุ</span>
                     <span>
                     <?php if($row_cf["booking_Note"] ==''){ echo " -";} echo "&nbsp;"; echo  $row_cf["booking_Note"] ; ?>
                   </span>
                   <span class="card-text" >สถานะ</span>
                   <span class=" card-text">
                      <?php $status = $row_cf["booking_Statu"];
                   if ($status==0) {
                   echo "รอการยืนยันจากคลินิก";
                 } if ($status==1){
                     echo "ยืนยันเรียบร้อยแล้วค่ะ";
                 }if ($status==2){
                     echo "ยกเลิกการจอง";
                 }
                   ?></span>

                 </div>
               </div>
             <?php } ?>

          </div>
          <div class="tab-pane fade" id="cc" role="tabpanel" aria-labelledby="cc-tab">
            <?php
            $sql_cc = "SELECT * FROM booking,service WHERE service.service_ID = booking.service_ID
            and booking.member_ID = $member_ID and booking.booking_Statu = 2  order by booking.booking_ID Desc";
            $result_cc = mysqli_query($dbConnect, $sql_cc);
            $num = mysqli_num_rows($result_cc);
            if(mysqli_affected_rows($dbConnect)==0){echo "<center><br><p>ไม่มีข้อมูล</p> </center>"; }
             while($row_cc = mysqli_fetch_array($result_cc)){ ?>
               <br>
               <div class="card border-light text-left ">
                 <div class="card-header">รหัสการจอง <?php echo $row_cc["booking_ID"]; echo "&nbsp;";  echo $row_cc["service_Name"]; ?> </div>
                 <div class="card-body">
                   <span class="card-text"><?php echo $row_cc["service_Description"]; ?></span>
                   <span class="card-text ">วันที่จอง</span>
                   <span class="card-text"> <?php echo $row_cc["booking_Date"]; ?> </span> &nbsp;
                   <span class="card-text ">เวลาที่จอง</span>
                   <span class=" card-text" ><?php echo $row_cc["booking_Time"]; ?></span><br>
                   <span class="card-text ">หมายเหตุ</span>
                     <span>
                     <?php if($row_cc["booking_Note"] ==''){ echo " -";} echo "&nbsp;"; echo  $row_cc["booking_Note"] ; ?>
                   </span>
                   <span class="card-text " >สถานะ</span>
                   <span class=" card-text">
                      <?php $status = $row_cc["booking_Statu"];
                   if ($status==0) {
                   echo "รอการยืนยันจากคลินิก";
                 } if ($status==1){
                     echo "ยืนยันเรียบร้อยแล้วค่ะ";
                 }if ($status==2){
                     echo "ยกเลิกการจอง";
                 }
                   ?></span>
                 </div>
               </div>
             <?php } ?>




          </div>
        </div>
      </div>
    </center>
    <div style="height:200px;">

    </div>
    </div>
  <?php } ?>
    <?php include("../footer.php"); ?>
    </body>
  </html>
