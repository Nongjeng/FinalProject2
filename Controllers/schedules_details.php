<?php 
if(isset($_POST['schedules_details'])){
    $Schedule_ID = $_POST['Schedule_ID'];
    $_SESSION['Schedule_ID'] = $Schedule_ID;
    header("Location: ?page=schedules_details");
}
?>