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
    $reviews_ID = $_REQUEST["reviews_ID"];
    $query1 = "SELECT * FROM reviews WHERE reviews_ID='$reviews_ID' ";
    $result1 = mysqli_query($dbConnect, $query1);
    $row1 = mysqli_fetch_array($result1);
    ?>
  <br>
    <p class="text-center" style="font-size:22px;" name="register">แก้ไขรีวิว</p>

    <div class="container col-lg-6" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">



    <form action="UpdateReviews.php" method="post" enctype="multipart/form-data">
      <input type="text" class="form-control" name="reviews_ID" id="reviews_ID"  value="<?php echo  $row1["reviews_ID"]; ?>" required hidden>


      <div class="form-group">
      <label for="reviews_Name">ขื่อรีวิว</label>
      <input  name="reviews_Name" id="reviews_Name" type="text" class="form-control"  value="<?php echo $row1['reviews_Name'];?>"   >
     </div>

     <div class="form-group">
     <label for="reviews_Description">รายละเอียดรีวิวคลินิก</label>
     <textarea type="text" class="form-control ckeditor" name="reviews_Description" id="reviews_Description" placeholder="">
       <?php echo $row1['reviews_Description'];?>
     </textarea>
     </div>



     <div class="form-group">
     <label for="reviews_Note">หมายเหตุ</label>
     <input type="text" class="form-control" name="reviews_Note" id="reviews_Note" value="<?php echo $row1['reviews_Note'];?>" >
     </div>


     <div class="form-group">
      <label for="reviews_Date">วันที่ลงรีวิว</label>
      <input type="text"  class="form-control" name="reviews_Date" id="reviews_Date"  value="<?=date('Y-m-d H:i:s')?>" required />
     </div>

     <div class="form-group">
     <input type="text" class="form-control" name="clinic_ID" id="clinic_ID" value="<?php echo  $_SESSION["clinic_ID"]; ?>" required hidden  >
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
