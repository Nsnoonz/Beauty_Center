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
 include("navbar.php");
 $clinic_ID = $_REQUEST["clinic_ID"];
 if( empty($_GET['clinic_ID']) || ( $_GET['token'] != md5($_GET['clinic_ID'].'@Confirm') ))
 {
   exit('<center><br>รหัสไม่ถูกต้อง</center>');
 }
 ?>
      <div class="container  Myfont" style="box-shadow: 0px 0px 1px #000; min-height:1000px;"><br>
      <p class="text-center" style="font-size:18px;">บริการของคุณ</p>
    <?php $sql = "SELECT * FROM clinic,service WHERE clinic.clinic_ID=service.clinic_ID and clinic.clinic_ID =$clinic_ID";
      $result = mysqli_query($dbConnect, $sql);
      if(mysqli_affected_rows($dbConnect)==0){echo "<center><p>ไม่มีข้อมูล</p> </center>"; }
      ?>
      <center>
      <a  style="" href="registerService.php?clinic_ID=<?php echo  $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?>">+เพิ่มบริการของคุณ</a></center>
      <br>
      <?php
      while($row = mysqli_fetch_assoc($result)){
      $temp = array();
      $row['service_Image']=trim($row['service_Image'], '/,');
      $temp   = explode(',', $row['service_Image']);
      $temp   = array_filter($temp);
      $images = array();
      foreach($temp as $image){
      $images[]="service".$temp['service_Image']."/".trim( str_replace(array('[',']') ,"" ,$image ) );
      $img = count($images); }
     ?>
    <center>
      <div class="col-10">
        <div class="card">
          <div class="row no-gutters">
             <div class="col-md-6">
               <div id="myCarousel" class="carousel slide  carousel-fade " style="box-shadow:0px 0px 5px #000;" data-ride="carousel">
                   <div class="carousel-inner" >
                       <?php for($i = 0; $i < $img; $i++){ ?>
                           <div class="carousel-item <?= $i == 1 ? ' active' : ''; ?>">
                               <img src="<?php echo $images[$i];?>" height="250" class="d-block w-100" >
                           </div>
                       <?php } ?>
                   </div>
               </div>
               </div>
              <div class="col-sm">
                <div class="card-body text-left">
                <p class="card-title"><?php echo $row['service_Name'] ; ?></p>
                <span class="card-text"> <?php  echo mb_substr($row['service_Description'], 0, 100); ?>...</span>
                <br>
                <span >แก้ไขภาพService</span>
                <form action= "changeImgService.php" method="post" enctype="multipart/form-data">
                  <div class="form-row " style="box-shadow:0px 0px 0px ; padding:5px;">
                    <div class="col-12"  >
                       <input type="hidden" name="service_ID" value="<?php echo  $row["service_ID"]; ?>" >
                       <input type="hidden" name="service_Name" value="<?php echo  $row["service_Name"]; ?>" >
                      <input type="hidden" name="clinic_ID" value="<?php echo  $row["clinic_ID"]; ?>" >
                      <input type="file" name="service_Image[]" accept="image/*"  multiple>
                   </div>
                       <div class="col-sm">
                       <input class="btn btn-outline-primary  btn-sm "  style="margin-top: 5px;"  type="submit" value="แก้ไขภาพ" >
                     </div>
                     </div>
                     </form>
                  </div>
              </div>
          </div>
          <div class="card-footer text-right">
           <span class="text-muted" style="font-Size:20px;">
             <a  class="btn btn-primary" href="editeService.php?service_ID=<?php echo  $row["service_ID"]; ?>&clinic_ID=<?php echo   $row["clinic_ID"];?>&token=<?php echo md5( $row["clinic_ID"].'@Confirm'); ?>" role="button">แก้ไข</a>
             <a class="btn btn-danger" onclick="return confirm('confirm Delete ?')"  href="deleteService.php?service_ID=<?php echo  $row["service_ID"]; ?>&clinic_ID=<?php echo   $row["clinic_ID"];?>&token=<?php echo md5( $row["clinic_ID"].'@Confirm'); ?>" role="button">ลบ</a>
           </span>
           </div>
        </div>
      </div>
    </center>
    <br>


    <?php } ?>
</div>



<?php include("../footer.php"); ?>

</body>
</html>
