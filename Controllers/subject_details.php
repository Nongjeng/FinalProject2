<?php 
if(isset($_POST['subject_details'])){
    $Subject_ID = $_POST['Subject_ID'];
    $_SESSION['Subject_ID'] = $Subject_ID;
    header("Location: ?page=Subject_details");
}
?>