<?php
session_start();
require_once('connect/connect.php');
?>
<link rel="stylesheet" href="css/bootstrap.css">

 <?php if (($_SESSION["loginStatus"]=="") or ($_SESSION["loginStatus"]=="Member") )  {
   ?>
   <img src="images/111.png" class="img-fluid w-100" alt="Responsive image">
   <?php
   $query1 = "SELECT * FROM servicetype ";
   $result1 = mysqli_query($dbConnect, $query1);
   if(mysqli_affected_rows($dbConnect)==0){
     echo "ไม่มีข้อมูล";
    } ?>
  <ul class="nav justify-content-center">
        <?php while($row2 = mysqli_fetch_array($result1)){ ?>
  <li class="nav-item">
      <a class="nav-link" href="AllService.php?serviceType_ID=<?php echo$row2['serviceType_ID'];?>"><?php echo$row2['serviceType_Name'];?></a>
        </li>
        <?php }?>
</ul>
<?php }?>
