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
    $article_ID = $_REQUEST["article_ID"];
    $query1= "SELECT * FROM article WHERE article_ID =$article_ID ";
    // $query1 = "SELECT * FROM reviews WHERE reviews_ID='$reviews_ID' ";
    $result1 = mysqli_query($dbConnect, $query1);
    $row1 = mysqli_fetch_array($result1);
  ?>
  <center>
  <div class=" container border-top Myfont">
    <br>
    <p style="" class="text-left">
      <a href="All_Article.php">บทความทั้งหมด</a>
          >
           <?php echo $row1['article_NameTitle'];?>
    </p>
    <div class="col-sm-8" style="min-height:1000px;">
      <center>
      <div class="col-12">
        <img src="article/image/<?php  echo $row1['article_Image'];?> " class="img-fluid" alt="...">
      </div>
      </center>
        <br>
  <div class=" table-responsive  " style="font-size:18px;"  >
    <table class="table w-100">
      <br>
       <tr> <td><?php echo $row1['article_Details'];?></td></tr>
       <tr><td>Update: <?php echo $row1['article_Date'];?></td></tr>

   </table>
 </div>
</div>
</div>
</center>
<div style="min-height:200px;">

</div>
    <?php include("footer.php"); ?>
</body>

</html>
