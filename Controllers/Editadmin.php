<?php
if(isset($_POST['update'])){
    $teacherName = $_POST["teacher-name"];
    $teacherLastname = $_POST["teacher-lastname"];
    $teacherAddress = $_POST["teacher-address"];

    $sql = "UPDATE teacher SET 	Teacher_Name = '$teacherName', Teacher_Lastname = '$teacherLastname', Teacher_Address = '$teacherAddress'" ;
    $sql_p = mysqli_query($connect, $sql);
    if ($sql_p) {
        header("Location: ?page=UserAdmin");
        exit;
    } else {
        echo "Error updating record: " . $sql;
    }
}
 ?>