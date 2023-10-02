<?php
include "./Controllers/conncet.php";
include "./Controllers/dateThai.php";

if (isset($_POST['leave_id'])) {
    $leave_id = $_POST['leave_id'];

    // ทำการอัปเดตฐานข้อมูล
    $update_status = "UPDATE leaves SET leave_status_id = 'LS02' WHERE leave_id = '$leave_id'";
    $query = mysqli_query($connect, $update_status);

    
    if ($query) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>