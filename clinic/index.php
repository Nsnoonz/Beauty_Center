<?php require_once('../connect/connect.php'); ?>
<?php session_start();
$fullcalendar_path = "fullcalendar-4.4.2/packages/";
?>
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
    <link href='<?=$fullcalendar_path?>/core/main.css' rel='stylesheet' />
    <link href='<?=$fullcalendar_path?>/daygrid/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<!--   ส่วนที่เพิ่มเข้ามาใหม่-->
    <link href='<?=$fullcalendar_path?>/timegrid/main.css' rel='stylesheet' />
    <link href='<?=$fullcalendar_path?>/list/main.css' rel='stylesheet' />

    <script src='<?=$fullcalendar_path?>/core/main.js'></script>
    <script src='<?=$fullcalendar_path?>/daygrid/main.js'></script>
<!--   ส่วนที่เพิ่มเข้ามาใหม่-->
    <script src='<?=$fullcalendar_path?>/core/locales/th.js'></script>
    <script src='<?=$fullcalendar_path?>/timegrid/main.js'></script>
    <script src='<?=$fullcalendar_path?>/interaction/main.js'></script>
    <script src='<?=$fullcalendar_path?>/list/main.js'></script>


     <style type="text/css">
         #calendar{
             width: 800px;margin: auto;
         }
      </style>

  </head>
  <body class="Myfont">
    <?php
    include("navbar.php");
    $clinic_ID = $_REQUEST["clinic_ID"];
    if( empty($_GET['clinic_ID']) || ( $_GET['token'] != md5($_GET['clinic_ID'].'@Confirm') ))
    {
      exit('<center><br>รหัสไม่ถูกต้อง</center>');
    }
  $sql_wait = "SELECT * FROM booking,service,clinic,member WHERE member.member_ID = booking.member_ID and service.service_ID = booking.service_ID and clinic.clinic_ID = service.clinic_ID
  and service.clinic_ID = $clinic_ID and booking.booking_Statu = 0  order by booking.booking_Date";
  $result_wait = mysqli_query($dbConnect, $sql_wait);
  $num = mysqli_num_rows($result_wait);
  $query1 = "SELECT * FROM clinic WHERE clinic_ID = $clinic_ID";
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
        คลินิกของคุณจะถูกระงับ กรุณาชำระค่าบริการ <br><span style="font-size:15px; color:#000;">**เนื่องจากคลินิกของคุณมียอดเข้าชมคลินิก จากสมาชิก จำนวน <?php echo $row1["clinic_Views"] ?> ครั้ง คลินิกของคุณจะถูกระงับบริการเมื่อมีจำนวนผู้เข้าชม ครบ 1100 ครั้ง </span> </p> <?php } ?>
      <?php  if($row1["Status"] == '3'){ ?> <p class="text-light  font-weight-bold bg-danger"style="box-shadow:0px 0px 3px #000; padding:10px; border-radius: 10px; font-size:22px;"  >คลินิกของคุณถูกระงับ กรุณาชำระค่าบริการ
            <br>  <span style="font-size:14px;">ขออภัย หากคุณได้ชำระค่าบริการแล้ว กรุณารอผู้ดูแลระบบตรวจสอบ</span></p> <?php } ?>
    </center>
      <br>
      <div class="col-9 text-center ">
        <a  class="btn btn-primary" role="button"
        href="../ReadClinic.php?clinic_ID=<?php echo  $clinic_ID ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>#comment";>
          <?php
          $user_Status = "Member";
          $sql_comment = " SELECT * FROM comment WHERE user_Status = '$user_Status' and ref_clinic_ID = $clinic_ID  " ;
          $result_comment = mysqli_query($dbConnect, $sql_comment);
         $num_comment = mysqli_num_rows($result_comment);
          ?>
        คุณมียอดความคิดเห็นจากสมาชิก ทั้งหมด <span class="badge badge-light"><?php echo $num_comment; ?></span>
        </a>
        <a  class="btn btn-primary" role="button" href="#wait">
        รายการจองที่รอการอนุมัติ <span class="badge badge-light"><?php echo $num; ?></span>
        </a>
      </div>
      <br>


      <div id='calendar' class="border col-12 col-sm-12" style="padding:10px;"></div>
      <center>
        <div class="col-9" id="wait">
          <br>
          <p style="font-size:18px;">รายการจองที่รอการอนุมัติ</p>
   <?php
            if($num==0){echo "<center><br><p>ไม่มีข้อมูล</p> </center>"; }
            while($row_wait = mysqli_fetch_array($result_wait)){ ?>
              <br>
              <div class="card border-light text-left ">
                <div class="card-header">รหัสการจอง <?php echo $row_wait["booking_ID"]; echo "&nbsp;";  echo $row_wait["service_Name"]; ?> </div>
                <div class="card-body">
                  <span class="card-text"><?php echo $row_wait["service_Description"]; ?></span>
                  <span class=" card-text ">ลูกค้า : </span>
                  <span class="card-text "> <?php echo $row_wait["member_Name"]; echo "&nbsp;"; echo $row_wait["member_Surname"]; ?> </span>
                  <span class=" card-text ">วันที่จอง</span>
                  <span class="card-text "> <?php echo $row_wait["booking_Date"]; ?> </span> &nbsp;
                  <span class="card-text ">เวลาที่จอง</span>
                  <span class=" card-text" ><?php echo $row_wait["booking_Time"]; ?></span>
                  <br>
                  <span class="card-text text-warning">หมายเหตุ : </span>
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
      </center>
      <br><br>


      <script  src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
              integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
              crossorigin="anonymous"></script>
     <script type="text/javascript">
      $(function(){
          // กำหนด element ที่จะแสดงปฏิทิน
        var calendarEl = $("#calendar")[0];

          // กำหนดการตั้งค่า
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction','dayGrid', 'timeGrid', 'list' ], // plugin ที่เราจะใช้งาน
            defaultView: 'dayGridMonth', // ค้าเริ่มร้นเมื่อโหลดแสดงปฏิทิน
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            events: { // เรียกใช้งาน event จาก json ไฟล์ ที่สร้างด้วย php
           url: 'events.php?gData=1',
           error: function() {
           }
       },
            eventLimit: true, // allow "more" link when too many events
            locale: 'th',    // กำหนดให้แสดงภาษาไทย
            firstDay: 0, // กำหนดวันแรกในปฏิทินเป็นวันอาทิตย์ 0 เป็นวันจันทร์ 1
            showNonCurrentDates: false, // แสดงที่ของเดือนอื่นหรือไม่
            eventTimeFormat: { // รูปแบบการแสดงของเวลา เช่น '14:30'
                hour: '2-digit',
                minute: '2-digit',
                meridiem: false
            }
        });

         // แสดงปฏิทิน
        calendar.render();

      });
      </script>
      <div style="height:200px;">

      </div>
    </div>

    <?php include("../footer.php"); ?>
    </body>
  </html>
