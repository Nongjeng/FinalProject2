<?php
include "./Controllers/conncet.php";
include "./Controllers/dateThai.php";

if (isset($_POST['Schedule_ID'])) {
    $Subject_ID = $_POST['Subject_ID'];
    $Day_ID = $_POST['Day_ID'];
    $SB_ID = $_POST['SB_ID'];
    $Schedule_ID = $_POST['Schedule_ID'];

    $sql_detail = "DELETE FROM schedule_detail WHERE Schedule_ID = '$Schedule_ID' 
    and Subject_ID = '$Subject_ID' 
    and Day_ID = '$Day_ID' 
    and SB_ID = '$SB_ID' ";
    $sql_q_detail = mysqli_query($connect, $sql_detail);

    if ($sql_q_detail) {
        echo "success";
    } else {
        echo "error";
    }
}
