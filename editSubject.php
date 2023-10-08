<?php
include "./Controllers/conncet.php";
include "./Controllers/dateThai.php";

if(isset($_POST['Subject_ID'])){
    $Subject_ID = $_POST['Subject_ID'];

    $sql = "DELETE FROM subject WHERE Subject_ID = '$Subject_ID' ";
    $sql_q = mysqli_query($connect, $sql);
    if($sql_q){
            echo "success";
    }else{
        echo "error";
    }

}
?>