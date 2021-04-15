<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Center</title>
    <link rel="icon" href="img/clinic.ico">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/webstyle.css">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJMyTKzqxEUXFGz9GinAs4yhv2Zz_C7OM&callback=initMap&libraries=&v=weekly"defer></script>
    <script type='text/javascript'>
    function check_char(elm){
    	if(elm.value.match(/^[0-9,a-z,!,@,#,$,%,^,&,*,?,_,~,-,+,.,/,(,),},{]+$/i) && elm.value.length>0){
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
    function check_num(num){
      if (num.value.match(/^[ก-ฮa-z]+$/i) || num.value.length !=11 )
       {
        alert('ใบอนุญาตให้ประกอบกิจการสถานพยาบาล 11 หลัก');
        num.value='';
      }

    }
    function myFunction() {
      var x = document.getElementById("clinic_Password");
      if (x.type == "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

</script>
</head>
<body class="Myfont">
    <?php include('navbar.php');
    session_start();
    $clinic_ID = $_REQUEST["clinic_ID"];
    if( empty($_GET['clinic_ID']) || ( $_GET['token'] != md5($_GET['clinic_ID'].'@Confirm') )){
     exit('รหัสไม่ถูกต้อง');
  } else {
  $query = "SELECT * FROM clinic WHERE clinic_ID = $clinic_ID";
  $result = mysqli_query($dbConnect, $query);
  $row = mysqli_fetch_array($result);

  if($_SESSION["loginStatus"]=="Clinic") {
  if($row['Status'] == '1' ){
    ?>
    <br>
 <p class="text-center Myfont" style="font-size:22px;" name="register">แก้ไขข้อมูลคลินิก</p>
 <div class="container col-lg-8 " style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
 <?php include('map.php');?> <br>
 <form action="updateClinic.php" method="post" enctype="multipart/form-data">
   <input type="text" name="clinic_ID" id="clinic_ID" hidden value="<?php echo $row['clinic_ID'] ; ?>">
   <input type="text" name="Status" id="Status" hidden value="0" >
 <div class="form-group">
 <span>Latitude</span>
 <input name="latitude" type="text" id="lat_value"class="w-25"  value="<?php echo $row['latitude'] ; ?>"  >
 <span>Longitude</span>
 <input name="longitude" type="text" id="lon_value" class=" w-25" value="<?php echo $row['longitude'] ; ?>"   >
</div>
 <div class="form-group">
 <label for="clinic_Name">ชื่อสถานประกอบการ</label>
 <input  name="clinic_Name" id="clinic_Name" type="text" class="form-control " value="<?php echo $row['clinic_Name'] ; ?>"   >
 </div>
 <div class="form-group">
 <label for="clinic_Detail">รายละเอียดคลินิก</label>
 <textarea name="clinic_Detail" rows="2" class="form-control ckeditor " id="clinic_Detail" ><?php echo $row['clinic_Detail'] ; ?></textarea>
 </div>
 <div class="form-group">
 <label for="clinic_NumAddress">บ้านเลขที่</label>
 <input type="text" class="form-control " name="clinic_NumAddress" id="clinic_City" value="<?php echo $row['clinic_NumAddress'] ; ?>" >
 </div>
 <div class="form-group">
 <label for="clinic_Address_GPS">ที่อยู่</label>
 <input type="text" class="form-control " name="clinic_Address_GPS" id="place_value" value="<?php echo $row['clinic_Address_GPS'] ; ?>" >
 <br>
 <label for="clinic_Address_Detil">รายละเอียดที่อยู่</label>
 <textarea name="clinic_Address_Detil" rows="2"   class="form-control " id="clinic_Address_Detil"
 placeholder="รายละเอียดเพิ่มเติม (สถานที่ใกล้เคียง,ถนน,แยก ,ซอย,หมู่บ้าน)" ><?php echo $row['clinic_Address_Detil'] ; ?></textarea>
</div>
 <div class="form-group">
 <label for="clinic_Phone">เบอร์โทร</label>
 <input type="tel" placeholder="08xxxxxxxx" class="form-control " name="clinic_Phone" id="clinic_Phone" onchange='check_phone(this)' value="<?php echo $row['clinic_Phone'] ; ?>"  >
 </div>
 <div class="form-group">
 <label for="clinic_NumberPermit">เลขที่ใบอนุญาต</label>
 <input type="text" class="form-control " name="clinic_NumberPermit" id="clinic_NumberPermit" value="<?php echo $row['clinic_NumberPermit'] ; ?>" >
 </div>
   <div class="form-group">
 <label for="clinic_Email">Email address</label>
 <input name="clinic_Email" id="clinic_Email" type="email" class="form-control " placeholder="example@beauty.com"  aria-describedby="emailHelp"  value="<?php echo $row['clinic_Email'] ; ?>" >
 <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
 </div>

 <button name="submit" type="submit" class="btn btn-primary">Submit</button>
 <button type="clear" class="btn btn-secondary">clear</button>
     </form>
</div>
    <!-- <br>
      <p class="text-center Myfont" style="font-size:22px;" name="register">แก้ไขรายละเอียดข้อมูลคลินิก</p>
      <div class="container col-lg-8" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
      <form action="updateClinic.php" method="post" enctype="multipart/form-data">
         <input type="text" name="clinic_ID" id="clinic_ID" hidden value="<?php echo $row['clinic_ID'] ; ?>">
         <input type="text" name="Status" id="Status" hidden value="<?php echo $row['Status'] ; ?>" >
        <div class="form-group">
        <label for="clinic_Detail">รายละเอียดคลินิก</label>
        <textarea name="clinic_Detail" rows="5" class="form-control ckeditor " id="clinic_Detail" ><?php echo $row['clinic_Detail'] ; ?></textarea>
        </div>
      <div class="form-group">
      <label for="clinic_Address_GPS">รายละเอียดที่อยู่คลินิก</label>
      <textarea name="clinic_Address_Detil" rows="2"  class="form-control " id="clinic_Address_Detil"
      placeholder="รายละเอียดเพิ่มเติม (สถานที่ใกล้เคียง,ถนน,แยก ,ซอย,หมู่บ้าน)"><?php echo $row['clinic_Address_Detil'] ; ?></textarea>
      </div>
      <div class="form-group">
      <label for="clinic_Phone">เบอร์โทร</label>
      <input type="tel" placeholder="08xxxxxxxx" class="form-control " name="clinic_Phone" id="clinic_Phone"required onchange='check_phone(this)' value="<?php echo $row['clinic_Phone'] ; ?>" >
      </div>

      <div class="form-group">
      <label for="clinic_Email">Email address</label>
      <input name="clinic_Email" id="clinic_Email" type="email" class="form-control " placeholder="example@beauty.com" value="<?php echo $row['clinic_Email'] ; ?>"   aria-describedby="emailHelp"  >
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      <button type="clear" class="btn btn-secondary">clear</button>
          </form>
    </div> -->
  <?php }else if($row['Status'] != '1' ){
       ?>
       <br>
    <p class="text-center Myfont" style="font-size:22px;" name="register">แก้ไขข้อมูลคลินิก</p>
    <div class="container col-lg-8 " style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
    <?php include('map.php');?> <br>
    <form action="updateClinic.php" method="post" enctype="multipart/form-data">
      <input type="text" name="clinic_ID" id="clinic_ID" hidden value="<?php echo $row['clinic_ID'] ; ?>">
      <input type="text" name="Status" id="Status" hidden value="<?php echo $row['Status'] ; ?>" >
    <div class="form-group">
    <span>Latitude</span>
    <input name="latitude" type="text" id="lat_value"class="w-25"  value="<?php echo $row['latitude'] ; ?>"  >
    <span>Longitude</span>
    <input name="longitude" type="text" id="lon_value" class=" w-25" value="<?php echo $row['longitude'] ; ?>"   >
  </div>
    <div class="form-group">
    <label for="clinic_Name">ชื่อสถานประกอบการ</label>
    <input  name="clinic_Name" id="clinic_Name" type="text" class="form-control " value="<?php echo $row['clinic_Name'] ; ?>"   >
    </div>
    <div class="form-group">
    <label for="clinic_Detail">รายละเอียดคลินิก</label>
    <textarea name="clinic_Detail" rows="2" class="form-control ckeditor " id="clinic_Detail" ><?php echo $row['clinic_Detail'] ; ?></textarea>
    </div>
    <div class="form-group">
    <label for="clinic_NumAddress">บ้านเลขที่</label>
    <input type="text" class="form-control " name="clinic_NumAddress" id="clinic_City" value="<?php echo $row['clinic_NumAddress'] ; ?>" >
    </div>
    <div class="form-group">
    <label for="clinic_Address_GPS">ที่อยู่</label>
    <input type="text" class="form-control " name="clinic_Address_GPS" id="place_value" value="<?php echo $row['clinic_Address_GPS'] ; ?>" >
    <br>
    <label for="clinic_Address_Detil">รายละเอียดที่อยู่</label>
    <textarea name="clinic_Address_Detil" rows="2"   class="form-control " id="clinic_Address_Detil"
    placeholder="รายละเอียดเพิ่มเติม (สถานที่ใกล้เคียง,ถนน,แยก ,ซอย,หมู่บ้าน)" ><?php echo $row['clinic_Address_Detil'] ; ?></textarea>
  </div>
    <div class="form-group">
    <label for="clinic_Phone">เบอร์โทร</label>
    <input type="tel" placeholder="08xxxxxxxx" class="form-control " name="clinic_Phone" id="clinic_Phone" onchange='check_phone(this)' value="<?php echo $row['clinic_Phone'] ; ?>"  >
    </div>
    <div class="form-group">
    <label for="clinic_NumberPermit">เลขที่ใบอนุญาต</label>
    <input type="text" class="form-control " name="clinic_NumberPermit" id="clinic_NumberPermit" value="<?php echo $row['clinic_NumberPermit'] ; ?>" >
    </div>
      <div class="form-group">
    <label for="clinic_Email">Email address</label>
    <input name="clinic_Email" id="clinic_Email" type="email" class="form-control " placeholder="example@beauty.com"  aria-describedby="emailHelp"  value="<?php echo $row['clinic_Email'] ; ?>" >
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    <button type="clear" class="btn btn-secondary">clear</button>
        </form>
  </div>
<?php }}else if($_SESSION["loginStatus"]=="Admin") {?>
  <br>
  <p class="text-center Myfont" style="font-size:22px;" name="register">แก้ไขข้อมูลคลินิก</p>
  <div class="container col-lg-8" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
  <?php include('map.php');?> <br>
  <form action="updateClinic.php" method="post" enctype="multipart/form-data">
    <input type="text" name="clinic_ID" id="clinic_ID" hidden value="<?php echo $row['clinic_ID'] ; ?>">
    <input type="text" name="Status" id="Status" hidden value="<?php echo $row['Status'] ; ?>" >
  <div class="form-group">
  <span>Latitude</span>
  <input name="latitude" type="text" id="lat_value"class="w-25"  value="<?php echo $row['latitude'] ; ?>"  >
  <span>Longitude</span>
  <input name="longitude" type="text" id="lon_value" class=" w-25" value="<?php echo $row['longitude'] ; ?>"   >
</div>
  <div class="form-group">
  <label for="clinic_Name">ชื่อสถานประกอบการ</label>
  <input  name="clinic_Name" id="clinic_Name" type="text" class="form-control " value="<?php echo $row['clinic_Name'] ; ?>"   >
  </div>
  <div class="form-group">
  <label for="clinic_Detail">รายละเอียดคลินิก</label>
  <textarea name="clinic_Detail" rows="2" class="form-control ckeditor " id="clinic_Detail" ><?php echo $row['clinic_Detail'] ; ?></textarea>
  </div>
  <div class="form-group">
  <label for="clinic_NumAddress">บ้านเลขที่</label>
  <input type="text" class="form-control " name="clinic_NumAddress" id="clinic_City" value="<?php echo $row['clinic_NumAddress'] ; ?>" >
  </div>
  <div class="form-group">
  <label for="clinic_Address_GPS">ที่อยู่</label>
  <input type="text" class="form-control " name="clinic_Address_GPS" id="place_value" value="<?php echo $row['clinic_Address_GPS'] ; ?>" >
  <br>
  <label for="clinic_Address_Detil">รายละเอียดที่อยู่</label>
  <textarea name="clinic_Address_Detil" rows="2"   class="form-control " id="clinic_Address_Detil"
  placeholder="รายละเอียดเพิ่มเติม (สถานที่ใกล้เคียง,ถนน,แยก ,ซอย,หมู่บ้าน)" ><?php echo $row['clinic_Address_Detil'] ; ?></textarea>
</div>
  <div class="form-group">
  <label for="clinic_Phone">เบอร์โทร</label>
  <input type="tel" placeholder="08xxxxxxxx" class="form-control " name="clinic_Phone" id="clinic_Phone" onchange='check_phone(this)' value="<?php echo $row['clinic_Phone'] ; ?>"  >
  </div>
  <div class="form-group">
  <label for="clinic_NumberPermit">เลขที่ใบอนุญาต</label>
  <input type="text" class="form-control " name="clinic_NumberPermit" id="clinic_NumberPermit" onchange='check_num(this)' value="<?php echo $row['clinic_NumberPermit'] ; ?>" >
  </div>
    <div class="form-group">
  <label for="clinic_Email">Email address</label>
  <input name="clinic_Email" id="clinic_Email" type="email" class="form-control " placeholder="example@beauty.com"  aria-describedby="emailHelp"  value="<?php echo $row['clinic_Email'] ; ?>" >
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
  <button type="clear" class="btn btn-secondary">clear</button>
      </form>
</div>
<?php } ?>

<?php } ?>
<br><br><br>
<?php include("../footer.php") ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
</body>
</html>
