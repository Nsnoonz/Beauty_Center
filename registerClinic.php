<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beauty Center</title>
    <link rel="icon" href="img/clinic.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/webstyle.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
        alert('กรุณากรอกเลขที่ใบอนุญาต 11 หลัก');
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
    <?php include('navbar.php');?>
    <br>
    <p class="text-center" style="font-size:22px;" name="register">ลงทะเบียนสมัครสมาชิก ผู้ประกอบการ</p>
    <div class="container col-lg-8" style="box-shadow:0px 0px 2px #000; padding:15px; background-color: #FFF;">
        <?php include('map.php');?> <br>

    <form action="clinic/Addclinic.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
    <span>Latitude</span>
    <input name="latitude" type="text" id="lat_value"class="w-25"  value="0" >
    <span>Longitude</span>
    <input name="longitude" type="text" id="lon_value" class=" w-25" value="0" >
  </div>
    <div class="form-group">
    <label for="clinic_Name">ชื่อสถานประกอบการ</label>
    <input  name="clinic_Name" id="clinic_Name" type="text" class="form-control "  required >
    </div>
    <div class="form-group">
    <label for="clinic_Detail">รายละเอียดคลินิก</label>
    <textarea name="clinic_Detail" rows="2" class="form-control ckeditor " id="clinic_Detail" ><?php echo $row['clinic_Detail'] ; ?></textarea>
    </div>

    <div class="form-group">
    <label for="clinic_NumAddress">บ้านเลขที่</label>
    <input type="text" class="form-control " name="clinic_NumAddress" id="clinic_City"required >
    </div>
    <div class="form-group">
    <label for="clinic_Address_GPS">ที่อยู่</label>
    <input type="text" class="form-control " name="clinic_Address_GPS" id="place_value" >
    <br>
    <textarea name="clinic_Address_Detil" rows="2"  class="form-control " id="clinic_Address_Detil"
    placeholder="รายละเอียดเพิ่มเติม (สถานที่ใกล้เคียง,ถนน,แยก ,ซอย,หมู่บ้าน)" ></textarea>
  </div>

    <div class="form-group">
    <label for="clinic_Image">ภาพสถานที่</label>
     <input type="file" name="clinic_Image[]" id="clinic_Image" accept="image/*" multiple>
    </div>
    <div class="form-group">
    <label for="clinic_Phone">เบอร์โทร</label>
    <input type="tel" placeholder="08xxxxxxxx" class="form-control " name="clinic_Phone" id="clinic_Phone"required onchange='check_phone(this)' >
    </div>
    <div class="form-group">
    <label for="clinic_NumberPermit">เลขที่ใบอนุญาต</label>
    <input type="text" class="form-control " name="clinic_NumberPermit" id="clinic_NumberPermit"  onchange='check_num(this)'  required >
    </div>
    <div class="form-group">
    <label for="clinic_ImagePermit">ใบอนุญาตให้ประกอบกิจการสถานพยาบาล</label>
    <input type="file" accept="image/*" class="form-control-file" name="clinic_ImagePermit"  id="clinic_ImagePermit"required >
    </div>

    <div class="form-group">
    <label for="clinic_Email">Email address</label>
    <input name="clinic_Email" id="clinic_Email" type="email" class="form-control " placeholder="example@beauty.com"  aria-describedby="emailHelp" required >
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
    <label for="clinic_Password">Password</label>
    <input name="clinic_Password" id="clinic_Password" type="password" class="form-control"  required >
    <input type="checkbox" onclick="myFunction()"> Show Password
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    <button type="clear" class="btn btn-secondary">clear</button>
        </form>
  </div>
  <div style="height:200px;"> </div>
<?php include("footer.php") ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
</body>
</html>
