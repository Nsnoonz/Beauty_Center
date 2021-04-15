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
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
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
  include ('navbar.php');
  //   $admin_ID = $_REQUEST["admin_ID"];
  //   if( empty($_GET['admin_ID']) || ( $_GET['token'] != md5($_GET['admin_ID'].'@Confirm') )){
  //    exit('รหัสไม่ถูกต้อง');
  // } else {
    // }
  $article_ID = $_REQUEST["article_ID"];
  $query1 = "SELECT * FROM article WHERE article_ID='$article_ID'";
  $result1 = mysqli_query($dbConnect, $query1);
  $row1 = mysqli_fetch_array($result1);
  ?>
  <br>
  <p class="text-center Myfont" style="font-size:22px;" name="register">แก้ไขบทความ</p>
    <div class="container col-lg-6" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
      <form action="UpdateArticle.php" method="post" enctype="multipart/form-data">


        <input name="article_ID" id="article_ID" type="text"  value="<?php echo $row1['article_ID'];?>" class="form-control" hidden required >
        <input name="article_ID2" id="article_Image2" type="text"  value="<?php echo $row1['article_Image'];?>" class="form-control" hidden  >
      <div class="form-group">
         <label for="article_NameTitle">หัวข้อบทความ</label>
         <input name="article_NameTitle" id="article_NameTitle" type="text" class="form-control" value="<?php echo $row1['article_NameTitle'];?>"  required >
     </div>

      <div class="form-group">
      <label for="article_Details">รายละเอียดบทความ</label>
      <textarea type="text" rows="2" class="form-control ckeditor" name="article_Details" id="article_Details" value=""  required><?php echo $row1['article_Details'];?></textarea>
      </div>
    <div class="form-group">
       <label for="article_Date">วันที่</label>
       <input type="text"  class="form-control" name="article_Date" id="article_Date"  value="<?=date('Y-m-d H:i:s')?>" required />

      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
        <button type="clear" class="btn btn-secondary">clear</button>
      </form>

<!-- value="<?php echo $row1['article_NameTitle'];?>"
value="<?php echo $row1['article_Details'];?>" -->

      </div>
      <br><br>
          <?php include("../footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
</body>
</html>
