<?php require_once('connect/connect.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Center</title>
    <link rel="icon" href="img/clinic.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/webstyle.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </head>
  <body class="Myfont">
  <?php include('navbar.php');
    include('nav.php');
    $service_ID = $_REQUEST["service_ID"];
    $clinic_ID = $_REQUEST["clinic_ID"];
    $query1= "SELECT * FROM service,clinic WHERE service.service_ID=$service_ID and service.clinic_ID = clinic.clinic_ID";
    // $query1 = "SELECT * FROM reviews WHERE reviews_ID='$reviews_ID' ";
    $result1 = mysqli_query($dbConnect, $query1);
    $row1 = mysqli_fetch_array($result1);
  ?>
  <center>
  <div class=" container border-top Myfont">
    <br>
    <p style="" class="text-left">
      <a href="ReadClinic.php?clinic_ID=<?php echo  $row1["clinic_ID"]; ?>&token=<?php echo md5( $row1["clinic_ID"].'@Confirm'); ?> " role="button">
        <?php echo  $row1["clinic_Name"]; ?>
      </a>
      >   <?php echo  $row1["service_Name"]; ?> 
    </p>
    <div class="col-sm-8" style="min-height:1000px;">
      <center>
      <div class="col-12">
        <?php   include ('SelectImgService.php');  ?>
      </div>
      </center>
        <br>
  <div class=" table-responsive  " style="font-size:18px;"  >
    <table class="table w-100">
      <br>
       <tr><td width="200px">รีวิว: </td> <td><?php echo $row1['service_Description'];?></td></tr>
       <tr><td>ราคา </td> <td><?php echo $row1['service_Price'];?></td></tr>

   </table>
 </div>
</div>
</div>
</center>
</body>
    <?php include("footer.php"); ?>
</html>
