<?php
$host = "localhost";
$username = "planetco_it65-4";
$password = "it65-4";
$dbname = "planetco_it65-4";

// สร้างการเชื่อมต่อ
$connect = mysqli_connect($host, $username, $password,$dbname);




//ตรวจสอบการเชื่อมต่อ
if ($connect->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $connect->connect_error);
}

?>
