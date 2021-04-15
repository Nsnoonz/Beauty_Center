<?php
include ('../connect/connect.php');
$admin_ID = $_REQUEST["admin_ID"];
 $admin_Name = $_POST["admin_Name"];
 $admin_Image = (isset($_POST['admin_Image']) ? $_POST['v'] : '');
 $upload=$_FILES['admin_Image']['name'];
 $filetype=$_FILES['admin_Image']['type'];
 if(($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/pjpeg") and  ($filetype!="image/png") and  ($filetype!="image/gif"))
 {?>

    <script>
    alert(' jpg,png,gif only !');
     window.location='admin.php?admin_ID=<?php echo  $admin_ID; ?>&token=<?php echo md5( $admin_ID.'@Confirm'); ?>';
    </script>";
<?php
 }else{
 if($upload !='') {
 $path="profile/";
 $type = strrchr($_FILES['admin_Image']['name'],".");
 $numrand = (mt_rand());
 $newname =$admin_Name.$numrand.$type;
 $path_copy=$path.$newname;
 $path_link="fileupload/".$newname;
 move_uploaded_file($_FILES['admin_Image']['tmp_name'],$path_copy);
 }
				$sql = "UPDATE  admin SET admin_Image='$newname' WHERE admin_ID = '$admin_ID' ";
	$RESULT1=mysqli_query($dbConnect,$sql);
	if($RESULT1){    ?>
        <script>  				alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ');  				</script>
        <?php	}else{    ?>
        <script>  				alert('ไม่สามารถบันทึกข้อมูล กรุณาลองใหม่อีกครั้งค่ะ');  				</script>
        <?php	} ?>
	<script>
 window.location='admin.php?admin_ID=<?php echo  $admin_ID; ?>&token=<?php echo md5( $admin_ID.'@Confirm'); ?>';
	</script>
	<?php
		mysqli_close($dbConnect);
	}
	?>
