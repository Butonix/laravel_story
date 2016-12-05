<?php
ini_set('date.timezone', 'Asia/Bangkok');
ini_set("display_errors", 1);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

$servername = "localhost";
$username = "u457640248_admin";
$password = "macrol3ios";
$dbname = "u457640248_story";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require_once "Payme.php";
$log = true;

$cPayme = new Payme();
$cPayme->addAllowIP("27.254.144.22"); // เพิ่ม IP ที่อนุญาติให้ผ่าน
$cPayme->addAllowIP("31.220.110.3"); // เพิ่ม IP ที่อนุญาติให้ผ่าน
$cPayme->addAllowIP("31.220.110.5"); // เพิ่ม IP ที่อนุญาติให้ผ่าน

$cPayme->addAllowIP("31.170.163.241"); // เพิ่ม IP ที่อนุญาติให้ผ่าน
$cPayme->addAllowIP("31.220.23.1"); // เพิ่ม IP ที่อนุญาติให้ผ่าน
$cPayme->addAllowIP("173.192.183.247"); // เพิ่ม IP ที่อนุญาติให้ผ่าน
$cPayme->addAllowIP("31.170.164.249"); // เพิ่ม IP ที่อนุญาติให้ผ่าน

$result = $cPayme->statusTruemoney($log);

$tmCode = $result['tmCode'];
$tmMsg = $result['tmMsg'];
$tmAmount = $result['tmAmount'];
$tmRealAmount = $result['tmRealAmount'];
$tmStatus = $result['tmStatus'];

$sql = "SELECT * FROM used_truemoney WHERE tm_code = '$tmCode'";
$check_used = $conn->query($sql);
$found_tmCode = mysqli_num_rows($check_used);

if (($found_tmCode == 0) && ($tmCode != null)) {

  $created_at = date('Y-m-d h:i:sa');

  $sql = "INSERT INTO truemoney (tmCode, tmMsg, tmAmount, tmRealAmount, tmStatus, created_at)
         VALUES (
            '$tmCode',
            '$tmMsg',
            '$tmAmount',
            '$tmRealAmount',
            '$tmStatus',
            '$created_at'
          )";

  $conn->query($sql);

  $sql = "INSERT INTO used_truemoney (tm_code, created_at)
         VALUES (
            '$tmCode',
            '$created_at'
          )";

  $conn->query($sql);

}

$conn->close();

?>
