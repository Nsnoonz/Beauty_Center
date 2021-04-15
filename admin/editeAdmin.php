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
   <script type='text/javascript'>
      function check_char(elm){
      	if(elm.value.match(/^[0-9,a-z,!,@,#,$,%,^,&,*,?,_,~,-,+,.,/,(,),},{]+$/i) && elm.value.length>0)
          {
      		alert('ไม่สามารถใช้ตัวอักษรพิเศษและตัวเลขได้');
      		elm.value='';
      	}
      }
      function check_phone(phone){
      	if (phone.value.match(/^[ก-ฮa-z]+$/i) || phone.value.length !=10 )
         {
      		alert('กรุณากรอกเบอร์โทรศัพท์ 10 หลัก');
          phone.value='';
      	}

      }
</script>
</head>
<body>
  <?php
  include ('navbar.php');
  $admin_ID = $_REQUEST["admin_ID"];
  if( empty($_GET['admin_ID']) || ( $_GET['token'] != md5($_GET['admin_ID'].'@Confirm') )){
   exit('รหัสไม่ถูกต้อง');
} else {
  $query1 = "SELECT * FROM admin WHERE admin_ID = $admin_ID";
  $result1 = mysqli_query($dbConnect, $query1);
  $row1 = mysqli_fetch_array($result1);
  }
  ?>
  <br><br>
  <p class="text-center Myfont" style="font-size:22px;" name="register">แก้ไขข้อมูลส่วนตัว</p>
    <div class="container col-lg-6" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
      <form action="UpdateAdmin.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
         <label for="admin_Email">Email address</label>
         <input name="admin_Email"  type="email" class="form-control" value="<?php echo $row1['admin_Email'];?>"required  >
       </div>
       <div class="form-group">
       <label for="admin_Name">ชื่อ</label>
       <input  name="admin_Name"  type="text" class="form-control"  onkeyup='check_char(this)' value="<?php echo $row1['admin_Name'];?>" required>
      </div>

      <div class="form-group">
      <label for="admin_Surname">นามสกุล</label>
      <input type="text" class="form-control" name="admin_Surname"  placeholder="นามสกุลภาษาไทย" onkeyup='check_char(this)' value="<?php echo $row1['admin_Surname'];?>" required>
      </div>

      <div class="form-group">
      <label for="admin_Address">ที่อยู่</label>
      <input type="text" class="form-control" name="admin_Address" value="<?php echo $row1['admin_Address'];?>" required>
      </div>

      <div class="form-group">
       <label for="admin_Phone">เบอร์โทร</label>
       <input type="tel"  class="form-control" name="admin_Phone" id="admin_Phone"required onchange='check_phone(this)' value="<?php echo $row1['admin_Phone'];?>"required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
        <button type="clear" class="btn btn-secondary">clear</button>
      </form>
  </div>
  <div style="height:200px;"> </div>
  <?php include("../footer.php"); ?>
</body>
</html>
