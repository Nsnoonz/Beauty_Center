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
    $query1 = "SELECT * FROM clinic,payment WHERE clinic.clinic_ID = $clinic_ID
    and payment.clinic_ID = clinic.clinic_ID  ORDER BY payment.payment_ID DESC";
    $result1 = mysqli_query($dbConnect, $query1);
    $num = mysqli_num_rows($result1);
    if( empty($_GET['clinic_ID']) || ( $_GET['token'] != md5($_GET['clinic_ID'].'@Confirm') ))
    {
      exit('<center><br>รหัสไม่ถูกต้อง</center>');
    }
    ?>
    <div class="container" style="box-shadow: 0px 0px 3px #000;min-height:1000px;">
      <center>
        <div class="col-sm-12"><br><br>
          <p class="" style="font-size:20px;">ประวัติการแจ้งชำระเงิน</p>
          <hr>
          <p class="">ทั้งหมดจำนวน <?php echo $num; ?> รายการ</p>
          <div class="table-responsive">
          <table class="table table-borderless" >
          <?php while($row1 = mysqli_fetch_array($result1)){  ?>
            <tr>
              <td>#<?php echo $row1['payment_ID']; ?> </td><td>&nbsp;</td>
              <!-- <td>
                <a href="ReadClinic.php?clinic_ID=<?php echo  $row1["clinic_ID"]; ?>&token=<?php echo md5( $row1["clinic_ID"].'@Confirm'); ?>" role="button">
                  <?php echo $row1['clinic_Name'] ?>
                </a>
                </td> -->
              <td>ชื่อบัญชีผู้ชำระเงิน : <?php echo $row1['payment_Name']; ?> </td><td>&nbsp;</td>
              <td>เวลาที่แจ้ง : <?php echo $row1['payment_Time']; echo "&nbsp;"; echo $row1['payment_Date'];?> </td>
              <td>&nbsp; <a href="../clinic/payment/<?php echo $row1['payment_Receipt']; ?>" target="_blank" >ดูรูปภาพ</a> </td>
              <td>
                <?php
                 if ($row1['payment_Status'] == 0) {
                   echo "ยังไม่ได้รับการอนุมัติ";
                }
                elseif($row1['payment_Status'] == 1){
                   echo "ได้รับการอนุมัติ";
                }
                ?>
            </td>
            </tr>
          <?php } ?>
          </table>
        </div>

        </div>
      </center>


    </div>
    <?php include("../footer.php"); ?>
    </body>
  </html>
