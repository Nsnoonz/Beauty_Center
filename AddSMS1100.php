<div style="color:#FFF;">


<?php
include ('connect/connect.php');
session_start();
//    if ($_REQUEST) {
//     echo '<pre>';
//     echo htmlspecialchars(print_r($_REQUEST, true));
//     echo '</pre>';
// }

$clinic_ID = $_REQUEST["clinic_ID"];
$member_ID = $_REQUEST["member_ID"];
$sql2 =  "SELECT * FROM clinic WHERE clinic_ID =  $clinic_ID ";
$result2=mysqli_query($dbConnect,$sql2);
$record = mysqli_fetch_array($result2);

$sms = new thsms();

$sms->username   = 'nssupavadee'; //จากที่เราสมัครสมาชิก
$sms->password   = '227cdb'; //เช็ค SMS บนมือถือของเรา

$a = $sms->getCredit();
var_dump( $a);
$clinic_Phone = $record['clinic_Phone'] ;

$b = $sms->send( '0000', $clinic_Phone, "คลินิก : ".$record['clinic_Name'] .
"ของคุณถูกระงับบริการ \r\nกรุณาชำระค่าบริการหรือตรวจสอบได้ที่ Clinic Beauty Center" );

// $b = $sms->send( '0000', $clinic_Phone, "\r\nวันที่จอง : ".$record['booking_Date']." ".$record['booking_Time'] );

var_dump( $b);

class thsms
{
     var $api_url   = 'http://www.thsms.com/api/rest';
     var $username  = null;
     var $password  = null;

    public function getCredit()
    {
        $params['method']   = 'credit';
        $params['username'] = $this->username;
        $params['password'] = $this->password;

        $result = $this->curl( $params);

        $xml = @simplexml_load_string( $result);

        if (!is_object($xml))
        {
            return array( FALSE, 'Respond error');

        } else {

            if ($xml->credit->status == 'success')
            {
                return array( TRUE, $xml->credit->amount);
            } else {
                return array( FALSE, $xml->credit->message);
            }
        }
    }

    public function send( $from='0000', $to=null, $message=null)
    {
        $params['method']   = 'send';
        $params['username'] = $this->username;
        $params['password'] = $this->password;

        $params['from']     = $from;
        $params['to']       = $to;
        $params['message']  = $message;

        if (is_null( $params['to']) || is_null( $params['message']))
        {
            return FALSE;
        }

        $result = $this->curl( $params);
        $xml = @simplexml_load_string( $result);
        if (!is_object($xml))
        {
            return array( FALSE, 'Respond error');
        } else {
            if ($xml->send->status == 'success')
            {
                return array( TRUE, $xml->send->uuid);
            } else {
                return array( FALSE, $xml->send->message);
            }
        }
    }

    private function curl( $params=array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response  = curl_exec($ch);
        $lastError = curl_error($ch);
        $lastReq = curl_getinfo($ch);
        curl_close($ch);

        return $response;
    }
}
 ?>
 </div>
 <script type="text/javascript">
 alert("ขออภัยค่ะ คลินิกไม่สามารถดำเนินการได้ในขณะนี้ กรุณาลองใหม่อีกครั้งค่ะ");
 window.location = 'AllClinic.php';
 // window.location='ReadClinic.php?clinic_ID=<?php echo $clinic_ID; ?>&token=<?php echo md5( $clinic_ID.'@Confirm'); ?> ';
 // window.location='ReadClinic.php?member_ID=<?php echo $member_ID; ?>&token=<?php echo md5( $member_ID.'@Confirm'); ?> ';
 </script>
