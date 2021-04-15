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
  </head>
  <body class="Myfont">
  <?php include('navbar.php');
    include('nav.php');
    $sql_count = "SELECT * FROM clinic ";
    $result_count= mysqli_query($dbConnect, $sql_count);
?>
    <div class="container  Myfont border-top" style="min-height:1000px;">
      <br>
        <p class="text-center"style="font-size:20px;">คลินิกทั้งหมด
        <?php  if ($_SESSION["loginStatus"]=="Admin"){
        echo "&nbsp;";  echo mysqli_num_rows($result_count); echo "&nbsp;คลินิก";
        } ?>
        </p>
            <?php if (($_SESSION["loginStatus"]=="Member") || ($_SESSION["loginStatus"]=="")) {?>
              <div class="col-12">
                <div class="table-responsive ">
               <table class=" table table-sm text-left table-hover " style="font-size:18px;">
              <?php
              $sql = "SELECT * FROM `clinic` WHERE `Status` = 1";
              $result = mysqli_query($dbConnect, $sql);
              if(mysqli_affected_rows($dbConnect)==0){
                echo "ไม่มีข้อมูลคลินิก";
              }else while($row = mysqli_fetch_array($result)){
                $temp = array();
                $row['clinic_Image']=trim($row['clinic_Image'], '/,');
                $temp   = explode(',', $row['clinic_Image']);
                $temp   = array_filter($temp);
                $images = array();
                foreach($temp as $image){
                $images[]="clinic/img".$temp['clinic_Image']."/".trim( str_replace(array('[',']') ,"" ,$image ) );
                $img = count($images);}?>
                <br>
                <div class="card">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <?php for($i = 0; $i < $img; $i++){ ?>
                            <div class="carousel-item <?= $i === 1 ? ' active' : ''; ?>">
                                <img src="<?php echo $images[$i];?>" height="250" class="d-block w-100" />
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body text-left">
                    <h5 class="card-title"><a href="ReadClinic.php?clinic_ID=<?php echo  $row["clinic_ID"]; ?>&token=<?php echo md5( $row["clinic_ID"].'@Confirm'); ?> " role="button"><?php echo $row['clinic_Name'] ; ?></a></h5>
                      <p class="card-text"> <?php echo $row['clinic_NumAddress']; echo $row['clinic_Address_GPS'] ; ?> <br><?php  echo $row['clinic_Address_Detil'] ;?></p>
                    </div>
                  </div>
                  </div>
                  </div>

              <?php
              }
              ?>
            </table>
            </div>
            </div>



            <?php }else if ($_SESSION["loginStatus"]=="Admin")  { ?>
              <center>
              <div class="col-8">
                <div class="table-responsive ">
               <table class=" table table-sm text-left " style="font-size:18px;">
              <tr class="table-borderless">
                <td> <a class="text-left" style="font-size:20px;" href="registerClinic.php">+เพิ่มคลินิก</a></td>
              </tr>
              <?php
                $sql = "SELECT * FROM `clinic` WHERE `Status` = 0";
                $result = mysqli_query($dbConnect, $sql);

                ?>
                <tr class="table-borderless"><td> <br> </td></tr>
                  <tr class="table-borderless text-warning"><td>คลินิกที่รอการอนุมัติ</td></tr>
                <?php
                if(mysqli_num_rows($result)==0){?>
            <tr class="table-borderless "><td>-</td></tr>
              <?php  }
                 while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                  <td>
                  <a href="admin/ReadClinic.php?clinic_ID=<?php echo  $row["clinic_ID"]; ?>&token=<?php echo md5( $row["clinic_ID"].'@Confirm'); ?>" role="button"> <?php echo $row['clinic_Name'] ?>
                  </a>
                </td>
                  <td class="text-center"><a href="clinic/editeClinic.php?clinic_ID=<?php echo  $row["clinic_ID"]; ?>&token=<?php echo md5( $row["clinic_ID"].'@Confirm'); ?>" role="button">แก้ไข</a></td>
                  <td class="text-center"><a onclick="return confirm('confirm Delete ?')" href="clinic/deleteClinic.php?clinic_ID=<?php echo  $row["clinic_ID"]; ?>&token=<?php echo md5( $row["clinic_ID"].'@Confirm'); ?>" role="button">ลบ</a></td>
                  <?php if ($row['Status_Note']!=''){?>
                    <tr class="table-borderless">
                   <td Style="font-size:14px;">  <span  class="text-danger  font-weight-bold" >**หมายเหตุ </span> <?php echo $row['Status_Note']; ?></td>
                   </tr>
                   <?php }?>
               <?php }?>

              <?php
                $sql1 = "SELECT * FROM `clinic` WHERE `Status` = 1";
                $result1 = mysqli_query($dbConnect, $sql1); ?>
                <tr class="table-borderless"><td> <br> </td></tr>
                <tr class="table-borderless text-success"><td>คลินิกที่ผ่านการอนุมัติ</td></tr>
                <?php while($row1 = mysqli_fetch_array($result1)){ ?>
                  <tr>
                    <td>
                      <a href="admin/ReadClinic.php?clinic_ID=<?php echo  $row1["clinic_ID"]; ?>&token=<?php echo md5( $row1["clinic_ID"].'@Confirm'); ?>" role="button">
                      <?php echo $row1['clinic_Name'] ?>
                    </a></td>
                    <td class="text-center"><a href="clinic/editeClinic.php?clinic_ID=<?php echo  $row1["clinic_ID"]; ?>&token=<?php echo md5( $row1["clinic_ID"].'@Confirm'); ?>" role="button">แก้ไข</a></td>
                    <td class="text-center"><a onclick="return confirm('confirm Delete ?')" href="clinic/deleteClinic.php?clinic_ID=<?php echo  $row1["clinic_ID"]; ?>&token=<?php echo md5( $row1["clinic_ID"].'@Confirm'); ?>" role="button">ลบ</a></td>
                  </tr>
              <?php }?>
              <?php
                $sql2 = "SELECT * FROM `clinic` WHERE `Status` = 2";
                $result2 = mysqli_query($dbConnect, $sql2);
                if(mysqli_num_rows($result2)!=0){
                ?>
                <tr class="table-borderless"><td> <br> </td></tr>
                  <tr class="table-borderless text-danger"><td>คลินิกที่ไม่ผ่านการอนุมัติ</td></tr>

                    <?php
                    while($row2 = mysqli_fetch_array($result2)){ ?>
                   <tr>
                     <td>
                       <a href="admin/ReadClinic.php?clinic_ID=<?php echo  $row2["clinic_ID"]; ?>&token=<?php echo md5( $row2["clinic_ID"].'@Confirm'); ?>" role="button">
                       <?php echo $row2['clinic_Name'] ?>
                     </a></td>

                     <td class="text-center"><a href="clinic/editeClinic.php?clinic_ID=<?php echo  $row2["clinic_ID"]; ?>&token=<?php echo md5( $row2["clinic_ID"].'@Confirm'); ?>" role="button">แก้ไข</a></td>
                     <td class="text-center">
                       <a href="clinic/deleteClinic.php?clinic_ID=<?php echo  $row2["clinic_ID"]; ?>&token=<?php echo md5( $row1["clinic_ID"].'@Confirm'); ?>" role="button"
                       onclick="return confirm('confirm Delete ?')">ลบ
                       </a>
                     </td>
                   </tr>
                   <?php if ($row2['Status_Note']!=''){?>
                     <tr class="table-borderless">
                    <td Style="font-size:14px;">  <span  class="text-danger  font-weight-bold" >**หมายเหตุ </span> <?php echo $row2['Status_Note']; ?></td>
                    </tr>
                <?php } ?>
              <?php }     }    ?>
            <?php }   ?>
          </table>
          </div>
          </div>


  </div>
<?php include("footer.php") ?>


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>

    </body>
  </html>
