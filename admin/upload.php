<?php
error_reporting( error_reporting() & ~E_NOTICE );
$clinic_ID = $_REQUEST["clinic_ID"];
if( empty($_GET['clinic_ID']) || ( $_GET['token'] != md5($_GET['clinic_ID'].'@Confirm') )){
 exit('รหัสไม่ถูกต้อง');
} else {
$sql = "SELECT * FROM clinic WHERE clinic_ID = $clinic_ID";
$result = mysqli_query($dbConnect, $sql);
 while($row = mysqli_fetch_assoc($result)){
  $temp = array();
  $row['clinic_Image']=trim($row['clinic_Image'], '/,');
  $temp   = explode(',', $row['clinic_Image']);
  $temp   = array_filter($temp);
  $images = array();
  foreach($temp as $image){
  $images[]="../clinic/img".$temp['clinic_Image']."/".trim( str_replace(array('[',']') ,"" ,$image ) );
  $img = count($images);
}
?>
<div id="myCarousel" class="carousel slide  carousel-fade " style="box-shadow:0px 0px 5px #000;" data-ride="carousel">
    <div class="carousel-inner" >
        <?php for($i = 0; $i < $img; $i++){ ?>
            <div class="carousel-item <?= $i == 1 ? ' active' : ''; ?>">
                <img src="<?php echo $images[$i];?>"  class="d-block w-100" style="height:400px;">
            </div>
        <?php } ?>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
</div>
<?php } } ?>
