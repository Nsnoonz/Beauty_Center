<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Center</title>
    <link rel="icon" href="../img/clinic.ico">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/webstyle.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJMyTKzqxEUXFGz9GinAs4yhv2Zz_C7OM&callback=initMap&libraries=&v=weekly"defer></script>
</head>
<body>
  <script type="text/javascript">
  function myFunction() {
    var x = document.getElementById("password1");
    var y = document.getElementById("password2");
    if (x.type == "password" ||  y.type == "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
  }
  </script>
  <?php
  include ('../connect/connect.php');
  include ('navbar.php');
  session_start();
  $clinic_ID = $_REQUEST["clinic_ID"];
  if( empty($_GET['clinic_ID']) || ( $_GET['token'] != md5($_GET['clinic_ID'].'@Confirm') )){
   exit('รหัสไม่ถูกต้อง');
} else {
  $query1 = "SELECT * FROM clinic WHERE clinic_ID = $clinic_ID";
  $result1 = mysqli_query($dbConnect, $query1);
  $row1 = mysqli_fetch_array($result1);
}
  ?>
  <br>
  <p class="text-center Myfont" style="font-size:22px;" name="register">แก้ไขรหัสผ่าน</p>
    <div class="container col-sm-4 Myfont" style=" box-shadow:0px 0px 5px #000; padding:15px; border-radius: 10px;">
      <form action="UpdatePassClinic.php" name="form1" method="post" enctype="multipart/form-data">
        <input  name="clinic_ID" id="clinic_ID" hidden  type="text" class="form-control "  value="<?php echo$row1['clinic_ID'] ?>">
        <div class="form-group">
        <label for="Password">รหัสผ่านเดิม</label>
        <input  name="password" id="password" type="text" class="form-control "  required >
      </div>
        <div class="form-group">
        <label for="password1">รหัสผ่านใหม่</label>
        <input  name="password1" id="password1" type="password" class="form-control ">
        </div>
        <div class="form-group">
        <label for="password2">ยืนยันรหัสผ่าน</label>
        <input  name="password2" id="password2" type="password" class="form-control ">
        </div>
        <input type="checkbox" onclick="myFunction()"> Show Password
        <center>
      <button name="submit" type="submit" class="btn btn-primary" value="">submit</button>
      <button type="clear" class="btn btn-secondary">clear</button>
      </center>
        </form>

     </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
</body>
</html>
