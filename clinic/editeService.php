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
  <body class="Myfont">
    <script  type='text/javascript'>
    function check_char(p){
    	if(p.value.match(/^[ก-ฮ,a-z,!,@,#,$,%,^,&,*,?,_,~,-,+,.,/,(,),},{]+$/i) && p.value.length>0 ){
    		alert('ระบุเฉพาะตัวเลข');
    		p.value='';
    	}
    }
    </script>
  <?php
  include ('navbar.php');
  $clinic_ID = $_REQUEST["clinic_ID"];
  $serviceType_ID = $_REQUEST["serviceType_ID"];
  $service_ID = $_REQUEST["service_ID"];
  // $query1 = "SELECT * FROM service WHERE service_ID='$service_ID' ";
  $query1 = "SELECT * FROM service,servicetype WHERE (service.serviceType_ID = servicetype.serviceType_ID) and service.service_ID='$service_ID' ";
  $result1 = mysqli_query($dbConnect, $query1);
  $row1 = mysqli_fetch_array($result1);
  ?>
  <br>
    <p class="text-center " style="font-size:22px;" name="register">แก้ไขข้อมูลบริการ</p>
    <div class="container col-lg-6" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
    <form action="UpdateService.php" method="post" enctype="multipart/form-data">

      <div class="form-group">
      <input type="text" class="form-control" name="service_ID" id="service_ID" value="<?php echo  $row1["service_ID"]; ?>" required hidden  >
      </div>

     <div class="form-group">
     <label for="service_Name">ชื่อบริการ</label>
     <input  name="service_Name" id="service_Name" type="text" class="form-control" value="<?php echo $row1['service_Name'];?>"  >
    </div>

    <div class="form-group">
    <label for="service_Description">รายละเอียดบริการ</label>
    <textarea type="text" class="form-control ckeditor" name="service_Description" id="service_Description" placeholder="">
      <?php echo $row1['service_Description'];?>
    </textarea>
    </div>



    <div class="form-group">
    <label for="service_Price">ราคา</label>
    <input type="text" class="form-control" name="service_Price" id="service_Price" value="<?php echo $row1['service_Price'];?>" >
    </div>

    <div class="form-group">
    <label for="serviceType_ID">ประเภทบริการ</label>
    <select class="form-control" name="serviceType_ID" autofocus id="serviceType_ID" >
    <option value="<?php echo $row1['serviceType_ID'];?>"><?php echo $row1['serviceType_Name'];?></option>
    <option value="">----เลือกแก้ไขประเภทบริการ----</option>
      <?php
      $query2 = "SELECT * FROM servicetype ";
      $result2 = mysqli_query($dbConnect, $query2);
      while ($row2=mysqli_fetch_array($result2)) {?>
          <option value="<?php echo $row2["serviceType_ID"]; ?>"><?php echo  $row2["serviceType_Name"]; ?></option>
<?php } ?>
   </select>
    </div>
    <div class="form-group">
    <input type="text" class="form-control" name="clinic_ID" id="clinic_ID" value="<?php echo  $_SESSION["clinic_ID"]; ?>" required hidden  >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="clear" class="btn btn-secondary">clear</button>
    </form>
    </div>

    <br><br>

    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>

  </html>
