<?php
include "./Controllers/conncet.php";
include "./Controllers/dateThai.php";

if(isset($_POST['Schedule_ID'])){
    $Schedule_ID = $_POST['Schedule_ID'];

    $sql_select = "SELECT * FROM schedule_detail WHERE Schedule_ID = '$Schedule_ID'";
    $q_select = mysqli_query($connect, $sql_select);

    if (mysqli_num_rows($q_select) > 0){
        $sql_detail = "DELETE FROM schedule_detail WHERE Schedule_ID = '$Schedule_ID' ";
        $sql_q_detail = mysqli_query($connect, $sql_detail);
    }

    $sql = "DELETE FROM schedules WHERE Schedule_ID = '$Schedule_ID' ";
    $sql_q = mysqli_query($connect, $sql);

    if($sql_q){
            echo "success";
    }else{
        echo "error";
    }

}
