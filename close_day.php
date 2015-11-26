<?php

include 'class/tbcpay.lib.php';

use WeAreDe\TbcPay\TbcPayProcessor;


$Payment = new TbcPayProcessor( '/home/tsexpres/domains/tsexpress.ge/public_html/class/tbc.pem', 'dzroxuna90', $_SERVER['REMOTE_ADDR'] );


	$result   = $Payment->close_day();


?>


<html>
<head>
    <title>TBCPAY</title>
</head>

<body>
 <h2>Response:</h2>
    <?php echo date('m/d/Y h:i:s a', time()); ?>
    <p><?php print_r( $result ); ?></p>
   
   <?php 
   $message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");
mail('oalkhanishvili@gmail.com', 'My Subject', $message); ?>

<?php
$data = implode(':', $result);
$db = new PDO('mysql:host=localhost;dbname=tsexpres_amanati;charset=utf8', 'tsexpres_user', 'tsexpress123');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$stmt = $db->prepare("INSERT INTO close_day('date','respond') VALUES(:time,:respond)");
$stmt->execute(array(':time' => date('Y-m-d H:i:s', time()),':respond' => $data));
?>
</body>
</html>