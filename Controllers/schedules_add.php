<?php
if(isset($_POST['schedulesD_add'])){
    $Subject_ID = $_POST['Subject_ID'];
    $Day_ID = $_POST['Day_ID'];
    $Schedule_ID = $_SESSION['Schedule_ID'];
    $SB_ID = $_POST['SB_ID'];
    $Classroom = $_POST['Classroom'];

   $sql_TableSD = "INSERT INTO `schedule_detail`(
    `Schedule_ID`,
    `Subject_ID`,
    `Day_ID`,
    `SB_ID`,
    `Classroom`
)
VALUES(
    '$Schedule_ID',
    '$Subject_ID',
    '$Day_ID',
    '$SB_ID',
    '$Classroom'
)";
    $q_sql_TableSD = mysqli_query($connect,$sql_TableSD);
    if($q_sql_TableSD){ 
        echo "<script>";
        echo "Swal.fire({
            title: 'บันทึกสำเร็จ',
            text: 'ข้อมูลถูกบันทึกลงในฐานข้อมูลแล้ว',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?page=schedules_details';
            }
        });";
        echo "</script>";
    }else{
        echo "<script>";
        echo "Swal.fire({
            title: 'เกิดข้อผิดพลาด',
            text: 'มีข้อมูลวิชานี้อยู่แล้ว',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?page=schedules_details';
            }
        });";
        echo "</script>";
    }


}
