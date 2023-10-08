<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_POST['submit'])) {
    // ดึงค่า leave_id ล่าสุดจากฐานข้อมูล
    $sql = "SELECT MAX(leave_id) AS max_leave_id FROM leaves";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // ตรวจสอบว่ามีค่า leave_id ล่าสุดหรือไม่
    if ($row['max_leave_id']) {
        // หาค่าตัวเลขที่อยู่หลัง L และเพิ่มค่านี้ขึ้นอีก 1
        $leave_id_number = intval(substr($row['max_leave_id'], 1)) + 1;
        
        // สร้าง leave_id ใหม่
        $new_leave_id = 'L' . str_pad($leave_id_number, 3, '0', STR_PAD_LEFT);
    } else {
        // ถ้ายังไม่มี leave_id ในฐานข้อมูล
        $new_leave_id = 'L001';
    }
    
    $writedate = $_POST['writedate'];
    $startleave = $_POST['startleave'];
    $endleave = $_POST['endleave'];
    $comment = $_POST['comment'];
    $leavetype = $_POST['leavetype'];
    $attachfile = $_POST['attachfile'];
    $selected_subjects = $_POST['selected_subject'];
    $selected_subject_sb_id = $_POST['selected_subject_sb_id'];
    $selectedDays = $_POST['selectedDays'];

    $cTime = date('h:i:s');

    $sql_leave = sprintf("INSERT INTO leaves(leave_id,leave_type_id,std_id,write_date,start_leave_date,end_leave_date,leave_comment,leave_status_id,attach_medCerti)
                VALUES ('$new_leave_id','$leavetype','$STD_ID','$writedate $cTime','$startleave','$endleave','$comment','LS01','$attachfile')");

    if (mysqli_query($connect, $sql_leave)) {
        // ตรวจสอบว่าข้อมูลไม่ว่างและเป็นอาร์เรย์
        if (!empty($selected_subjects) && is_array($selected_subjects)) {
            // เริ่มต้นการวนลูปเพื่อเพิ่มข้อมูลในฐานข้อมูล
            for ($i = 0; $i < count($selected_subjects); $i++) {
                $subject_id = $selected_subjects[$i];
                $sb_id = $selected_subject_sb_id[$i];

                // สร้างคำสั่ง SQL สำหรับ Insert ข้อมูลลงในฐานข้อมูล
                $sql = "INSERT INTO leave_detail (leave_id, subject_id, sb_id) VALUES ('$new_leave_id', '$subject_id', '$sb_id')";
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
