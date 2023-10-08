<?php
if(isset($_POST['TableSub'])){
    $Year = $_POST['Year_ID'];
    $Semester = $_POST['Semester_ID'];
    $Group_ID = $_POST['Group_ID'];
    $Semester_ID = "S".$Semester."/".$Year;

    $sql = "SELECT Schedule_ID  FROM schedules ORDER BY Schedule_ID  DESC LIMIT 1";
    // ทำการส่งคำสั่ง SQL ไปยังฐานข้อมูลของคุณและรับผลลัพธ์
    $result = mysqli_query($connect, $sql);
    if ($result) {
        // ดึงข้อมูล Schedule_ID ล่าสุด
        $row = mysqli_fetch_assoc($result);
        $lastScheduleID = $row['Schedule_ID'];
    
        // แยกคำนำหน้า "Sch" และตัวเลขออกจาก Schedule_ID ล่าสุด
        $prefix = substr($lastScheduleID, 0, 3);
        $lastNumber = intval(substr($lastScheduleID, 3));
    
        // เพิ่มตัวเลขอีก 1
        $newNumber = $lastNumber + 1;
        if ($newNumber < 100) {
            $newSubjectID = $prefix . '0' . $newNumber;
            $sql_addSub = "INSERT INTO `schedules`(
                `Schedule_ID`,
                `Semester_ID`,
                `Group_ID`
            )
            VALUES('$newSubjectID', '$Semester_ID', '$Group_ID')";
            $q_sqladdS = mysqli_query($connect, $sql_addSub);
            if ($q_sqladdS) {
                echo "<script>";
                echo "Swal.fire({
                    title: 'บันทึกสำเร็จ',
                    text: 'ข้อมูลถูกบันทึกลงในฐานข้อมูลแล้ว',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=Manage_ts';
                    }
                });";
                echo "</script>";
            }else{
                echo "<script>";
                echo "Swal.fire({
                    title: 'เกิดข้อผิดพลาด',
                    text: 'มีตารางเรียนอยู่แล้ว',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=Manage_ts';
                    }
                });";
                echo "</script>";
            }
        }else {
            $newSubjectID = $prefix . $newNumber;
            $sql_addSub = "INSERT INTO `schedules`(
                `Schedule_ID`,
                `Semester_ID`,
                `Group_ID`
            )
            VALUES('$newSubjectID', '$Semester_ID', '$Group_ID')";
            $q_sqladdS = mysqli_query($connect, $sql_addSub);
            if ($q_sqladdS) {
                echo "<script>";
                echo "Swal.fire({
                    title: 'บันทึกสำเร็จ',
                    text: 'ข้อมูลถูกบันทึกลงในฐานข้อมูลแล้ว',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=Manage_ts';
                    }
                });";
                echo "</script>";
            }else{
                echo "<script>";
                echo "Swal.fire({
                    title: 'เกิดข้อผิดพลาด',
                    text: 'มีตารางเรียนอยู่แล้ว',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=Manage_ts';
                    }
                });";
                echo "</script>";
            }
        }
    }
   
}
