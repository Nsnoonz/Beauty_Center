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
  </head>
  <body class="Myfont">
  <?php
  include ('navbar.php');
  $serviceType_ID = $_REQUEST["serviceType_ID"];
  $query1 = "SELECT * FROM servicetype WHERE serviceType_ID='$serviceType_ID' ";
  $result1 = mysqli_query($dbConnect, $query1);
  $row1 = mysqli_fetch_array($result1);

  ?>
    <br>
    <p class="text-center" style="font-size:22px;" name="register">แก้ไขประเภทบริการ</p>
    <div class="container col-lg-8" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
    <form action="UpdataServiceType.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="serviceType_Name">รหัสประเภทบริการ</label>
    <input  name="serviceType_ID" id="serviceType_ID" type="text" class="form-control " value="<?php echo $row1['serviceType_ID'];?>"  required  readonly>
    </div>

    <div class="form-group">
    <label for="serviceType_Name">ชื่อประเภทบริการ</label>
    <input  name="serviceType_Name" id="serviceType_Name" type="text" class="form-control " value="<?php echo $row1['serviceType_Name'];?>"  required >
    </div>

    <!-- value="<?php echo $row1['article_NameTitle'];?> -->

    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    <button type="clear" class="btn btn-secondary">clear</button>
        </form>
  </div>
  <div style="height:300px;"> </div>
      <?php include("../footer.php"); ?>
  </body>
</html>
