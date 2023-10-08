<?php
include "./Controllers/conncet.php";
include "./Controllers/dateThai.php";

if(isset($_POST['Semester_ID'])){
    $Semester_ID = $_POST['Semester_ID'];

    $sql = "DELETE FROM semester WHERE Semester_ID = '$Semester_ID' ";
    $sql_q = mysqli_query($connect, $sql);
    if($sql_q){
            echo "success";
    }else{
        echo "error";
    }

}
?>