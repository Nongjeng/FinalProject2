<?php 

if (isset($_POST['Term_ADD'])){
    $Semester_name = $_POST['Semester_name'];
    $Year_Name = $_POST['Year_ID'];
    $Start_semester = $_POST['Start_semester'];
    $End_semester = $_POST['End_semester'];

    if ($Semester_name == 1 ){
        $Semester_Convert = 'S1';
    } else {
        $Semester_Convert = 'S2';
    }

    $check_year = "SELECT Year_ID,Year_name FROM years WHERE Year_name = '$Year_Name'";
    $q_check_year = mysqli_query($connect, $check_year);

    if (mysqli_num_rows($q_check_year) > 0){
        $fa_year = mysqli_fetch_assoc($q_check_year);
        $Year_ID = $fa_year['Year_ID'];
        $Semester_ID = $Semester_Convert ."/".$Year_Name;
        $sql_semester = "INSERT INTO semester (Semester_ID,Semester_Name,Year_ID,Start_semester,End_semester) VALUES ('$Semester_ID','$Semester_name','$Year_ID','$Start_semester','$End_semester')";
        $q_semester = mysqli_query($connect, $sql_semester);
        echo "<script>";
            echo "Swal.fire({
            title: 'บันทึกสำเร็จ',
            text: 'ข้อมูลถูกบันทึกลงในฐานข้อมูลแล้ว',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?page=Manage_term';
            }
        });";
            echo "</script>";

    } 
    elseif (mysqli_num_rows($q_check_year) <= 0) {
        $Year_ID = "Y" . $Year_Name;
        $sql_year = "INSERT INTO `years`(`Year_ID`, `Year_name`) VALUES ('$Year_ID','$Year_Name')";
        $q_year = mysqli_query($connect, $sql_year);
        if ($q_year) {
            // เมื่อปีการศึกษาถูกเพิ่มสำเร็จ
            // จะใช้ $Year_ID ที่เพิ่มเข้าไปในฐานข้อมูลในการสร้างรหัสภาคการศึกษา
            $Semester_ID = $Semester_Convert . "/" . $Year_Name;
            $sql_semester = "INSERT INTO semester (Semester_ID,Semester_Name,Year_ID,Start_semester,End_semester) VALUES ('$Semester_ID','$Semester_name','$Year_ID','$Start_semester','$End_semester')";
            $q_semester = mysqli_query($connect, $sql_semester);
            if ($q_semester) {
                echo "<script>";
                echo "Swal.fire({
                    title: 'บันทึกสำเร็จ',
                    text: 'ข้อมูลถูกบันทึกลงในฐานข้อมูลแล้ว',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=Manage_term';
                    }
                });";
                echo "</script>";
            } else {
                // กรณีเกิดข้อผิดพลาดในการเพิ่มข้อมูลภาคการศึกษา
                echo "<script>";
                echo "Swal.fire({
                    title: 'เกิดข้อผิดพลาด',
                    text: 'ไม่สามารถเพิ่มข้อมูลภาคการศึกษาได้',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '?page=Manage_term';
                    }
                });";
                echo "</script>";
            }
        } else {
            // กรณีเกิดข้อผิดพลาดในการเพิ่มปีการศึกษา
            echo "<script>";
            echo "Swal.fire({
                title: 'เกิดข้อผิดพลาด',
                text: 'ไม่สามารถเพิ่มข้อมูลปีการศึกษาได้',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '?page=Manage_term';
                }
            });";
            echo "</script>";
        }
    }
    
}
?>