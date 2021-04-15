<?php
include("connect/connect.php");
session_start();
$emailLogin=$_POST["email"];
$passwordLogin=md5($_POST["password"]);
$loginStatus=$_POST["loginStatus"];
if($emailLogin=="" || $passwordLogin=="" ||$loginStatus=="" ){
	echo"กรุณาใส่ข้อมูลให้ครบทุกช่องค่ะ!";}
else{
if($loginStatus=="Member"){
	$SQL1="SELECT * FROM member WHERE member_Email='$emailLogin' AND member_Password='$passwordLogin' ";
	$RESULT1=mysqli_query($dbConnect, $SQL1);
	$COUNT1=mysqli_num_rows($RESULT1);
	if($COUNT1==0){?>
		<script>
		alert("Username หรือ Password ของคุณไม่ถูกต้องค่ะ");
		window.location='login.php'
		</script>
<?php }
		else{
			$RECORD1=mysqli_fetch_array($RESULT1);
		 	$_SESSION["loginStatus"]=$loginStatus;
			$_SESSION["member_ID"]=$RECORD1["member_ID"];
			$_SESSION["email"]=$RECORD1["member_Email"];

      ?>
			<script>
			alert("คุณได้เข้าสู่ระบบเรียบร้อยแล้วค่ะ ")
			// window.location='index.php?member_ID=<?php echo  $_SESSION["member_ID"]; ?>&token=<?php echo md5( $_SESSION['member_ID'].'@Confirm'); ?> '
			window.location='index.php'
			</script>

	<?php
			}
	}
  if($loginStatus=="Clinic"){

  	$SQL1="SELECT * FROM clinic WHERE clinic_Email='$emailLogin' AND clinic_Password='$passwordLogin' ";
  	$RESULT1=mysqli_query($dbConnect, $SQL1);
  	$COUNT1=mysqli_num_rows($RESULT1);

  	if($COUNT1==0){?>
			<script>
			alert("Username หรือ Password ของคุณไม่ถูกต้องค่ะ");
			window.location='login.php'
			</script>
 <?php } 	else{
  			$RECORD1=mysqli_fetch_array($RESULT1);
  			 $_SESSION["loginStatus"]=$loginStatus;
				 $_SESSION["email"]=$RECORD1["clinic_Email"];
				 $_SESSION["clinic_ID"]=$RECORD1["clinic_ID"];
				?>
				<script>
				alert("คุณได้เข้าสู่ระบบเรียบร้อยแล้วค่ะ ")
				window.location='clinic/index.php?clinic_ID=<?php echo  $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION['clinic_ID'].'@Confirm'); ?> '
				</script>
	 <?php
  			}
  	}
		if($loginStatus=="Admin"){
			$SQL1="SELECT * FROM admin WHERE admin_Email='$emailLogin' AND admin_Password='$passwordLogin' ";
			$RESULT1=mysqli_query($dbConnect, $SQL1);
			$COUNT1=mysqli_num_rows($RESULT1);
			if($COUNT1==0){?>
				<script>
				alert("Username หรือ Password ของคุณไม่ถูกต้องค่ะ");
				window.location='login.php'
				</script>
	 <?php		}	else{
					$RECORD1=mysqli_fetch_array($RESULT1);
					$_SESSION["email"]=$RECORD1["admin_Email"];
					 $_SESSION["loginStatus"]=$loginStatus;
					 $_SESSION["admin_ID"]=$RECORD1["admin_ID"];

					  ?>
					 <script>
					 alert("คุณได้เข้าสู่ระบบเรียบร้อยแล้วค่ะ");
					 // window.location='admin/index.php?admin_ID=<?php echo  $_SESSION["admin_ID"]; ?>&token=<?php echo md5( $_SESSION['admin_ID'].'@Confirm'); ?> '
					 window.location='admin/index.php'
					 </script>

			<?php		}
			}
}
/*ปิดการเชื่อฐานข้อมูล*/
mysqli_close($dbConnect);
?>
