<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Center</title>
    <link rel="icon" href="../img/clinic.ico">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/webstyle.css">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
    function check_num(num){
      if (num.value.match(/^[ก-ฮ,a-z,!,@,#,$,%,^,&,*,?,_,~,-,+,.,/,(,),},{]+$/i) || num.value.length !=5 )
       {
        alert('กรุณาระบุเลขที่ใบอนุญาตทางการแพทย์ 5 หลัก');
        num.value='';
      }
    }
    </script>
  </head>
  <body class="Myfont">
  <?php include('navbar.php');
  session_start();
  $doctor_ID = $_REQUEST["doctor_ID"];
  if( empty($_GET['doctor_ID']) || ( $_GET['token'] != md5($_GET['doctor_ID'].'@Confirm') )){
   exit('รหัสไม่ถูกต้อง');
} else {
  $doctor_ID = $_REQUEST["doctor_ID"];
  $query1 = "SELECT * FROM doctor WHERE doctor_ID='$doctor_ID' ";
  $result1 = mysqli_query($dbConnect, $query1);
  $row1 = mysqli_fetch_array($result1);
  ?>
  <br>
    <p class="text-center" style="font-size:22px;" name="register">แก้ไขข้อมูลแพทย์</p>
    <div class="container col-lg-6" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
    <form action="UpdateDoctor.php" method="post" enctype="multipart/form-data">
      <input type="text" hidden class="form-control" name="clinic_ID" id="clinic_ID" value="<?php echo  $_SESSION["clinic_ID"]; ?>"   >

      <div class="form-group">
      <label for="doctor_License">เลขที่ใบอนุญาตประกอบวิชาชีพ</label>
      <input  name="doctor_ID" readonly id="doctor_ID" type="text" class="form-control" value="<?php echo $row1['doctor_ID'];?> " hidden>
      <input  name="doctor_License" onchange='check_num(this)'  id="doctor_License" type="text" class="form-control" value="<?php echo $row1['doctor_License'];?>" >
     </div>
     <div class="form-group">
     <label for="doctor_Name">ชื่อ</label>
     <input  name="doctor_Name" id="doctor_Name" type="text" class="form-control" value="<?php echo $row1['doctor_Name'];?>" >
    </div>

    <div class="form-group">
    <label for="doctor_Surname">นามสกุล</label>
    <input type="text" class="form-control" name="doctor_Surname" id="doctor_Surname" value="<?php echo $row1['doctor_Surname'];?>">
    </div>

    <div class="form-group">
    <label for="doctor_Details">รายละเอียดแพทย์</label>
    <textarea type="text" class="form-control ckeditor" name="doctor_Details" id="doctor_Details" placeholder="">
      <?php echo $row1['doctor_Details'];?>
    </textarea>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
      <button type="clear" class="btn btn-secondary">clear</button>
    </form>



    </div>
  <?php } ?>
    <br><br>


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>

    </body>
  </html>
