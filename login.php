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
  <?php include('navbar.php');?>
  <br>
  <p class="text-center" style="font-size:22px;" name="register">เข้าสู่ระบบ</p>
  <div class="container col-lg-4 " style="box-shadow:0px 0px 2px #000; border-radius: 5px;padding:15px; ">

    <form  action="checklogin.php" method="post"enctype="multipart/form-data">
      <div class="form-group">
      <label for="email">Email</label>
      <input  name="email" id="email" type="text" class="form-control "  placeholder="example@beauty.com"required >
      </div>
      <div class="form-group">
      <label for="Password">password</label>
      <input  name="password" id="password" type="password" class="form-control "  required >
      </div>
      <div class="form-group">
      <label for="loginStatus">สถานะ</label>
      <select  class="form-control col-4"name="loginStatus"id="loginStatus">
        <option value="Admin">ผู้ดูแลระบบ</option>
        <option value="Member">สมาชิก</option>
        <option value="Clinic">คลินิก</option>
      </select>
      </div>
      <br>
      <center>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    <button type="clear" class="btn btn-secondary">clear</button>
    </center>
      </form>
      <?php session_destroy(); ?>


  </div>
  <div style="height:200px;">

  </div>
<?php include("footer.php") ?>



        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>

    </body>
  </html>
