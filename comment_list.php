<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/webstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"  />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php
    include("connect/connect.php");
    session_start();
    $clinic_ID =$record["clinic_ID"];
    $select_comment = "SELECT * FROM comment WHERE  ref_clinic_ID = $clinic_ID   ORDER BY  comment_ID ASC ";
    $result_all_cc2 = mysqli_query($dbConnect, $select_comment);
    $i = 0;
    if(mysqli_affected_rows($dbConnect)==0){
      echo "<br><center><p>ไม่มีข้อมูล</p></center>";
    }
    while($row_all_cc = mysqli_fetch_array($result_all_cc2)){
      if ($row_all_cc["user_Status"] == "Member"){
        $member_ID =  $row_all_cc["user_ID"] ;
        $sql_mem = "SELECT * FROM member WHERE  member_ID = $member_ID ";
        $result_mem = mysqli_query($dbConnect, $sql_mem);
        $row_mem = mysqli_fetch_array($result_mem);
      }  else  if ($row_all_cc["user_Status"] == "Clinic"){
            $clinic_ID =  $row_all_cc["user_ID"] ;
            $sql_clinic = "SELECT * FROM clinic WHERE  clinic_ID = $clinic_ID ";
            $result_clinic = mysqli_query($dbConnect, $sql_clinic);
            $row_clinic = mysqli_fetch_array($result_clinic);
          }
    ?><br>
    <div class="card">
      <div class="card-header">
        ความเห็นที่
        <?php
      echo  $i +=1 ;
        // echo $row_all_cc["comment_ID"];
        ?>
    <?php   if ($row_all_cc["user_Status"] == "Member"){   echo " โดย สมาชิก ";  echo $row_mem["member_Name"]; echo "&nbsp;"; echo $row_mem["member_Surname"]; } ?>
      <?php   if ($row_all_cc["user_Status"] == "Clinic"){   echo " โดย คลินิก ";  echo $row_clinic["clinic_Name"]; } ?>
      </div>
      <div class="card-body">
          <p class="card-text"><?php echo $row_all_cc["comment_Details"] ?></p>
          <p class="card-text"><small class="text-muted">
            Update <?php echo $row_all_cc["comment_Date"] ?>
          </small></p>
      </div>
      <?php  if ($row_all_cc["user_Status"] == "Member"){ ?>
      <?php if ($_SESSION["member_ID"] == $row_mem["member_ID"] ) { ?>
      <div class="card-footer">
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          แก้ไขข้อความ
        </a>
        <a class="btn btn-danger"
        onclick="return confirm('confirm Delete ?')" href="comment_delete.php?clinic_ID=<?php echo $row_all_cc["ref_clinic_ID"]; ?>&comment_ID=<?php echo  $row_all_cc["comment_ID"]; ?> " role="button">
        ลบ</a>

        <div class="collapse" id="collapseExample">
          <br>
          <div class="card card-body text-left">
            <form class="" action="comment_update.php" method="post" enctype="multipart/form-data">
              <input type="text" name="ref_clinic_ID" value="<?php echo $row_all_cc["ref_clinic_ID"]; ?> " hidden>
              <input type="" name="comment_ID" value="<?php echo  $row_all_cc["comment_ID"]; ?>" hidden>
              <label for="">แก้ไขความคิดเห็นที่ <?php echo  $row_all_cc["comment_ID"]; ?> </label>
              <label for="">เวลา :</label>
              <input type="text"  class="border-0 " name="comment_Date" value="<?php echo date('Y-m-d H:i:s'); ?>  " readonly>
              <textarea name="comment_Details" rows="3" class="form-control" required><?php echo $row_all_cc["comment_Details"] ?></textarea>
              <br>
              <button type="submit" class="btn btn-primary">แสดงความคิดเห็น</button>
            </form>

          </div>
        </div>
      </div>
    <?php } } ?>


    </div>
    <?php }  ?>


  </body>
</html>
