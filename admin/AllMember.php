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
    $sql = "SELECT * FROM member ";
    $result = mysqli_query($dbConnect, $sql);
    ?>
    <div class="container" style="box-shadow: 0px 0px 3px #000; min-height: 1000px;">
      <br>
      <p class="text-center"style="font-size:20px;">สมาชิกทั้งหมด &nbsp;<?php echo mysqli_num_rows($result); ?> &nbsp; คน</p>
      <p  class="text-center" style="font-size:20px;"><a href="../registerMember.php">+เพิ่มสมาชิก</a></p>

      <center>
        <div class="col-sm-8">
        <div class="table-responsive " style="font-size:18px;">
          <table class=" table table-sm text-left" >
            <?php

            if(mysqli_affected_rows($dbConnect)==0)
            {
                echo "ไม่มีข้อมูลสมาชิก";
              } else while($row = mysqli_fetch_array($result)){ ?>
              <tr>
                <td class="text-left">
                <a href="../member/profileMember.php?member_ID=<?php echo $row['member_ID'] ;  ?>&token=<?php echo md5( $row["member_ID"].'@Confirm'); ?>">
                  <?php echo $row['member_Name']; ?> <?php echo $row['member_Surname']; ?>
                </a>
                </td>
                <td class="text-center"><a href="../member/editeMember.php?member_ID=<?php echo  $row["member_ID"]; ?>&token=<?php echo md5( $row["member_ID"].'@Confirm'); ?>" role="button">แก้ไข</a></td>
                <td class="text-center"><a onclick="return confirm('confirm Delete ?')" href="../member/deleteMember.php?member_ID=<?php echo  $row["member_ID"]; ?>&token=<?php echo md5( $row["member_ID"].'@Confirm'); ?>" role="button">ลบ</a></td>
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
