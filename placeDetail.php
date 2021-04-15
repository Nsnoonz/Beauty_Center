<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
require_once("connect/connect.php");

// $q="SELECT * FROM  clinic WHERE clinic_ID='".$_GET['placeID']."'  ";
// $qr=@mysql_query($q);
// $rs=@mysql_fetch_assoc($qr);
$sql = "SELECT * FROM clinic WHERE clinic_ID ='".$_GET['placeID']."' ";
$result_sql = mysqli_query($dbConnect, $sql);
$record = mysqli_fetch_array($result_sql);
?>
<!--จัดรูปแบบ ที่ต้องการแสดงตามต้องการ -->
<table width="300" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td width="10">&nbsp;</td>
      <td><a href="ReadClinic.php?clinic_ID=<?php echo  $record["clinic_ID"]; ?>&token=<?php echo md5( $record["clinic_ID"].'@Confirm'); ?> " role="button"><?php echo $record['clinic_Name'] ; ?></a></td>
  </tr>
  <!-- <tr>
    <td>&nbsp;</td>
    <td>Latitude: <?=$record['latitude']?> Longitude: <?=$record['longitude']?></td>
  </tr> -->
  <tr>
    <td>&nbsp;</td>
  <td><?=$record['clinic_Address_GPS']?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="ReadClinic.php?clinic_ID=<?php echo  $record["clinic_ID"]; ?>&token=<?php echo md5( $record["clinic_ID"].'@Confirm'); ?> " role="button">อ่านเพิ่มเติม</a></td>
  </tr>
</table>
