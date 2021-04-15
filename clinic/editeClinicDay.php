<!DOCTYPE html>
<?php require_once('../connect/connect.php'); ?>
<?php session_start(); ?>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Beauty Center</title>
      <link rel="icon" href="../img/clinic.ico">
      <link rel="stylesheet" href="../css/bootstrap.css">
      <link rel="stylesheet" href="../css/webstyle.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"  />
      <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
  </head>
  <body >

  <?php include('navbar.php');
  session_start();
  $clinic_ID = $_REQUEST["clinic_ID"];
  $clinicDay_ID = $_REQUEST["clinicDay_ID"];
  $query1 = "SELECT * FROM clinicday WHERE clinicDay_ID='$clinicDay_ID'";
  $result1 = mysqli_query($dbConnect, $query1);
  $row1 = mysqli_fetch_array($result1);
  ?>
  <br>
    <p class="text-center" style="font-size:22px;" name="register">แก้ไขเวลาทำการคลินิก</p>
    <div class="container col-lg-6" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
    <form action="UpdateClinicDay.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
      <input type="text" class="form-control" name="clinicDay_ID" id="clinicDay_ID" value="<?php echo  $row1["clinicDay_ID"]; ?>" required hidden  >
      </div>
     <div class="form-group">
     <label for="clinicDay_Name">วันทำการ</label>
     <select class="form-control" name="clinicDay_Name" size="1" autofocus id="clinicDay_Name"  value="<?php echo $row1['clinicDay_Name'];?>">
       <option value="<?php echo $row1['clinicDay_Name']; ?>"><?php echo $row1['clinicDay_Name']; ?></option>
       <option value="Mon" >วันจันทร์</option>
       <option value="Tue">วันอังคาร</option>
       <option value="Wed">วันพุธ</option>
       <option value="Thu" >วันพฤหัสบดี</option>
       <option value="Fri">วันศุกร์</option>
       <option value="Sat">วันเสาร์</option>
       <option value="Sun">วันอาทิตย์</option>
    </select>
    </div>

    <div class="form-row">
      <label for="clinicDay_Start">เวลาเริ่มทำการ</label>
      <select class="form-control" name="clinicDay_Start" id="clinicDay_Start">
        <option value="<?php echo $row1['clinicDay_Start']; ?>"><?php echo $row1['clinicDay_Start']; ?></option>
        <?php for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
      for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
          echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                         .str_pad($mins,2,'0',STR_PAD_LEFT).':00'.'</option>';?>
      </select>

      <label for="clinicDay_End">เวลาปิดทำการ</label>
      <select class="form-control" name="clinicDay_End" id="clinicDay_End">
        <option value="<?php echo $row1['clinicDay_End']; ?>"><?php echo $row1['clinicDay_End']; ?></option>
        <?php for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
      for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
          echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                         .str_pad($mins,2,'0',STR_PAD_LEFT).':00'.'</option>';?>
      </select>

    <div class="form-group">
    <input type="text" class="form-control" name="clinic_ID" id="clinic_ID" value="<?php echo  $_SESSION["clinic_ID"]; ?>" required hidden >
    </div>
<br><br>
    <button type="submit" class="btn btn-primary">Submit</button>
      <button type="clear" class="btn btn-secondary">clear</button>
    </form>



    </div>
    <br><br>


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>

    </body>
  </html>
