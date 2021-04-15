<?php
session_start();
session_destroy();
echo "กำลังออกจากระบบ";
echo'<meta http-equiv="refresh" content="0;url=index.php">';
?>
