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
  <?php
  include ('navbar.php');
  $clinic_ID = $_REQUEST["clinic_ID"];

  ?>
  <br>
    <p class="text-center" style="font-size:22px;" name="register">เพิ่มข้อมูลรีวิว</p>

    <div class="container col-lg-6" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">



    <form action="AddReviews.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
     <label for="reviews_Name">ขื่อรีวิว</label>
     <input  name="reviews_Name" type="text" class="form-control"  >
    </div>

    <div class="form-group">
    <label for="reviews_Description">รายละเอียดรีวิวคลินิก</label>
    <textarea type="text" class="form-control ckeditor" name="reviews_Description" ></textarea>
    </div>


    <div class="form-group">
     <label for="reviews_Image">ภาพรีวิว</label>
     <input type="file" class="form-control-file" name="reviews_Image[]"  accept="image/*" required multiple>
    </div>


    <div class="form-group">
    <label for="reviews_Note">หมายเหตุ</label>
    <input type="text" class="form-control" name="reviews_Note" >
    </div>


    <div class="form-group">
     <label for="reviews_Date">วันที่ลงรีวิว</label>
     <input type="text"  class="form-control" name="reviews_Date"value="<?=date('Y-m-d H:i:s')?>" required />
    </div>

    <div class="form-group">
    <input type="text" class="form-control" name="clinic_ID"value="<?php echo  $_SESSION["clinic_ID"]; ?>" required   >
    <!-- readonly -->
    </div>

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
