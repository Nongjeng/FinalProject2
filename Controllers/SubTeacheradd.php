<?php 
if(isset($_POST['SubTeacheradd'])){
    $teacher_id = $_POST['teacher_id'];
    $sql_addTeacherSD = "INSERT INTO `subject_detail`(`subject_id`, `teacher_id`) VALUES ('$Subject_ID','$teacher_id')";
    echo $sql_addTeacherSD;
    $q_sql_addTeacherSD = mysqli_query($connect,$sql_addTeacherSD);
    if ($q_sql_addTeacherSD) {
        echo "<script>";
        echo "Swal.fire({
            title: 'บันทึกสำเร็จ',
            text: 'ข้อมูลถูกบันทึกลงในฐานข้อมูลแล้ว',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?page=Subject_details';
            }
        });";
        echo "</script>";
    }else {
        // กรณีเกิดข้อผิดพลาดในการเพิ่มข้อมูลภาคการศึกษา
        echo "<script>";
        echo "Swal.fire({
            title: 'เกิดข้อผิดพลาด',
            text: 'ไม่สามารถเพิ่มครูผู้สอนได้',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?page=Subject_details';
            }
        });";
        echo "</script>";
    }


}
?>