
<?php require_once('connect/connect.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Center</title>
    <link rel="icon" href="img/clinic.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/webstyle.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </head>
  <body class="Myfont">
    <?php
    include("navbar.php");
    include("nav.php");
    ?>
    <div class="container border-top" style="min-height:1000px;">
      <?php
      $service_ID = $_REQUEST['service_ID'];
      $member_ID = $_REQUEST['member_ID'];

      $sql =  "SELECT * FROM clinic,service,servicetype
      WHERE servicetype.serviceType_ID = service.serviceType_ID and clinic.clinic_ID=service.clinic_ID
      and clinic.Status= 1 and service.service_ID =  $service_ID";
      // $sql = "SELECT * FROM clinic,service WHERE clinic.clinic_ID=service.clinic_ID and clinic.Status= 1 and service.service_ID =  $service_ID ";
      $result=mysqli_query($dbConnect,$sql);
      $record = mysqli_fetch_array($result);
      $temp = array();
      $record['service_Image']=trim($record['service_Image'], '/,');
      $temp   = explode(',', $record['service_Image']);
      $temp   = array_filter($temp);
      $images = array();
      foreach($temp as $image){
      $images[]="clinic/service".$temp['service_Image']."/".trim( str_replace(array('[',']') ,"" ,$image ) );
      $img = count($images); }
      ?>

      <br>
      <p>Booking > <a href="ReadClinic.php?clinic_ID=<?php echo  $record["clinic_ID"]; ?>&token=<?php echo md5( $record["clinic_ID"].'@Confirm'); ?> " role="button"><?php echo $record['clinic_Name'] ; ?></a></p>
      <p>รายการจองของคุณ</p>

      <center>
        <div class="row ">
        <div class="col-lg-7">
        <div class="card">
          <div class="card-header font-weight-bold text-left">
            <?php echo $record['service_Name'] ; ?>
            By <a href="ReadClinic.php?clinic_ID=<?php echo  $record["clinic_ID"]; ?>&token=<?php echo md5( $record["clinic_ID"].'@Confirm'); ?> " role="button"><?php echo $record['clinic_Name'] ; ?></a>
          </div>
          <div class="row no-gutters">
            <!-- <div class="col-md-8"> -->
              <!-- <div id="myCarousel" class="carousel slide   carousel-fade " data-ride="carousel">
                  <div class="carousel-inner" >
                      <?php for($i = 0; $i < $img; $i++){ ?>
                          <div class="carousel-item <?= $i == 1 ? ' active' : ''; ?>">
                              <img src="<?php echo $images[$i];?>"  class="d-block w-100" >
                          </div>
                      <?php } ?>
                  </div>
                  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                  </a>

              </div> -->
              <!-- </div> -->
              <div class="col-sm">
                <div class="card-body text-left">
                <p class="card-text"> <?php echo $record['service_Description']; ?></p>
                <p class="card-text"> ราคา <?php echo $record['service_Price']; ?> บาท</p>
                <p class="card-text"> ประเภท <?php echo $record['serviceType_Name']; ?></p>
              </div>
            </div>

           </div>
         </div>
         <?php
         require_once("connect/connect.php");
         $db=new mysqli( 'localhost', 'root', '', 'beauty_center');
         $clinic_ID= $record["clinic_ID"];
         $day_config = array(
         	'Mon'=>array('yellow', 'จันทร์', 1 ),
         	'Tue'=>array('pink', 'อังคาร', 2 ),
         	'Wed'=>array('green', 'พุธ', 3 ),
         	'Thu'=>array('orange', 'พฤหัสบดี', 4 ),
         	'Fri'=>array('skyblue', 'ศุกร์', 5 ),
         	'Sat'=>array('violet', 'เสาร์', 6 ),
         	'Sun'=>array('red', 'อาทิตย์', 7 ),
         );
         $sql4="SELECT MIN(clinicDay_Start) AS clinicDay_Start FROM clinicday";
         $result4=mysqli_query($dbConnect,$sql4);
         $record4=mysqli_fetch_array($result4);

         $sql5="SELECT MAX(clinicDay_End) AS clinicDay_End FROM clinicday";
         $result5=mysqli_query($dbConnect,$sql5);
         $record5=mysqli_fetch_array($result5);
          $clinicDay_Start = date("h:i", strtotime($record4['clinicDay_Start']));
          $clinicDay_End = date("H:i", strtotime($record5['clinicDay_End']));
          $time_s = intval($clinicDay_Start);
          $time_e = intval($clinicDay_End);

         $day_week=array( '', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' );
         $sql = "select *, left( clinicDay_Start, 2) st, left( clinicDay_End, 2) en
         from clinicday WHERE clinic_ID = $clinic_ID
         order by field(clinicDay_Name,'Mon','Tue','Wed','Thu','Fri','Sat','Sun'), st";
         $cur_day=0; $cur_hour=''; $tr='';
         $rs=$db->query($sql) or die ( $sql . "<br>" . $db->error );
         while( $ro = $rs->fetch_assoc()){
         	$d=$ro['clinicDay_Name']; $w = $day_config[$d][2]; $st = intval($ro['st']); $en=intval($ro['en']);
         	if($w!=$cur_day){ // ตรวจสอบว่า เป็นวันใหม่ หรือไม่
         		if($tr) // ถ้า tr มีความยาว แสดงว่าได้ถูกใส่ <TR> เปิดไว้ก่อนแล้ว ให้ ใส่ </TR>
         			$tr .= ($cur_hour < 24 ? '<td colspan='.(24 - $cur_hour)." >&nbsp;</td>" : '') . '</tr>';
         		$cur_day++;  //  วันที่เก่า +1
         		for($cur_day; $cur_day<$w; $cur_day++){
         			// ตรวจสอบวันที่เก่า กับวันที่ ใหม่ มี gab ช่่องว่างวันที่ ไม่มีชั่วโมงเรียนหรือไม่
         			// โดยวนลูป วันที่เก่า ถึง วันที่ใหม่ แล้วแสดง บันทัดของวันที่ว่างนั้น
         			$tr.='<tr  >'.
         						'<td align=center bgcolor="' . $day_config[$day_week[$cur_day]][0].'" >'.$day_config[$day_week[$cur_day]][1].'</td>'.
         						'<td >&nbsp;</td></tr>';
         		}
         		$cur_hour = $time_s; // เปลี่ยน ชั่วโมง เริ่มต้น
         		$tr .= '<tr ><td align=center bgcolor="'.$day_config[$d][0].'" >'.$day_config[$d][1].'</td>';
         	}
         	if($cur_hour<$st) // ตรวจสอบ gab ชั่วโมงเริ่มต้น กับชั่วโมงปัจจุบันเพื่อนสร้าง td ชั่วโมงที่ว่าง
         		$tr.='<td align=center colspan='.($st - $cur_hour)." >&nbsp;</td>";
         	$cur_hour=$en; // เปลี่ยน ชั่วโมง เริ่มต้น เป็น เวลาสิ้นสุดการเรียน
         	//  แสดงเวลาเรียน
         	$tr .= '<td align=center '.( ($h = $en - $st)>1 ? "colspan=$h" : '' ).' >'.$ro['clinicDay_Name']."<br>".$ro['clinicDay_Start'] . '-' . $ro['clinicDay_End'] .'</td>';
         }
         if( $cur_hour<21) // ตรวจสอบ ชั่งโมงเรียนสุดท้าย น้อยกว่าเวลาปิดการสอน  21 น. หรือไม่ แล้วแสดง td ช่วงเวลาที่หายไป
         	$tr.= '<td colspan='.(21 - $cur_hour)." >&nbsp;</td>";
         $tr .= '</tr>'; // ปิด TR
         $cur_day++;
         for($cur_day; $cur_day<8; $cur_day++){
         	//ตรวจวัน ที่หายไป จาก วันที่เรียนวันสุดท้าย แล้วแสดง tr วันที่หายไป
         	$tr.='<tr height=45 ><td align=center bgcolor="' . $day_config[$day_week[$cur_day]][0].'" >'.$day_config[$day_week[$cur_day]][1].'</td>'.
         					'<td colspan="14">&nbsp;</td></tr>';
         }
         ///////////////////////////////////////////////////////////////////////////////l
         // ส่วน แสดงตารางเรียน
         ?>
         <br>
         <div class="table-responsive" style="font-size:10px;">
         <table class="table-xl table-bordered" >
         <tr>
         	<td align=center></td>
           <td align=center>07:00  8:00</td>
           <td align=center>08:00  9:00</td>
         	<td align=center>09:00  10:00</td>
         	<td align=center>10:00  11:00</td>
         	<td align=center>11:00  12:00</td>
         	<td align=center>12:00  13:00</td>
         	<td align=center>13:00  14:00</td>
         	<td align=center>14:00  15:00</td>
         	<td align=center>15:00  16:00</td>
         	<td align=center>16:00  17:00</td>
         	<td align=center>17:00  18:00</td>
         	<td align=center>18:00  19:00</td>
         	<td align=center>19:00  20:00</td>
         	<td  align=center>20:00  21:00</td>
         </tr>
         <?=$tr?>
         </table>
         </div>






   </div>
   <div class="col-lg-5">
     <div class="card text-left"  style="min-height:800px; padding:15px;">
      <p>การจองของคุณ</p>
     <form action="booking/AddBooking.php" method="post"  enctype="multipart/form-data">
       <input type="text" name="clinic_ID" value="<?php echo $record['clinic_ID'] ; ?> " hidden>
       <input type="text" name="member_ID" value="<?php echo $member_ID; ?> " hidden>
        <input type="text" name="service_ID" value="<?php echo $service_ID; ?>" hidden>
        <div class="form-group">
          <p>บริการของคุณ</p>
          <!-- <?php echo $record['service_Name'] ; ?> -->
         <input type="text" name="service_Name"  class="form-control" value="<?php echo $record['service_Name'] ; ?>" readonly >
        </div>
        <div class="form-group">
          <p>คลินิก</p>
          <input type="text" name="clinic_Name" class="form-control" value="<?php echo $record['clinic_Name'] ; ?>"  readonly>
        </div>
        <div class="form-group">
          <p>วันที่</p>
        <input name="booking_Date"  class="form-control" type="date" min="<?php echo date('Y-m-d');?>" required>
        </div>
        <?php
        // clinicday.clinic_ID = clinic.clinic_ID;
        // echo $DayOfWeek = date("w", strtotime($date));
        $sql4="SELECT MIN(clinicDay_Start) AS clinicDay_Start FROM clinicday WHERE clinic_ID = $clinic_ID";
        $result4=mysqli_query($dbConnect,$sql4);
        $record4=mysqli_fetch_array($result4);

        $sql5="SELECT MAX(clinicDay_End) AS clinicDay_End FROM clinicday WHERE clinic_ID = $clinic_ID";
        $result5=mysqli_query($dbConnect,$sql5);
        $record5=mysqli_fetch_array($result5);
        // echo  $clinicDay_Start =$record4['clinicDay_Start'] ;
        // echo $clinicDay_End =  $record5['clinicDay_End'] ;
        $clinicDay_Start = date("h", strtotime($record4['clinicDay_Start']));
        $clinicDay_End = date("H", strtotime($record5['clinicDay_End']));
        $time_s = intval($clinicDay_Start);
        $time_e = intval($clinicDay_End);
         ?>

        <div class="form-group">
          <p>เลือกเวลา</p>
          <select class="form-control" name="booking_Time" id="booking_Time">
            <?php for($hours=$time_s; $hours<$time_e; $hours++) // the interval for hours is '1'
          for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
              echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                             .str_pad($mins,2,'0',STR_PAD_LEFT).':00'.'</option>';?>
          </select>
        </div>
        <!-- <div class="form-group">
          <p>หมายเหตุ</p>
          <textarea name="booking_Note" class="form-control"></textarea>

        </div> -->
        <hr>
        <?php
        $sqlMem= "SELECT * FROM member WHERE member_ID = $member_ID ";
        $result2=mysqli_query($dbConnect,$sqlMem);
        $record2 = mysqli_fetch_array($result2);

        ?>
        <p>รายละเอียดของคุณ</p>
        <p>รหัสสมาชิก : <?php echo $record2['member_ID'] ; ?></p>
        <p>ชื่อสมาชิก : <?php echo $record2['member_Name']; echo "&nbsp; &nbsp; "; echo $record2['member_Surname'] ;  ?></p>
        <p>เบอร์โทร : <?php echo $record2['member_Phone'] ; ?></p>
        <br>
     <button class="btn  btn-primary " type="submit">ยืนยันการจอง</button>
     <button class="btn  btn-secondary " type="reset">ยกเลิก</button>
   </form>
   </div>
   </div>

     </div>


     </center>
    </div>
    <?php include("footer.php"); ?>
    </body>
  </html>
