<div style="color:#FFF;">
<?php
include ('../connect/connect.php');
session_start();

$booking_ID = $_REQUEST["booking_ID"];
$member_ID = $_REQUEST["member_ID"];
$service_ID = $_REQUEST["service_ID"];
$sql =  "SELECT * FROM booking,clinic,service,member WHERE booking.service_ID = service.service_ID
        and clinic.clinic_ID=service.clinic_ID and member.member_ID =  '$member_ID' and booking.booking_ID =  '$booking_ID' ";
$result=mysqli_query($dbConnect,$sql);
$record = mysqli_fetch_array($result);

$sms = new thsms();

$sms->username   = 'nssupavadee'; //จากที่เราสมัครสมาชิก
$sms->password   = '227cdb'; //เช็ค SMS บนมือถือของเรา

$a = $sms->getCredit();
var_dump( $a);
$clinic_Phone = $record['clinic_Phone'] ;
$booking_ID = $record['booking_ID'];
$b = $sms->send( '0000', $clinic_Phone, 'รหัสการจอง : '.$booking_ID.
"\r\nบริการ : ".$record['service_Name']."\r\nจากลูกค้า : ".$record['member_Name']."  ".$record['member_Surname'].
"\r\nวันที่จอง : ".$record['booking_Date']."  ".$record['booking_Time'].
"\r\nกรุณายืนยันการจองที่ Clinic Beauty Center" );

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
 window.location='AllBooking.php?member_ID=<?php echo $member_ID; ?>&token=<?php echo md5( $member_ID.'@Confirm'); ?> ';
 </script>
