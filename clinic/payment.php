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
    $clinic_ID = $_SESSION['clinic_ID'];
    $query1 = "SELECT * FROM clinic,payment WHERE clinic.clinic_ID = $clinic_ID and payment.clinic_ID = clinic.clinic_ID";
    $result1 = mysqli_query($dbConnect, $query1);
    $row1 = mysqli_fetch_array($result1);
    $num = mysqli_num_rows($result1);
    ?>
    <div class="container" style="box-shadow: 0px 0px 3px #000;min-height:1000px;">
        <br>

      <center>
        <div class="col-9">
        <div class="text-right">
          <a  class="btn btn-primary" role="button" href="#payment">
          แจ้งการชำระเงิน <span class="badge badge-light"></span>
          </a>
          <a  class="btn btn-secondary" role="button" href="paymentDetail.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION['clinic_ID'].'@Confirm'); ?>" role="button">
          ประวัติการแจ้งชำระเงิน <span class="badge badge-light"><?php echo$num;?></span>
          </a>
        </div>

        <div class="text-left">
        <span style="font-size:20px;">ช่องทางการชำระเงิน</span>
        </div>
        <hr>
        <div class="card mb-3 bg-light" ><br>
        <img src="../img/clinic2.png" class="card-img mx-auto d-block" alt="..." style="width:250px">
        <div class="card-body " style="font-size:16px;">
          <span  class="card-text"> ชำระค่าบริการ ราคา 200 THB / ยอดเข้าชมคลินิก 2000 ครั้ง</span> <br>
          <!-- <span  class="card-text">**เพื่อยกเลิกการระงับบริการ</span><br> -->
          <span  class="card-text"> โดยสามารถเลือกช่องทางชำระเงินได้ดังต่อไปนี้</span><hr>
                  <div class="card mb-3 border-0">
                    <div class="row ">
                      <div class="col-md-6  bg-light">
                            <img src="../img/payment2.JPG" class="card-img " alt="..." style="">
                      </div>
                      <div class="col-md-6  ">
                        <div class="card-body ">
                          <img src="../img/scb2.png" class="card-img " style="" alt="..." style=""> <br><br>
                          <span class="card-text" style="font-size:18px;">ธนาคารไทยพาณิชย์ จำกัด (มหาชน)
                            <br>สาขา 5251 ท่าขอนยาง <br> (มหาวิทยาลัยมหาสารคาม)
                            <br>น.ส. สุภาวดี จันทร์โม้  <br>เลขที่บัญชี 409-358239-0 <br> บัญชีเงินฝากออมทรัพย์ </span>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
      </div>
      <br>
      <div class="text-left" id="payment">
        <p style="font-size:18px;">แจ้งการชำระเงิน</p>
        <hr>
        <form enctype="multipart/form-data" action="add_payment.php" method="post">
          <input type="text" name="clinic_ID" value="<?php echo $_SESSION['clinic_ID'] ;?>" hidden>
          <input type="text" name="clinic_Name" value="<?php echo $row1['clinic_Name']; ?>" hidden>
          <div class="form-group">
            <label for="">ชื่อบัญชีผู้ชำระเงิน</label>
            <input name="payment_Name" class="form-control w-50 "  type="text" placeholder="ชื่อ-สกุล หรือ ชื่อบัญชี" required  >
          </div>
            <p>เวลาที่แจ้งโอน</p>
            <div class="row">
              <div class="col">
                <input type="text" name="payment_Date" class="form-control  " value="<?php echo date('Y-m-d'); ?>" readonly >
              </div>
              <div class="col">
                <input type="text" name="payment_Time" class="form-control  " value="<?php echo date("H:i:s"); ?>" readonly  >
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="">สลิปการโอนเงิน</label>
              <input name="payment_Receipt" type="file"accept="image/*" >
            </div>
            <div class="form-group">
              <label for="">หมายเหตุ</label>
              <textarea name="payment_Note" class="form-control " rows="8" cols="80" placeholder="** สามารถระบุรายละเอียดเพิ่มเติม "></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      </div>
    </center>


    <div style="height:200px">    </div>

    </div>
    <?php include("../footer.php"); ?>
    </body>
  </html>
