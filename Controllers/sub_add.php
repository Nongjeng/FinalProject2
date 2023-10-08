<?php
if (isset($_POST['Subadd'])) {
    $subjectName = $_POST['Subject_Name'];
    $theoryHours = $_POST['Theory_Hours'];
    $practiceHours = $_POST['Practice_HOURS'];
    $unit = $_POST['Unit'];
    $Total_Hours = $theoryHours + $practiceHours;

    $sql = "SELECT Subject_ID FROM subject ORDER BY Subject_ID DESC LIMIT 1";
    // ทำการส่งคำสั่ง SQL ไปยังฐานข้อมูลของคุณและรับผลลัพธ์
    $result = mysqli_query($connect, $sql);
    if ($result) {
        // ดึงข้อมูล Subject_ID ล่าสุด
        $row = mysqli_fetch_assoc($result);
        $lastSubjectID = $row['Subject_ID'];

        // แยกคำนำหน้า "st" และตัวเลขออกจาก Subject_ID ล่าสุด
        $prefix = substr($lastSubjectID, 0, 2);
        $lastNumber = intval(substr($lastSubjectID, 2));

        // เพิ่มตัวเลขอีก 1
        $newNumber = $lastNumber + 1;

        // คำนำหน้า "st" และเติมเลข 0 ข้างหน้าในกรณีที่ Subject_ID เป็นเลขเดียวหรือสองตัว
        if ($newNumber < 10) {
            $newSubjectID = $prefix . '00' . $newNumber;
            $sql_addSub = "INSERT INTO `subject`(
                `Subject_ID`,
                `Subject_Name`,
                `Total_Hours`,
                `Theory_Hours`,
                `Practice_HOURS`,
                `Unit`
            )
            VALUES(
                '$newSubjectID',
                '$subjectName',
                '$Total_Hours',
                '$theoryHours',
                '$practiceHours',
                '$unit'
            )";
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
                        window.location.href = '?page=Manage_S';
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
                        window.location.href = '?page=Manage_S';
                    }
                });";
                echo "</script>";
            }
        } elseif ($newNumber < 100) {
            $newSubjectID = $prefix . '0' . $newNumber;
            $sql_addSub = "INSERT INTO `subject`(
                `Subject_ID`,
                `Subject_Name`,
                `Total_Hours`,
                `Theory_Hours`,
                `Practice_HOURS`,
                `Unit`
            )
            VALUES(
                '$newSubjectID',
                '$subjectName',
                '$Total_Hours',
                '$theoryHours',
                '$practiceHours',
                '$unit'
            )";
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
                        window.location.href = '?page=Manage_S';
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
                        window.location.href = '?page=Manage_S';
                    }
                });";
                echo "</script>";
            }
        } else {
            $newSubjectID = $prefix . $newNumber;
            $sql_addSub = "INSERT INTO `subject`(
                `Subject_ID`,
                `Subject_Name`,
                `Total_Hours`,
                `Theory_Hours`,
                `Practice_HOURS`,
                `Unit`
            )
            VALUES(
                '$newSubjectID',
                '$subjectName',
                '$Total_Hours',
                '$theoryHours',
                '$practiceHours',
                '$unit'
            )";
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
                        window.location.href = '?page=Manage_S';
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
                        window.location.href = '?page=Manage_S';
                    }
                });";
                echo "</script>";
            }
        }
    }
}
