
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Center</title>
    <link rel="icon" href="img/clinic.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/webstyle.css">

  </head>
  <body class="Myfont">
    <script type='text/javascript'>
function check_char(elm){
	if(elm.value.match(/^[0-9,a-z,!,@,#,$,%,^,&,*,?,_,~,-,+,.,/,(,),},{]+$/i) && elm.value.length>0){
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
function myFunction() {
  var x = document.getElementById("member_Password");
  if (x.type == "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
  <?php include('navbar.php');?>
  <?php session_start(); ?>
  <br>
    <?php if($_SESSION["loginStatus"]=="Admin"){ ?>
    <p class="text-center" style="font-size:22px;" name="register">เพิ่มสมาชิก</p>
  <?php } if($_SESSION["loginStatus"]==""){?>
  <p class="text-center" style="font-size:22px;" name="register">ลงทะเบียนสมัครสมาชิก</p>
  <p class=" container col-lg-6" >หากคุณคือผู้ประกอบการ <a href="registerClinic.php">เริ่มต้นที่นี่</a></p>
<?php } ?>
    <div class="container col-lg-6" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
    <form action="member/AddMember.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
       <label for="member_Email">Email address</label>
       <input name="member_Email" d="member_Email" type="email" class="form-control" placeholder="example@beauty.com"  aria-describedby="emailHelp" required >
       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
     </div>

     <div class="form-group">
       <label for="member_Password">Password</label>
       <input name="member_Password" id="member_Password" type="password" class="form-control"  required >
       <input type="checkbox" onclick="myFunction()"> Show Password
     </div>

     <div class="form-group">
     <label for="member_Name">ชื่อ</label>
     <input  name="member_Name" id="member_Name" type="text" class="form-control" placeholder="ชื่อภาษาไทย" required onkeyup='check_char(this)'>
    </div>

    <div class="form-group">
    <label for="member_Surname">นามสกุล</label>
    <input type="text" class="form-control" name="member_Surname" id="member_Surname" placeholder="นามสกุลภาษาไทย"required onkeyup='check_char(this)'>
    </div>

    <div class="form-group">
    <label for="member_Address">ที่อยู่</label>
    <input type="text" class="form-control" name="member_Address" id="member_Address"required >
    </div>

    <div class="form-group">
     <label for="member_Phone">เบอร์โทร</label>
     <input type="tel" placeholder="08xxxxxxxx" class="form-control" name="member_Phone" id="member_Phone"required onchange='check_phone(this)' >
    </div>

    <div class="form-group">
     <label for="member_Image">ภาพโปรไฟล์</label>
     <input type="file" class="form-control-file" name="member_Image"  id="member_Image"required >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
      <button type="clear" class="btn btn-secondary">clear</button>
    </form>



    </div>
    <div style="height:200px;"> </div>
  <?php include("footer.php") ?>


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>

    </body>
  </html>
