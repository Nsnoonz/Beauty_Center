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
    ?>
    <div class="container" style="box-shadow: 0px 0px 3px #000; min-height: 1000px;">
      <center><br>
        <div class="col-10" style="box-shadow: 0px 0px 1px #000; padding:20px; border-radius:10px;">
          <!-- Nav tabs -->
          <ul class="nav nav-pills nav-justified " id="pills-tab" role="tablist">
          <li class="nav-item">
          <a class="nav-link active" id="pills-payment-tab" data-toggle="pill" href="#pills-payment" role="tab" aria-controls="pills-payment" aria-selected="true">แจ้งการชำระค่าบริการ</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" id="pills-wait-tab" data-toggle="pill" href="#pills-wait" role="tab" aria-controls="pills-wait" aria-selected="false">คลินิกใหม่รอการอนุมัติ  <span class="badge badge-light">
            <?php   $sql_wait = "SELECT * FROM clinic WHERE Status = 0";
            $result_wait = mysqli_query($dbConnect, $sql_wait);
            $num_wait = mysqli_num_rows($result_wait); echo $num_wait; ?></span></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" id="pills-receipt-tab" data-toggle="pill" href="#pills-receipt" role="tab" aria-controls="pills-receipt" aria-selected="false">รายการที่ยืนชำระแล้ว</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" id="pills-baned-tab" data-toggle="pill" href="#pills-baned" role="tab" aria-controls="pills-baned" aria-selected="false">คลินิกที่ถูกระงับ(ค้างชำระ)</a>
          </li>
          </ul>
          <hr>
          <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
            <?php
            $sql_payment = "SELECT * FROM payment,clinic WHERE payment.clinic_ID = clinic.clinic_ID and payment.payment_Status = 0 ORDER BY payment.payment_Date ";
            $result_payment = mysqli_query($dbConnect, $sql_payment);
              if(mysqli_affected_rows($dbConnect)==0){
                echo "<center>ไม่มีข้อมูล<center>";
              }
            ?>
            <table class="" >
            <?php while($row_payment = mysqli_fetch_array($result_payment)){  ?>
              <form class=""  action="confirmPayment.php" method="post">
              <tr>
                <td>Payment ID : <?php echo $row_payment['payment_ID']; ?> </td><td>&nbsp;</td>
                <td>ชื่อบัญชีผู้ชำระเงิน : <?php echo $row_payment['payment_Name']; ?> </td><td>&nbsp;</td>
                <td>เวลาที่แจ้ง : <?php echo $row_payment['payment_Time']; echo "&nbsp;"; echo $row_payment['payment_Date'];?> </td></td><td>&nbsp;</td>
                <td> <a href="../clinic/payment/<?php echo $row_payment['payment_Receipt']; ?>" target="_blank" >ดูรูปภาพ</a> </td></td><td>&nbsp;</td>
                <td><input type="text" name="payment_ID" value="<?php echo $row_payment['payment_ID']; ?>" hidden> </td>
                <td><input type="text" name="clinic_ID" value="<?php echo $row_payment['clinic_ID']; ?>" hidden> </td>
                <td><input type="text" name="clinic_Views" value="<?php echo $row_payment['clinic_Views']; ?>" hidden> </td>
                <!-- <td><input type="text" class="w-25"name="Status_Note"  value="" required></td> -->
                <td><button class=" btn btn-primary" name="payment_Status"onclick="return confirm('คุณต้องการอนุมัติ ?')"  value="1" >อนุมัติ</button> </td>
                <!-- <td><button class=" btn btn-danger" name="payment_Status" onclick="return confirm('คุณไม่ต้องการอนุมัติ ?')" value="2">ไม่อนุมัติ</button> </td> -->
              </tr>
              </form>
            <?php } ?>
            </table>
          </div>
          <div class="tab-pane fade" id="pills-wait" role="tabpanel" aria-labelledby="pills-wait-tab">
            <?php
              $sql_wait = "SELECT * FROM clinic WHERE Status = 0";
              $result_wait = mysqli_query($dbConnect, $sql_wait);
              $num_wait = mysqli_num_rows($result_wait);
              if(mysqli_affected_rows($dbConnect)==0){
                echo "<center>ไม่มีข้อมูล<center>";
              }
              ?>
              <div class="col-9">
              <div class="table-responsive ">
              <table class="table table-sm  table-borderless text-left" >
              <?php while($row_wait = mysqli_fetch_array($result_wait)){  ?>
                <tr>
                  <td>
                    <a href="ReadClinic.php?clinic_ID=<?php echo  $row_wait["clinic_ID"]; ?>&token=<?php echo md5( $row_wait["clinic_ID"].'@Confirm'); ?>" role="button">
                      <?php echo $row_wait['clinic_Name'] ?>
                    </a>
                    </td>
                </tr>
              <?php } ?>
              </table>
              </div>
              </div>
          </div>
          <div class="tab-pane fade" id="pills-receipt" role="tabpanel" aria-labelledby="pills-receipt-tab">
            <?php
            $sql_receipt = "SELECT * FROM payment,clinic WHERE payment.clinic_ID = clinic.clinic_ID and payment.payment_Status = 1 ORDER BY payment.payment_ID DESC";
            $result_receipt = mysqli_query($dbConnect, $sql_receipt);
            if(mysqli_affected_rows($dbConnect)==0){
              echo "<center>ไม่มีข้อมูล<center>";
            }
               ?>
               <table class="" >
               <?php while($row_receipt = mysqli_fetch_array($result_receipt)){  ?>
                 <tr>
                   <td>Payment #<?php echo $row_receipt['payment_ID']; ?> </td><td>&nbsp;</td>
                   <td>
                     <a href="ReadClinic.php?clinic_ID=<?php echo  $row_receipt["clinic_ID"]; ?>&token=<?php echo md5( $row_receipt["clinic_ID"].'@Confirm'); ?>" role="button">
                       <?php echo $row_receipt['clinic_Name'] ?>
                     </a>
                     </td>
                   <td>ชื่อบัญชีผู้ชำระเงิน : <?php echo $row_receipt['payment_Name']; ?> </td><td>&nbsp;</td>
                   <td>เวลาที่แจ้ง : <?php echo $row_receipt['payment_Time']; echo "&nbsp;"; echo $row_receipt['payment_Date'];?> </td>
                   <td> <a href="../clinic/payment/<?php echo $row_receipt['payment_Receipt']; ?>" target="_blank" >ดูรูปภาพ</a> </td>

                 </tr>
               <?php } ?>
               </table>



          </div>
          <div class="tab-pane fade" id="pills-baned" role="tabpanel" aria-labelledby="pills-baned-tab">
            <?php
              $sql_baned = "SELECT * FROM clinic WHERE Status = 3";
              $result_baned = mysqli_query($dbConnect, $sql_baned);
              if(mysqli_affected_rows($dbConnect)==0){
                echo "<center>ไม่มีข้อมูล<center>";
              }
              ?>
              <table class="" >
              <?php while($row_baned = mysqli_fetch_array($result_baned)){  ?>
                <tr>
                  <td>
                    <a href="ReadClinic.php?clinic_ID=<?php echo  $row_baned["clinic_ID"]; ?>&token=<?php echo md5( $row_baned["clinic_ID"].'@Confirm'); ?>" role="button">
                      <?php echo $row_baned['clinic_Name'] ?>
                    </a>
                    </td>
                </tr>
              <?php } ?>
              </table>

          </div>
          </div>

        </div>
        </center>
    </div>
    <?php include("../footer.php"); ?>
    </body>
  </html>
