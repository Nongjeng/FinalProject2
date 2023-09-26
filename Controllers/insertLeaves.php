<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_POST['submit'])) {
    $leaveid = $_POST['leaveid'];
    $writedate = $_POST['writedate'];
    $startleave = $_POST['startleave'];
    $endleave = $_POST['endleave'];
    $comment = $_POST['comment'];
    $leavetype = $_POST['leavetype'];
    $attachfile = $_POST['attachfile'];
    $selected_subjects = $_POST['selected_subject'];
    $selected_subject_sb_id = $_POST['selected_subject_sb_id'];
    $selectedDays = $_POST['selectedDays'];

    $sql_leave = sprintf("INSERT INTO leaves(leave_id,leave_type_id,std_id,write_date,start_leave_date,end_leave_date,leave_comment,leave_status_id,attach_medCerti)
                VALUES ('$leaveid','$leavetype','$STD_ID','$writedate','$startleave','$endleave','$comment','LS01','$attachfile')");

    if (mysqli_query($connect, $sql_leave)) {

        // ตรวจสอบว่าข้อมูลไม่ว่างและเป็นอาร์เรย์
        if (!empty($selected_subjects) && is_array($selected_subjects)) {

            // เริ่มต้นการวนลูปเพื่อเพิ่มข้อมูลในฐานข้อมูล
            for ($i = 0; $i < count($selected_subjects); $i++) {
                $subject_id = $selected_subjects[$i];
                $sb_id = $selected_subject_sb_id[$i];

                // สร้างคำสั่ง SQL สำหรับ Insert ข้อมูลลงในฐานข้อมูล
                $sql = "INSERT INTO leave_detail (leave_id, subject_id, sb_id) VALUES ('$leaveid', '$subject_id', '$sb_id')";
                $sql_query = mysqli_query($connect, $sql);
            }

            echo "<script>";
            echo "Swal.fire({
            title: 'บันทึกสำเร็จ',
            text: 'ข้อมูลถูกบันทึกลงในฐานข้อมูลแล้ว',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?page=LeaveHistory';
            }
        });";
            echo "</script>";
        } else {
            // กรณีที่ไม่มีรายวิชาถูกเลือก
            echo mysqli_error($connect);
            echo "ยังไม่ได้เลือกรายวิชา";
        }
    } else {
        echo mysqli_error($connect);
    }
}

?>
