<?php
include "./Controllers/conncet.php";
include "./Controllers/dateThai.php";

if(isset($_POST['Subject_ID'])){
    $Subject_ID = $_POST['Subject_ID'];
    $teacher_id = $_POST['teacher_id'];

    $sql = "DELETE FROM subject_detail WHERE Subject_ID = '$Subject_ID' and teacher_id = '$teacher_id'";
    $sql_q = mysqli_query($connect, $sql);
    if($sql_q){
            echo "success";
    }else{
        echo "error";
    }

}
?>