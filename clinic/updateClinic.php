<?php
 // error_reporting( error_reporting() & ~E_NOTICE );
include ('../connect/connect.php');
session_start();
$OldeStatus = $_POST['Status'];
if($_SESSION["loginStatus"]=="Clinic") {
	if($OldeStatus=='1'){
		$Status = 1;
		$clinic_ID = $_POST["clinic_ID"];
		$clinic_Detail = $_POST['clinic_Detail'];
		$clinic_Address_Detil = $_POST['clinic_Address_Detil'];
		$clinic_Phone = $_POST['clinic_Phone'];
		$clinic_Email = $_POST['clinic_Email'];
		$sql = "UPDATE  clinic SET clinic_Detail='$clinic_Detail' ,clinic_Phone='$clinic_Phone',clinic_Address_Detil='$clinic_Address_Detil'
					 ,Status='$Status' ,clinic_Email='$clinic_Email' WHERE clinic_ID = '$clinic_ID' ";
					 $RESULT1=mysqli_query($dbConnect,$sql);
					 if($RESULT1){?>
						 <script>	alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ");	</script>
					<?php	}else{?>
						<script>	alert("ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script>
					<?php	} ?>
					<script>
				window.location='profileClinic.php?clinic_ID=<?php echo $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>';
					</script>
					<?php
	}	else if(($OldeStatus=='0' ) || ($OldeStatus=='2')){
		$Status = 0;
		$clinic_ID = $_POST["clinic_ID"];
		$clinic_Name = $_POST['clinic_Name'];
		 $clinic_Detail = $_POST['clinic_Detail'];
		 $clinic_Phone = $_POST['clinic_Phone'];
		 $clinic_NumAddress = $_POST['clinic_NumAddress'];
		 $clinic_Address_GPS = $_POST['clinic_Address_GPS'];
		 $clinic_Address_Detil = $_POST['clinic_Address_Detil'];
		 $clinic_NumberPermit = $_POST['clinic_NumberPermit'];
		 $latitude = $_POST['latitude'];
		 $longitude = $_POST['longitude'];
		 $clinic_Email = $_POST['clinic_Email'];
	$sql = "UPDATE  clinic SET clinic_Name='$clinic_Name',clinic_Detail='$clinic_Detail'
				 ,clinic_Phone='$clinic_Phone',clinic_NumAddress='$clinic_NumAddress' ,
				 clinic_Address_GPS='$clinic_Address_GPS' ,clinic_Address_Detil='$clinic_Address_Detil'
				 ,clinic_NumberPermit='$clinic_NumberPermit' ,latitude='$latitude' ,longitude='$longitude',longitude='$longitude'
				 ,Status='$Status',clinic_Email='$clinic_Email' WHERE clinic_ID = '$clinic_ID' ";
				 $RESULT1=mysqli_query($dbConnect,$sql);
				 if($RESULT1){?>
					 <script>	alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ");	</script>
				<?php	}else{?>
					<script>	alert("ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script>
				<?php	} ?>
				<script>
			window.location='profileClinic.php?clinic_ID=<?php echo $_SESSION["clinic_ID"]; ?>&token=<?php echo md5( $_SESSION["clinic_ID"].'@Confirm'); ?>';
				</script>
				<?php
}}else if($_SESSION["loginStatus"]=="Admin") {
$Status = $OldeStatus;
$clinic_ID = $_POST["clinic_ID"];
$clinic_Name = $_POST['clinic_Name'];
 $clinic_Detail = $_POST['clinic_Detail'];
 $clinic_Phone = $_POST['clinic_Phone'];
 $clinic_NumAddress = $_POST['clinic_NumAddress'];
 $clinic_Address_GPS = $_POST['clinic_Address_GPS'];
 $clinic_Address_Detil = $_POST['clinic_Address_Detil'];
 $clinic_NumberPermit = $_POST['clinic_NumberPermit'];
 $latitude = $_POST['latitude'];
 $longitude = $_POST['longitude'];
 $clinic_Email = $_POST['clinic_Email'];
$sql = "UPDATE  clinic SET clinic_Name='$clinic_Name',clinic_Detail='$clinic_Detail'
		 ,clinic_Phone='$clinic_Phone',clinic_NumAddress='$clinic_NumAddress' ,
		 clinic_Address_GPS='$clinic_Address_GPS' ,clinic_Address_Detil='$clinic_Address_Detil'
		 ,clinic_NumberPermit='$clinic_NumberPermit' ,latitude='$latitude' ,longitude='$longitude',longitude='$longitude'
		 ,Status='$Status',clinic_Email='$clinic_Email' WHERE clinic_ID = '$clinic_ID' ";
		 $RESULT1=mysqli_query($dbConnect,$sql);
		 if($RESULT1){?>	<script>	alert("บันทึกข้อมูลเรียบร้อยแล้วค่ะ");	</script>
		<?php	}else{?><script>	alert("ไม่สามารถบันทึกข้อมูลได้โปรดลองใหม่อีกครั้งค่ะ");</script><?php	} ?>
		<script>
	window.location='../AllClinic.php';
		</script>
		<?php
}
?>
