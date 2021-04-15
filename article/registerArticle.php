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
  </head>
  <body class="Myfont" >
    <style>
    .custom-file-input.selected:lang(th)::after {
      content: "" !important;
    }
    .custom-file {
      overflow: hidden;
    }
    .custom-file-input {
      white-space: nowrap;
    }
  </style>
  <?php include('navbar.php');  ?>
<br>
<div class="container">
</div>
  <p class="text-center Myfont" style="font-size:22px;" name="register">เพิ่มบทความ</p>
  <div class="container col-lg-8" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
    <form action="AddArticle.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
       <label for="article_NameTitle">หัวข้อบทความ</label>
       <input name="article_NameTitle" id="article_NameTitle" type="text" class="form-control" required >

     </div>

    <div class="form-group">
    <label for="article_Details">รายละเอียดบทความ</label>
    <textarea type="text" rows="2" class="form-control ckeditor" name="article_Details" id="member_Address" required></textarea>
    </div>

<br>

    <div class="form-group">
     <label for="article_Image">ภาพประกอบ</label>
     <input type="file" class="form-control-file" accept="image/*"  name="article_Image"  id="article_Image" required >
    </div>
<br>
    <div class="form-group">
     <label for="article_Date">วันที่</label>
     <input type="text"  class="form-control" name="article_Date" id="article_Date"  value="<?=date('Y-m-d H:i:s')?>" required />

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
      <button type="clear" class="btn btn-secondary">clear</button>
    </form>



    </div>
    <br><br>
    <?php include("../footer.php"); ?>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>

    </body>
  </html>
