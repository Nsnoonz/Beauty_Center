<?php
include ('../connect/connect.php');
session_start();
$admin_ID = $_SESSION["admin_ID"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$password=md5($_POST["password"]);
$newPassword = md5($password1);
if($password1=="" || $password2=="" ||$password=="" ){
	?>
	<script>
	alert('กรุณาใส่ข้อมูลให้ครบทุกช่อง');
	window.location='changePassAdmin.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION["admin_ID"].'@Confirm'); ?>';
	</script>
	<?php
}else{
if($password1 == $password2){
			$SQL1="SELECT * FROM admin WHERE admin_Password='$password' ";
			$RESULT1=mysqli_query($dbConnect, $SQL1);
			$COUNT1=mysqli_num_rows($RESULT1);
			if($COUNT1==0){ ?>
			<script>
			alert('รหัสผ่านเดิมของคุณไม่ถูกต้อง');
			window.location='changePassAdmin.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION["admin_ID"].'@Confirm'); ?>';
			</script>
							 <?php
			}else{
				 $sql2 = "UPDATE  admin SET admin_Password= '$newPassword' WHERE admin_ID = '$admin_ID' ";
				 $RESULT2=mysqli_query($dbConnect,$sql2);
				 if($RESULT2){?>
					 <script type="text/javascript">alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ'); </script>
 				<?php }else{ ?>
					<script type="text/javascript">alert('ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ'); </script>
 			<?php	}?>
 				<script>
 				 window.location='admin.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION["admin_ID"].'@Confirm'); ?>';
 				</script>
				<?php
}} else {?>
<script>
	 alert('รหัสผ่านใหม่ไม่เหมือนกัน กรุณาลองอีกครั้ง');
	 window.location='changePassAdmin.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION["admin_ID"].'@Confirm'); ?>';
</script>
				 <?php
}}
?>
