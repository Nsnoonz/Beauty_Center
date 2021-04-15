<?php
$fullcalendar_path = "fullcalendar-4.4.2/packages/";
?>
<?php require_once('connect/connect.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="css/webstyle.css">
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
    <div id='calendar'></div>



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
           url: "events.php?gData=1&clinic_ID=<?php echo $clinic_ID ?>",
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


  </body>
</html>
