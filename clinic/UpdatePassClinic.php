<?php
include ('../connect/connect.php');
session_start();
$clinic_ID = $_SESSION["clinic_ID"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$password=md5($_POST["password"]);
$newPassword = md5($password1);
if($password1=="" || $password2=="" ||$password=="" ){
	?>
	<script>
	alert('กรุณาใส่ข้อมูลให้ครบทุกช่อง');
	window.location='changePassClinic.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>';
	</script>
	<?php
}else{
if($password1 == $password2){
			$SQL1="SELECT * FROM clinic WHERE clinic_Password='$password' ";
			$RESULT1=mysqli_query($dbConnect, $SQL1);
			$COUNT1=mysqli_num_rows($RESULT1);
			if($COUNT1==0){ ?>
			<script>
			alert('รหัสผ่านเดิมของคุณไม่ถูกต้อง');
			window.location='changePassClinic.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>';
			</script>
							 <?php
			}else{
				 $sql2 = "UPDATE  clinic SET clinic_Password= '$newPassword' WHERE clinic_ID = '$clinic_ID' ";
				 $RESULT2=mysqli_query($dbConnect,$sql2);
				 if($RESULT2){?>
					 <script type="text/javascript">alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ'); </script>
 				<?php }else{ ?>
					<script type="text/javascript">alert('ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ'); </script>
 			<?php	}?>
 				<script>
 				 window.location='profileClinic.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>';
 				</script>
				<?php
}} else {?>
<script>
	 alert('รหัสผ่านใหม่ไม่เหมือนกัน กรุณาลองอีกครั้ง');
window.location='changePassClinic.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>';
</script>
				 <?php
}}
?>
