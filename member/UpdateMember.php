<?php
include ('../connect/connect.php');
session_start();
$member_ID = $_POST["member_ID"];
$member_Name = $_POST['member_Name'];
$member_Surname = $_POST['member_Surname'];
$member_Address = $_POST['member_Address'];
$member_Phone = $_POST['member_Phone'];
$member_Email = $_POST['member_Email'];
$sql = "UPDATE  member SET member_Name='$member_Name',member_Surname='$member_Surname'
,member_Address='$member_Address',member_Phone='$member_Phone' WHERE member_ID = '$member_ID' ";
$RESULT1=mysqli_query($dbConnect,$sql);
if($RESULT1){	?>
	<script>	alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ");	</script>
	<?php }else{	?>
	<script>	alert("ไม่สามารถบันทึกข้อมูล กรุณาลองใหม่อีกครั้งค่ะ");	</script>
<?php } ?>
<script>
window.location='profileMember.php?member_ID=<?php echo $member_ID; ?>&token=<?php echo md5( $member_ID.'@Confirm'); ?>';
</script>
<?php
	mysqli_close($dbConnect);
?>
