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
    <link rel="stylesheet"href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </head>
    <?php
    $serviceType_ID = $_REQUEST["serviceType_ID"];
    include('navbar.php');
    include('nav.php');
    $sql4="SELECT MIN(service_Price) AS MinPrice FROM service";
    $result4=mysqli_query($dbConnect,$sql4);
    $record4=mysqli_fetch_array($result4);
    $sql2="SELECT MAX(service_Price) AS MaxPrice FROM service";
    $result2=mysqli_query($dbConnect,$sql2);
    $record2=mysqli_fetch_array($result2);
    $min = $record4['MinPrice'] ;
    $max =  $record2['MaxPrice'] ;
    if (! empty($_POST['min_price'])) {
        $min = $_POST['min_price'];
    }
    if (! empty($_POST['max_price'])) {
        $max = $_POST['max_price'];
    }
?>
<script type="text/javascript">
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max:  50000,
      values: [ <?php echo $min; ?>, <?php echo $max; ?> ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#min" ).val(ui.values[ 0 ]);
		$( "#max" ).val(ui.values[ 1 ]);
      }
      });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>
    <body class="Myfont">
        <div class="container  Myfont border-top" >
          <br>
          <center>
            <form method="post" action="#result">
            <div class="col-sm bg-light bg-gradient" style="box-shadow:0px 0px 3px; padding:15px; border-radius:5px;">
              <div class="row">
              <div class="col" style="padding:5px;">
                <label class="form-control-plaintext">MIN</label>
              </div>
              <div class="col-sm" style="padding:5px;">
                <input id="min" class="form-control" name="min_price" value="<?php echo $min; ?>">
              </div>
              <div class="col-sm-4" style="margin-top:15px;">
                <div  id="slider-range"></div>
              </div>
              <div class="col" style="padding:5px;">
                <label class="form-control-plaintext">MAX</label>
              </div>
              <div class="col-sm" style="padding:5px;">
                <input id="max" class="form-control" name="max_price" value="<?php echo $max; ?>">
              </div>
              <div class="col" style="padding:5px;">
                <label class="form-control-plaintext">Order By </label>
              </div>
              <div class="col-sm" style="margin:5px;">
                <select class="form-select form-select-lg" name="order" style="padding: 5px;">
                <option selected value="ASC" >---</option>
                <option value="ASC">ต่ำ ไป สูง</option>
                <option value="DESC">สูง ไป ต่ำ</option>
              </select>
              </div>
              <div class="col-sm-2" style="padding:5px;">
                <input type="submit" name="submit_range"  value="Filter Product" class="btn btn-secondary">
              </div>
            </div>
            </div>
            <br>
          </form>
          </center>

      <?php
       $order = $_POST['order'];
        $sql3 = "SELECT * FROM clinic,service,servicetype WHERE (service_Price BETWEEN $min AND $max) AND clinic.clinic_ID=service.clinic_ID and clinic.Status= 1 and servicetype.serviceType_ID=service.serviceType_ID and servicetype.serviceType_ID  =$serviceType_ID ORDER By service.service_Price $order";
        $result3=mysqli_query($dbConnect,$sql3);
        $count3 = mysqli_num_rows($result3);
        if ($count3 == 0) {
          echo "<center>ไม่พบข้อมูล</center>";
         } ?>
        <center>
        <div class="col-10 ">
          <?php
            while($record = mysqli_fetch_assoc($result3)){
            $temp = array();
            $record['service_Image']=trim($record['service_Image'], '/,');
            $temp   = explode(',', $record['service_Image']);
            $temp   = array_filter($temp);
            $images = array();
            foreach($temp as $image){
            $images[]="clinic/service".$temp['service_Image']."/".trim( str_replace(array('[',']') ,"" ,$image ) );
            $img = count($images); }
            ?>
        <div class="card" id="result">
          <div class="card-header font-weight-bold">
            <?php echo $record['service_Name'] ; ?> By <a href="ReadClinic.php?clinic_ID=<?php echo  $record["clinic_ID"]; ?>&token=<?php echo md5( $record["clinic_ID"].'@Confirm'); ?> " role="button"><?php echo $record['clinic_Name'] ; ?></a>
          </div>
          <div class="row no-gutters">
            <div class="col-md-6">

              <div id="myCarousel" class="carousel slide  carousel-fade " style="box-shadow:0px 0px 0px #000;" data-ride="carousel">
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
                <p class="card-text"> <?php echo mb_substr($record['service_Description'], 0, 100);  ?>
                  <a href="ReadService.php?service_ID=<?php echo  $record["service_ID"]; ?>&clinic_ID=<?php echo   $record["clinic_ID"];?>&token=<?php echo md5( $record["clinic_ID"].'@Confirm'); ?>" role="button">  อ่านเพิ่ม ..</a>
  </p>
                <p class="card-text"> ราคา <?php echo $record['service_Price']; ?> บาท</p>
                <p class="card-text"> ประเภท <?php echo $record['serviceType_Name']; ?></p>
                <?php if($_SESSION["loginStatus"]==""){?>
                  <p class="text-danger"> กรุณาเข้าสู่ระบบเพื่อทำการจอง <a href="login.php">คลิก</a> </p>
                <?php } elseif($_SESSION["loginStatus"]=="Member"){ ?>
                  <a href="ReadClinic.php?clinic_ID=<?php echo  $record["clinic_ID"]; ?>&token=<?php echo md5( $record["clinic_ID"].'@Confirm'); ?> " role="button">
                  <button type="button" name="button" class="btn btn-primary ">
                    <a class="text-light" href="booking.php?service_ID=<?php echo  $record["service_ID"]; ?>&member_ID=<?php echo $_SESSION["member_ID"] ?>&token=<?php echo md5( $_SESSION["member_ID"].'@Confirm'); ?>">
                      จองเลย
                    </a>
                  </button>
                <!-- <form action="booking.php" method="post" enctype="multipart/form-data">
                  <div class="form-row ">
                    <div class="col-12"  >
                      <input type="hidden" name="service_ID" value="<?php echo  $record["service_ID"]; ?>" >
                      <input type="hidden" name="member_ID" value="<?php echo $_SESSION["member_ID"] ?>" >
                   </div>
                       <div class="col-sm">
                       <input class="btn btn-outline-success "  style="margin-top: 5px; font-size:18px;"  type="submit" value="จองเลย !" >
                     </div>
                     </div>
                     </form> -->
                   <?php } ?>

              </div>
            </div>
           </div>
         </div>
         <br>
         <?php } ?>
       </div>
     </center>
     <div style="height:200px;">     </div>
     </div>

          <?php include("footer.php") ?>
  </body>
</html>
