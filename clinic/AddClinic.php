<?php
   include '../connect/connect.php';
   $clinic_Name = $_POST['clinic_Name'];
   $clinic_Detail = $_POST['clinic_Detail'];
   $clinic_Phone = $_POST['clinic_Phone'];
   $clinic_NumAddress = $_POST['clinic_NumAddress'];
   $clinic_Address_GPS = $_POST['clinic_Address_GPS'];
   $clinic_Address_Detil = $_POST['clinic_Address_Detil'];
   $clinic_NumberPermit = $_POST['clinic_NumberPermit'];
   $latitude = $_POST['latitude'];
   $longitude = $_POST['longitude'];
   $Status = 0;
   $clinic_Email = $_POST['clinic_Email'];
   $clinic_Password = md5($_POST['clinic_Password']);

   $clinic_ImagePermit = (isset($_POST['clinic_ImagePermit']) ? $_POST['v'] : '');
   $upload=$_FILES['clinic_ImagePermit']['name'];
   $filetype=$_FILES['clinic_ImagePermit']['type'];
   if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/pjpeg") and  ($filetype!="image/png") and  ($filetype!="image/gif"))
   {
     echo "<script>";
      echo "alert('Only .jpg .png .jpeg Files Are Allowed!');";
      echo "window.location='../registerClinic.php';";
            echo "</script>";
   }else if($upload !='') {
     $path="permit/";
     $type = strrchr($_FILES['clinic_ImagePermit']['name'],".");
     $newname =$clinic_Name.$type;
     $path_copy=$path.$newname;
     $path_link="fileupload/".$newname;
     move_uploaded_file($_FILES['clinic_ImagePermit']['tmp_name'],$path_copy);
   }
   if(isset($_FILES['clinic_Image'])){
     $allowed = array('jpg','png','jpeg');
    $name_array = $_FILES['clinic_Image']['name'];
    $tmp_name_array = $_FILES['clinic_Image']['tmp_name'];
    $count_tmp_name_array = count($tmp_name_array);
    for($i = 0; $i < $count_tmp_name_array; $i++){
         $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
         if( !in_array( $extension,$allowed) ){
           echo "<script>";
            echo "alert('Only .jpg .png .jpeg Files Are Allowed!');";
            echo "window.location='../registerClinic.php';";
                  echo "</script>";
         }
         $newname2 = $clinic_Name."-".$i.".".$extension;
         if(move_uploaded_file($tmp_name_array[$i], "img/".$clinic_Name."-".$i.".".$extension)){
           $insertQrySplit[] = $newname2;
         }
       }$check = "select * from clinic  where clinic_Email = '$clinic_Email' ";
           $result=mysqli_query($dbConnect,$check);
           $num=mysqli_num_rows($result);
               if($num > 0)
               {
       //ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
             echo "<script>";
              echo "alert(' มีผู้ใช้ Email นี้แล้ว กรุณาลองใหม่อีกครั้ง !');";
              echo "window.location='../registerClinic.php';";
                    echo "</script>";

           }else{
       $insertValuesSQL =  implode(",",$insertQrySplit);

       $sql = "insert into clinic(clinic_Name,clinic_Detail,clinic_Phone,clinic_Image,clinic_NumAddress,clinic_Address_GPS,clinic_Address_Detil,clinic_NumberPermit,clinic_ImagePermit,latitude,longitude,Status,clinic_Email,clinic_Password)
                   value('$clinic_Name','$clinic_Detail','$clinic_Phone','$insertValuesSQL','$clinic_NumAddress','$clinic_Address_GPS','$clinic_Address_Detil','$clinic_NumberPermit','$newname','$latitude','$longitude','$Status','$clinic_Email','$clinic_Password') ";
       $RESULT1=mysqli_query($dbConnect,$sql);
       if($RESULT1){
         echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
       }else{
         echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
       }
       echo'<meta http-equiv="refresh" content="2;url=../login.php">';
         mysqli_close($dbConnect);
       }
}
?>
