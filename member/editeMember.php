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
<body class="Myfont">
  <?php
  include ('../connect/connect.php');
  include ('navbar.php');
  session_start();
  $member_ID = $_REQUEST["member_ID"];
  if( empty($_GET['member_ID']) || ( $_GET['token'] != md5($_GET['member_ID'].'@Confirm') )){
   exit('<center><br>รหัสไม่ถูกต้อง</center>');
} else {
  $query1 = "SELECT * FROM member WHERE member_ID = $member_ID";
  $result1 = mysqli_query($dbConnect, $query1);
  $row1 = mysqli_fetch_array($result1);
  }
  ?>
  <br><br>
  <p class="text-center Myfont" name="register">
    <?php  if($_SESSION["loginStatus"]=="Member"){ echo "แก้ไขข้อมูลส่วนตัว"; ?>
  <?php }elseif($_SESSION["loginStatus"]=="Admin")
  { echo "แก้ไขข้อมูลสมาชิก คุณ "; echo $row1['member_Name']; echo "&nbsp";  echo $row1['member_Surname'];  } ?>
  </p>
    <div class="container col-lg-6" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
      <form action="UpdateMember.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
          <input name="member_ID"  type="text" class="form-control" value="<?php echo $row1['member_ID'];?>" hidden  >
         <label for="member_Email">Email address</label>
         <input name="member_Email"  type="email" class="form-control" value="<?php echo $row1['member_Email'];?>"required  >
       </div>
       <div class="form-group">
       <label for="member_Name">ชื่อ</label>
       <input  name="member_Name"  type="text" class="form-control"  onkeyup='check_char(this)' value="<?php echo $row1['member_Name'];?>" required>
      </div>
      <div class="form-group">
      <label for="member_Surname">นามสกุล</label>
      <input type="text" class="form-control" name="member_Surname"  placeholder="นามสกุลภาษาไทย" onkeyup='check_char(this)' value="<?php echo $row1['member_Surname'];?>" required>
      </div>
      <div class="form-group">
      <label for="member_Address">ที่อยู่</label>
      <input type="text" class="form-control" name="member_Address" value="<?php echo $row1['member_Address'];?>" required>
      </div>
      <div class="form-group">
       <label for="member_Phone">เบอร์โทร</label>
       <input type="tel"  class="form-control" name="member_Phone" id="member_Phone"required onchange='check_phone(this)' value="<?php echo $row1['member_Phone'];?>"required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
        <button type="clear" class="btn btn-secondary">clear</button>
      </form>
        </div>
      <div style="height:200px;"> </div>
      <?php include("../footer.php"); ?>

</html>
