<?php
include ('../connect/connect.php');
session_start();

$admin_ID = $_SESSION['admin_ID'];
$admin_Name = $_POST['admin_Name'];
$admin_Surname = $_POST['admin_Surname'];
$admin_Address = $_POST['admin_Address'];
$admin_Phone = $_POST['admin_Phone'];
$admin_Email = $_POST['admin_Email'];

$sql = "UPDATE  admin SET admin_Name='$admin_Name',admin_Surname='$admin_Surname'
,admin_Address='$admin_Address',admin_Phone='$admin_Phone' WHERE admin_ID = '$admin_ID' ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){
	echo  "บันทึกข้อมูลเรียบร้อยแล้วค่ะ";
}else{
	echo "ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ";
}?>
<script>
window.location='admin.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION["admin_ID"].'@Confirm'); ?>';
</script>
<?php
	mysqli_close($dbConnect);

?>
