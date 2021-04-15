    <link rel="stylesheet" href="css/bootstrap.css">
<?php
require_once("connect/connect.php");
$db=new mysqli( 'localhost', 'root', '', 'beauty_center');
$day_config = array(
	'Mon'=>array('yellow', 'จันทร์', 1 ),
	'Tue'=>array('pink', 'อังคาร', 2 ),
	'Wed'=>array('green', 'พุธ', 3 ),
	'Thu'=>array('orange', 'พฤหัสบดี', 4 ),
	'Fri'=>array('skyblue', 'ศุกร์', 5 ),
	'Sat'=>array('violet', 'เสาร์', 6 ),
	'Sun'=>array('red', 'อาทิตย์', 7 ),
);
$sql4="SELECT MIN(clinicDay_Start) AS clinicDay_Start FROM clinicday";
$result4=mysqli_query($dbConnect,$sql4);
$record4=mysqli_fetch_array($result4);

$sql5="SELECT MAX(clinicDay_End) AS clinicDay_End FROM clinicday";
$result5=mysqli_query($dbConnect,$sql5);
$record5=mysqli_fetch_array($result5);
 $clinicDay_Start = date("h:i", strtotime($record4['clinicDay_Start']));
 $clinicDay_End = date("H:i", strtotime($record5['clinicDay_End']));
 $time_s = intval($clinicDay_Start);
 $time_e = intval($clinicDay_End);

$day_week=array( '', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' );
$sql = "select *, left( clinicDay_Start, 2) st, left( clinicDay_End, 2) en
from clinicday WHERE clinic_ID = $clinic_ID
order by field(clinicDay_Name,'Mon','Tue','Wed','Thu','Fri','Sat','Sun'), st";
$cur_day=0; $cur_hour=''; $tr='';
$rs=$db->query($sql) or die ( $sql . "<br>" . $db->error );
while( $ro = $rs->fetch_assoc()){
	$d=$ro['clinicDay_Name']; $w = $day_config[$d][2]; $st = intval($ro['st']); $en=intval($ro['en']);
	if($w!=$cur_day){ // ตรวจสอบว่า เป็นวันใหม่ หรือไม่
		if($tr) // ถ้า tr มีความยาว แสดงว่าได้ถูกใส่ <TR> เปิดไว้ก่อนแล้ว ให้ ใส่ </TR>
			$tr .= ($cur_hour < 24 ? '<td colspan='.(24 - $cur_hour)." >&nbsp;</td>" : '') . '</tr>';
		$cur_day++;  //  วันที่เก่า +1
		for($cur_day; $cur_day<$w; $cur_day++){
			// ตรวจสอบวันที่เก่า กับวันที่ ใหม่ มี gab ช่่องว่างวันที่ ไม่มีชั่วโมงเรียนหรือไม่
			// โดยวนลูป วันที่เก่า ถึง วันที่ใหม่ แล้วแสดง บันทัดของวันที่ว่างนั้น
			$tr.='<tr  >'.
						'<td align=center bgcolor="' . $day_config[$day_week[$cur_day]][0].'" >'.$day_config[$day_week[$cur_day]][1].'</td>'.
						'<td >&nbsp;</td></tr>';
		}
		$cur_hour = $time_s; // เปลี่ยน ชั่วโมง เริ่มต้น
		$tr .= '<tr ><td align=center bgcolor="'.$day_config[$d][0].'" >'.$day_config[$d][1].'</td>';
	}
	if($cur_hour<$st) // ตรวจสอบ gab ชั่วโมงเริ่มต้น กับชั่วโมงปัจจุบันเพื่อนสร้าง td ชั่วโมงที่ว่าง
		$tr.='<td align=center colspan='.($st - $cur_hour)." >&nbsp;</td>";
	$cur_hour=$en; // เปลี่ยน ชั่วโมง เริ่มต้น เป็น เวลาสิ้นสุดการเรียน
	//  แสดงเวลาเรียน
	$tr .= '<td align=center '.( ($h = $en - $st)>1 ? "colspan=$h" : '' ).' >'.$ro['clinicDay_Name']."&nbsp;".$ro['clinicDay_Start'] . '<br>' . $ro['clinicDay_End'] .'</td>';
}
if( $cur_hour<21) // ตรวจสอบ ชั่งโมงเรียนสุดท้าย น้อยกว่าเวลาปิดการสอน  21 น. หรือไม่ แล้วแสดง td ช่วงเวลาที่หายไป
	$tr.= '<td colspan='.(21 - $cur_hour)." >&nbsp;</td>";
$tr .= '</tr>'; // ปิด TR
$cur_day++;
for($cur_day; $cur_day<8; $cur_day++){
	//ตรวจวัน ที่หายไป จาก วันที่เรียนวันสุดท้าย แล้วแสดง tr วันที่หายไป
	$tr.='<tr height=45 ><td align=center bgcolor="' . $day_config[$day_week[$cur_day]][0].'" >'.$day_config[$day_week[$cur_day]][1].'</td>'.
					'<td colspan="14">&nbsp;</td></tr>';
}
///////////////////////////////////////////////////////////////////////////////l
// ส่วน แสดงตารางเรียน
?>
<br>
<div class="table-responsive" style="font-size:10px;">
<table class="table-sm table-bordered" >
<tr>
	<td align=center></td>
  <td align=center>07:00  8:00</td>
  <td align=center>08:00  9:00</td>
	<td align=center>09:00  10:00</td>
	<td align=center>10:00  11:00</td>
	<td align=center>11:00  12:00</td>
	<td align=center>12:00  13:00</td>
	<td align=center>13:00  14:00</td>
	<td align=center>14:00  15:00</td>
	<td align=center>15:00  16:00</td>
	<td align=center>16:00  17:00</td>
	<td align=center>17:00  18:00</td>
	<td align=center>18:00  19:00</td>
	<td align=center>19:00  20:00</td>
	<td  align=center>20:00  21:00</td>
</tr>
<?=$tr?>
</table>
</div>
