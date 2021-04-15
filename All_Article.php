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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </head>
  <body class="Myfont">
  <?php include('navbar.php');
    include('nav.php');
  ?>
    <div class="container  Myfont border-top" style="min-height:1000px;">
      <br>
        <p class="text-center"style="font-size:22px;">บทความทั้งหมด</p>
        <center>
          <div class="col-sm-6">
          <form action="All_Article.php" method="post"  class="form-search">
            <div class="form-row">
              <div class="col-8">
                <input type="text" placeholder="ค้นหาบทความ" name="search"  class=" form-control">
              </div>
              <div class="col">
                <button class="btn  btn-outline-secondary " type="submit">Search <img src="img/loupe (1).png"></button>
              </div>
            </div>
          </form>
          </div>
        </center>
        <?php
         $search=$_POST["search"];
        if($search!=""){
        	$SQL1="SELECT * FROM article
        	WHERE article_NameTitle LIKE '%$search%'";
        	$RESULT1=mysqli_query($dbConnect,$SQL1);
  
        	$COUNT1=mysqli_num_rows($RESULT1);?>
          <center><br>
            <p>ผลการค้นหา : " <?php echo $search; ?> " &nbsp;&nbsp; &nbsp; จำนวนผลลัพธ์ : <?php echo $COUNT1; ?>  </p>
          </center>
          <?php
            while($RECORD1=mysqli_fetch_array($RESULT1)){?>
              <center>
              <div class="col-10">
                <br>
              <div class="card ">
                <div class="row no-gutters">
                  <div class="col-md-5">
                    <img src="article/image/<?php echo$RECORD1['article_Image'] ; ?>" height="270" class="card-img">
                  </div>
                  <div class="col-md-7 text-left">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo$RECORD1['article_NameTitle'] ; ?></h5>
                      <p class="card-text"><?php echo mb_substr($row['article_Details'], 0, 250); ?>
                        <a href="ReadArticle.php?article_ID=<?php echo  $row["article_ID"]; ?>" role="button"> อ่านต่อ.. </a>
                        </p>
                      <p class="card-text"><small class="text-muted">Update: <?php echo$RECORD1['article_Date'] ; ?></small></p>
                <?php      if ($_SESSION["loginStatus"]=="Admin")  { ?>
                        <div class="col-sm-6">
                        <form action="article/changeImgArticle.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                              <div class="col-8">
                                <input type="hidden" name="article_ID"value="<?php echo   $RECORD1["article_ID"]; ?>" >
                                <input type="hidden" name="article_NameTitle"value="<?php echo  $RECORD1["article_NameTitle"];?>" >
                                <input type="file" class="" accept="image/*" name="article_Image"  placeholder="เปลี่ยนภาพบทความ" aria-describedby="button-addon2">
                              </div>
                              <div class="col">
                              <button class="btn btn-outline-secondary " type="submit" id="button-addon2"> เปลี่ยน</button>
                              </div>
                            </div>
                          </form>
                          </div>


                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
          <?php    if ($_SESSION["loginStatus"]=="Admin")  { ?>
                <div class="card-footer ">
              <div class=" text-right">
                      <span class="text-muted" >
                        <a  class="btn btn-primary" href="article/editeArticle.php?article_ID=<?php echo  $RECORD1["article_ID"]; ?>">แก้ไข</a>
                        <a class="btn btn-danger" onclick="return confirm('confirm Delete ?')" href="article/deleteArticle.php?article_ID=<?php echo  $RECORD1["article_ID"]; ?>">ลบ</a>
                      </span>
              </div>
              </div>
            <?php } ?>
              </div>
            </center>

            <?php } ?>
          <?php  } else { ?>
            <?php
              $sql = "SELECT * FROM article ORDER BY article_Date DESC";
              $result = mysqli_query($dbConnect, $sql);
              if(mysqli_affected_rows($dbConnect)==0){
                echo "<p>ไม่มีข้อมูล</p>";
              }
              ?>
              <center>
                <?php
                if ($_SESSION["loginStatus"]=="Admin")  { ?>
                  <br>
                  <a class="text-left" style="font-size:20px;" href="article/registerArticle.php">+เพิ่มบทความ</a>
             <?php  }?>
            <?php  while($row = mysqli_fetch_array($result)){ ?>
            <div class="col-10">
              <br>
            <div class="card ">
              <div class="row no-gutters">
                <div class="col-md-5">
                  <img src="article/image/<?php echo$row['article_Image'] ; ?>" height="270" class="card-img">
                </div>
                <div class="col-md-7 text-left">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo$row['article_NameTitle'] ; ?></h5>

                    <p class="card-text"><?php echo mb_substr($row['article_Details'], 0, 250); ?>
                      <a href="ReadArticle.php?article_ID=<?php echo  $row["article_ID"]; ?>" role="button"> อ่านต่อ.. </a>
                      </p>
                    <span class="card-text"><small class="text-muted">Update: <?php echo$row['article_Date'] ; ?></small></span>
                        <!-- <p class="card-text"><?php echo$row['article_Details'] ; ?></p> -->
                    <?php
                    if ($_SESSION["loginStatus"]=="Admin")  { ?>
                      <div class="col-sm-6">
                      <form action="article/changeImgArticle.php" method="post" enctype="multipart/form-data">
                          <div class="form-row">
                            <div class="col-8">
                              <input type="hidden" name="article_ID"value="<?php echo   $row["article_ID"]; ?>" >
                              <input type="hidden" name="article_NameTitle"value="<?php echo  $row["article_NameTitle"];?>" >
                              <input type="file" class="" accept="image/*" name="article_Image"  placeholder="เปลี่ยนภาพบทความ" aria-describedby="button-addon2">
                            </div>
                            <div class="col">
                            <button class="btn btn-outline-secondary " type="submit" id="button-addon2"> เปลี่ยน</button>
                            </div>
                          </div>
                        </form>
                        </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <?php
            if ($_SESSION["loginStatus"]=="Admin")  { ?>
              <div class="card-footer ">
            <div class=" text-right">
                    <span class="text-muted" >
                      <a  class="btn btn-primary" href="article/editeArticle.php?article_ID=<?php echo  $row["article_ID"]; ?>">แก้ไข</a>
                      <a class="btn btn-danger" onclick="return confirm('confirm Delete ?')" href="article/deleteArticle.php?article_ID=<?php echo  $row["article_ID"]; ?>">ลบ</a>
                    </span>
            </div>
            </div>
          <?php } ?>
          </div>
        <?php     }         ?>
            <?php    }     ?>
  </center>
<br><br><br>
  </div>
    <?php include("footer.php"); ?>


    </body>
  </html>
