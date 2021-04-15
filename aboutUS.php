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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </head>
  <body class="Myfont">
    <?php
    include("navbar.php");
    ?>
    <div class="container  Myfont border-top" style="min-height:1000px;">
      <br>
      <p class="text-center" style="font-size:20px;">คณะผู้จัดทำ</p>
      <hr><br>
      <center>
      <div class="col-sm-9">
        <div class="card-deck">
          <div class="card " >
            <img src="images/Developer-Supavadee-2.png" style="padding:15px;" class="card-img-top" alt="Developer-Supavadee.png">
            <div class="card-body  bg-light">
              <h5 class="card-title">62011270006</h5>
              <p class="card-text">นางสาว สุภาวดี จันทร์โม้</p>
              <p class="card-text">นิสิตชั้นปีที่ 2 ระบบพิเศษเทียบเข้า</p>
              <p class="card-text">สาขาวิชาเทคโนโลยีสารสนเทศ</p>
              <p class="card-text">คณะวิทยาการสารสนเทศ มหาวิทยาลัยมหาสารคาม</p>
              <hr>
              <p class="card-text">Email : noon.supavadee@gmail.com</p>
              <ul class="nav justify-content-center">
                <!-- <li class="nav-item">
                  <a class="nav-link " target="_blank"  href="https://www.facebook.com/noon.supavadee"><img src="img/gmail-1.png"  class="border-0"    style="width:64px; height:64px; border-radius: 15px;"></a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link " target="_blank"  href="https://www.facebook.com/noon.supavadee"><img src="img/facebook.png"  class="border-0"    style="width:64px; height:64px;"></a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" target="_blank"  href="https://www.instagram.com/ns_noon/" ><img src="img/instagram.png" class="border-0"   style="width:64px; height:64px;"  ></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" target="_blank" href="https://www.youtube.com/channel/UCwL1La6sxRYvW7OE8tioAsA" ><img src="img/youtube.png" class="border-0"   style="width:64px; height:64px;"  ></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card  bg-light" >
            <img src="images/Developer-Anittaya-2.png" style="padding:15px;" class="card-img-top" alt="Developer-Supavadee.png">
            <div class="card-body  bg-light">
              <h5 class="card-title">62011270007</h5>
              <p class="card-text">นางสาว อนิตญา ภูสถิตย์</p>
              <p class="card-text">นิสิตชั้นปีที่ 2 ระบบพิเศษเทียบเข้า</p>
              <p class="card-text">สาขาวิชาเทคโนโลยีสารสนเทศ</p>
              <p class="card-text">คณะวิทยาการสารสนเทศ มหาวิทยาลัยมหาสารคาม</p>
              <hr>
              <p class="card-text">Email : anittaya210741@gmail.com</p>
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link " target="_blank" href="https://www.facebook.com/anittaya.poosatit"><img src="img/facebook.png"  class="border-0"    style="width:64px; height:64px;"></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" target="_blank"  href="https://www.instagram.com/__anittaya__/" ><img src="img/instagram.png" class="border-0"   style="width:64px; height:64px;"  ></a>
                </li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </center>

    </div>
    <?php include("footer.php"); ?>
    </body>
  </html>
