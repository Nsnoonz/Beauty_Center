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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"  />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </head>
  <body class="Myfont">
    <?php    include("navbar.php");
                  include("nav.php");
                  $clinic_ID = $_REQUEST["clinic_ID"];
                  if( empty($_GET['clinic_ID']) || ( $_GET['token'] != md5($_GET['clinic_ID'].'@Confirm') ))
                  {
                    exit('<center><br>รหัสไม่ถูกต้อง</center>');
                  }
                  $sql = "SELECT * FROM clinic WHERE clinic_ID =$clinic_ID ";
                  $result_sql = mysqli_query($dbConnect, $sql);
                  $record = mysqli_fetch_array($result_sql);
                  $clinic_Views = $record['clinic_Views'];
                  if( ($_SESSION["loginStatus"]=="Member")){
                  $clinic_Views = $clinic_Views+1;
                  $insert_views = "UPDATE clinic SET clinic_Views ='$clinic_Views' WHERE clinic_ID = '$clinic_ID' ";
                  $result_insert_views = mysqli_query($dbConnect, $insert_views);

                  if ($clinic_Views == 2000)  {
                    ?>
                    <script type="text/javascript">
                      window.location = 'AddSMS1000.php?clinic_ID=<?php echo $clinic_ID; ?>&token=<?php echo md5( $member_ID.'@Confirm'); ?> ';
                    </script>
                <?php  }
                else if ($clinic_Views == 2100) {

                    $clinic_pay = "UPDATE clinic SET Status = 3 WHERE clinic_ID = '$clinic_ID' ";
                    $result_clinic_pay = mysqli_query($dbConnect, $clinic_pay);
                    ?>
                    <script type="text/javascript">
                      window.location = 'AddSMS1100.php?clinic_ID=<?php echo $clinic_ID; ?>&member_ID=<?php echo $member_ID; ?>&token=<?php echo md5( $member_ID.'@Confirm'); ?> ';
                    </script>
                    <?php
                    }
                   }   // ปิด session
     ?>
    <div class="container border-top" style=" min-height:1000px;"><br>
      <p style="" class=""><a href="Allclinic.php">Clinic</a> > <?php echo $record['clinic_Name'];?></p>
      <span style="font-size:20px;" class="text-primary"><?php echo $record['clinic_Name'];?></span><br>
      <span><?php echo $record['clinic_NumAddress']; echo "&nbsp"; echo $record['clinic_Address_GPS']; ?></span>
      <center>
        <br>
      <div class="col-9">
        <?php include("upload.php") ?>
        <br>
        <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-Detail-tab" data-toggle="pill" href="#pills-Detail" role="tab" aria-controls="pills-Detail" aria-selected="true">
              รายละเอียดคลินิก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-service-tab" data-toggle="pill" href="#pills-service" role="tab" aria-controls="pills-service" aria-selected="false">
              การบริการ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-reviews-tab" data-toggle="pill" href="#pills-reviews" role="tab" aria-controls="pills-reviews" aria-selected="false">
              รีวิว</a>

          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-docter-tab" data-toggle="pill" href="#pills-docter" role="tab" aria-controls="pills-docter" aria-selected="false">
              แพทย์ประจำคลินิก</a>
          </li>
        </ul>
        <div class="tab-content   text-left" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-Detail" role="tabpanel" aria-labelledby="pills-Detail-tab">
            <div class="border" style="padding:15px; border-radius:5px;">
              <p><?php echo $record['clinic_Detail']; ?></p>
              <p>เบอร์โทร <?php echo $record['clinic_Phone']; ?></p>
                <?php
                require_once("connect/connect.php");
                $db=new mysqli( 'localhost', 'root', '', 'beauty_center');
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
                 $clinicDay_Start = date("H:i", strtotime($record4['clinicDay_Start']));
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
                	$d=$ro['clinicDay_Name']; $w = $day_config[$d][2];  $st = intval($ro['st']); $en=intval($ro['en']);
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
                		$cur_hour = 7; // เปลี่ยน ชั่วโมง เริ่มต้น
                		$tr .= '<tr ><td align=center bgcolor="'.$day_config[$d][0].'" >'.$day_config[$d][1].'</td>';
                	}
                	if($cur_hour<$st) // ตรวจสอบ gab ชั่วโมงเริ่มต้น กับชั่วโมงปัจจุบันเพื่อนสร้าง td ชั่วโมงที่ว่าง
                		$tr.='<td align=center colspan='.($st - $cur_hour)." >&nbsp;</td>";
                	$cur_hour=$en; // เปลี่ยน ชั่วโมง เริ่มต้น เป็น เวลาสิ้นสุดการเรียน
                	//  แสดงเวลาเรียน
                	$tr .= '<td align=center '.( ($h = $en - $st)>1 ? "colspan=$h" : '' ).' >'.$ro['clinicDay_Name']."&nbsp;".$ro['clinicDay_Start'] . '<br>' . $ro['clinicDay_End'] .'</td>';
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
          </div>

          <div class="tab-pane fade" id="pills-service" role="tabpanel" aria-labelledby="pills-service-tab">
            <center>
            <div class="col-12 ">
              <?php
                $sql2 = "SELECT * FROM clinic,service,servicetype WHERE clinic.clinic_ID=service.clinic_ID and servicetype.serviceType_ID=service.serviceType_ID and clinic.clinic_ID  =$clinic_ID";
                $result2 = mysqli_query($dbConnect, $sql2);
                if(mysqli_affected_rows($dbConnect)==0){
                  echo "<br><center><p>ไม่มีข้อมูล</p></center>";
                }
                while($row2 = mysqli_fetch_assoc($result2)){
                $temp = array();
                $row2['service_Image']=trim($row2['service_Image'], '/,');
                $temp   = explode(',', $row2['service_Image']);
                $temp   = array_filter($temp);
                $images = array();
                foreach($temp as $image){
                $images[]="clinic/service".$temp['service_Image']."/".trim( str_replace(array('[',']') ,"" ,$image ) );
                $img = count($images); }
                ?>
            <div class="card">
              <div class="card-header font-weight-bold">
                <?php echo $row2['service_Name'] ; ?>
              </div>
              <div class="row no-gutters">
                <div class="col-md-6">
                  <div id="myCarousel" class="carousel slide  carousel-fade " style="box-shadow:0px 0px 0px #000;" data-ride="carousel">
                      <div class="carousel-inner" >
                          <?php for($i = 0; $i < $img; $i++){ ?>
                              <div class="carousel-item <?= $i == 1 ? ' active' : ''; ?>">
                                  <img src="<?php echo $images[$i];?>" height="250" class="d-block w-100" >
                              </div>
                          <?php } ?>
                      </div>
                  </div>
                  </div>
                  <div class="col-sm">
                    <div class="card-body text-left">
                      <p class="card-text"> <?php  echo mb_substr($row2['service_Description'], 0, 100); ?>...
                      <a href="ReadService.php?service_ID=<?php echo  $row2["service_ID"]; ?>&clinic_ID=<?php echo   $row2["clinic_ID"];?>&token=<?php echo md5( $row2["clinic_ID"].'@Confirm'); ?>" role="button">  อ่านเพิ่ม ..</a>
                      </p>
                    <p class="card-text"> ราคา <?php echo $row2['service_Price']; ?> บาท</p>
                    <p class="card-text"> ประเภท <?php echo $row2['serviceType_Name']; ?></p>
                    <?php if($_SESSION["loginStatus"]==""){?>
                      <p class="text-danger"> กรุณาเข้าสู่ระบบเพื่อทำการจอง <a href="login.php">คลิก</a> </p>
                    <?php } elseif($_SESSION["loginStatus"]=="Member"){ ?>
                      <button type="button" name="button" class="btn btn-primary ">
                        <a class="text-light" href="booking.php?service_ID=<?php echo  $row2["service_ID"]; ?>&member_ID=<?php echo $_SESSION["member_ID"] ?>&token=<?php echo md5( $_SESSION["member_ID"].'@Confirm'); ?>">
                          จองเลย
                        </a>
                      </button>
                       <?php } ?>

                  </div>
                </div>
               </div>
             </div>
             <br>
             <?php } ?>
           </div>
         </center>
          </div>

          <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
            <center>
            <div class="col-12 ">
              <?php
                $sql2 = "SELECT * FROM clinic,reviews WHERE clinic.clinic_ID=reviews.clinic_ID and clinic.clinic_ID =$clinic_ID";
                $result2 = mysqli_query($dbConnect, $sql2);
                if(mysqli_affected_rows($dbConnect)==0){
                  echo "<br><center><p>ไม่มีข้อมูล</p></center>";
                }
                while($row2 = mysqli_fetch_assoc($result2)){
                $temp = array();
                $row2['reviews_Image']=trim($row2['reviews_Image'], '/,');
                $temp   = explode(',', $row2['reviews_Image']);
                $temp   = array_filter($temp);
                $images = array();
                foreach($temp as $image){
                $images[]="clinic/reviews".$temp['reviews_Image']."/".trim( str_replace(array('[',']') ,"" ,$image ) );
                $img = count($images); }
                ?>
            <div class="card">
              <div class="row no-gutters">
                <div class="col-md-6">
                  <div id="myCarousel" class="carousel slide  carousel-fade " style="box-shadow:0px 0px 0px #000;" data-ride="carousel">
                      <div class="carousel-inner" >
                          <?php for($i = 0; $i < $img; $i++){ ?>
                              <div class="carousel-item <?= $i == 1 ? ' active' : ''; ?>">
                                  <img src="<?php echo $images[$i];?>" height="250" class="d-block w-100" >
                              </div>
                          <?php } ?>
                      </div>
                  </div>
                  </div>
                  <div class="col-sm">
                    <div class="card-body text-left">
                      <p class="card-text">
                        <a href="ReadReviews.php?reviews_ID=<?php echo  $row2["reviews_ID"]; ?>&clinic_ID=<?php echo   $row2["clinic_ID"];?>&token=<?php echo md5( $row2["clinic_ID"].'@Confirm'); ?>" role="button">  <?php echo $row2['reviews_Name'] ; ?> </a>
                        </p>
                      <p class="card-text"><?php echo mb_substr($row2['reviews_Description'], 0, 300); ?>
                        <a href="ReadReviews.php?reviews_ID=<?php echo  $row2["reviews_ID"]; ?>&clinic_ID=<?php echo   $row2["clinic_ID"];?>&token=<?php echo md5( $row2["clinic_ID"].'@Confirm'); ?>" role="button">อ่านต่อ..</a>
                      </p>
                    <p class="card-text"> <?php echo $row2['reviews_Date']; ?></p>
                    </div>
                </div>

               </div>
             </div>
             <br>
             <?php } ?>
           </div>
           </center>
          </div>

          <div class="tab-pane fade" id="pills-docter" role="tabpanel" aria-labelledby="pills-docter-tab">
            <center>
            <div class="col-12">
          <?php
            $sql1 = "SELECT * FROM clinic,doctor WHERE clinic.clinic_ID=doctor.clinic_ID and clinic.clinic_ID =$clinic_ID";
            $result_sql1 = mysqli_query($dbConnect, $sql1);
            if(mysqli_affected_rows($dbConnect)==0){
              echo "<br><center><p>ไม่มีข้อมูล</p></center>";
            }
            while($row1 = mysqli_fetch_array($result_sql1)){
            ?>
            <div class="card">
              <div class="row no-gutters">
                 <div class="col-md-4">
                   <img src="doctor/D_profile/<?php echo $row1['doctor_Image']; ?>" class="img-fluid">
                 </div>
                 <div class="col-sm-8">
                   <div class="card-body text-left">
                   <h5 class="card-title"><?php echo $row1['doctor_Name'] ; ?> <?php echo $row1['doctor_Surname'] ; ?></h5>
                   <span class="card-text"> <?php echo $row1['doctor_Details']; ?></span>
                 </div>
               </div>
               </div>
             </div>
             <br>
           <?php } ?>
          </div>
          </center>
        </div>
        <!-- ปิด tab -->
      </div>
      <!-- ปิด tab -->
      </center>
      <center>
      <div class="col-9">


        <br>
        <p id="comment" style="font-size:18px;" class="text-left">Comment </p> <hr>
      <?php if($_SESSION["loginStatus"]!=""){ ?>
      <form class="" action="comment_save.php" method="post" enctype="multipart/form-data">
      <div class="form-row ">
        <?php if($_SESSION["loginStatus"]=="Clinic"){
          $clinic_ID = $_SESSION['clinic_ID'];
          $sql_comment = "SELECT * FROM clinic WHERE clinic_ID = $clinic_ID";
          $result_sql_comment = mysqli_query($dbConnect, $sql_comment);
          $row_comment = mysqli_fetch_array($result_sql_comment);
          ?>
          <div class="col-sm-6  text-left">
            <?php echo "ชื่อผู้ใช้  "; echo $row_comment['clinic_Name']; ?>
            <input type="hidden" class="border-0 " name="user_ID" value="<?php echo $_SESSION["clinic_ID"]; ?> " >
      </div>
        <?php } else if($_SESSION["loginStatus"]=="Member"){
          $member_ID = $_SESSION['member_ID'];
          $sql_comment = "SELECT * FROM member WHERE member_ID = $member_ID";
          $result_sql_comment = mysqli_query($dbConnect, $sql_comment);
          $row_comment = mysqli_fetch_array($result_sql_comment);
          ?>
        <div class="col text-left">
          <?php echo "ชื่อผู้ใช้  "; echo $row_comment['member_Name'];  echo "&nbsp;"; echo $row_comment['member_Surname']; ?>
        <input type="hidden" name="user_ID" value="<?php echo $_SESSION["member_ID"]; ?>" >
      </div>
        <?php } ?>
        <div class="col-sm-6 text-left">
          <span class="text-left">Update</span>
          <input type="text"  class="border-0 " name="comment_Date" value="<?php echo date('Y-m-d H:i:s'); ?>  " readonly>
        </div>
      </div>
      <div class="form-group text-left">
      <label class="text-left">แสดงความคิดเห็น </label>
      <textarea name="comment_Details" rows="3" class="form-control" required></textarea>
    </div>
      <div class="form-row col-12 text-left">
      <div class="col ">
      <input type="hidden" class="border-0 " name="ref_clinic_ID" value="<?php echo $record["clinic_ID"]; ?> " >
      <button type="submit" class="btn btn-primary">แสดงความคิดเห็น</button>
      </div>
      <div class="col text-left">
          <button type="reset" class="btn btn-secondary">ล้างข้อความ</button>
      </div>
    </div>
      </form>
      <?php } ?>
      <br>
      <p style="font-size:18px;" class="text-left">All Comment </p>
      <hr>
      <?php
      include("comment_list.php");
      ?>
    </div>

    </center>
    </div> <!-- ปิด col-9 ตัวบน -->
    <div style="height:200px;">
    </div>
  </div>
    <?php include("footer.php"); ?>
    </body>
  </html>
