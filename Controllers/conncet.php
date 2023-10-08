<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// สร้างการเชื่อมต่อ
$connect = mysqli_connect($host, $username, $password,$dbname);




//ตรวจสอบการเชื่อมต่อ
if ($connect->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $connect->connect_error);
}
mysqli_set_charset($connect, "utf8");
?>
