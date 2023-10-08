<style>
    .table thead tr th {
        background-color: #BA0900;
        color: #ffffff;
        border: 1px solid white;
        height: 50px;
        font-weight: bold;
    }

    .table tbody tr td {
        background-color: white;
        border: 1px solid white;
    }
</style>

<?php
include "./components/navbarAdmin.php";
include "./components/sidebarAdmin.php";

$sql_semester = "SELECT
semester.Semester_ID,
semester.Semester_name,
years.Year_name,
semester.Start_semester,
semester.End_semester
FROM semester
left join years on semester.Year_ID = years.Year_ID";
$result = mysqli_query($connect, $sql_semester);
?>

<div class="content">
    <div class="container">
        <div class="d-flex justify-content-between">
            <H3 class="mt-5">จัดการภาคเรียน</H3>
            <div class="mt-5">
                <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#term_add">เพิ่มข้อมูล <i class="bi bi-plus"></i></button>
                <?php include "./components/Termadd.php"; ?>
            </div>
        </div>

        <table class="table table-striped m-0" id="leaveHis">
            <thead>
                <tr class="align-middle text-center text-white" style="height: 50px">
                    <th>รหัสภาคเรียน</th>
                    <th>ภาคเรียน</th>
                    <th>ปีการศึกษา</th>
                    <th>เริ่มภาคเรียน</th>
                    <th>สิ้นสุดภาคเรียน</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>
            <tbody class="text-start">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr class="align-middle text-center">
                        <td class="text-center"><?php echo $row['Semester_ID'] ?></td>
                        <td class="text-center"><?php echo $row['Semester_name'] ?></td>
                        <td class="text-center"><?php echo $row['Year_name'] ?></td>
                        <td class="text-center"><?php echo $row['Start_semester'] ?></td>
                        <td class="text-center"><?php echo $row['End_semester'] ?></td>
                        <td class="text-center">
                            <button type="submit" class="btn" style="background-color: #BA0900; color:#ffffff" onclick="confirmDeleteSemester('<?php echo $row['Semester_ID'] ?>')"><i class="bi bi-trash-fill fs-5"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>

<?php 
// include "./Controllers/scrip.php";
 ?>
<script>
    
    function confirmDeleteSemester(Semester_ID) {
        console.log(Semester_ID);
        Swal.fire({
            title: 'ต้องการลบภาคเรียน?',
            text: 'คุณแน่ใจหรือไม่ว่าต้องการลบภาคเรียนนี้?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ลบข้อมูล',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                // ส่วนของ PHP ที่ใช้ในการอัปเดตฐานข้อมูล
                $.ajax({
                    type: 'POST',
                    url: 'editTerm.php', // ระบุ URL ที่จะทำการอัปเดตในไฟล์นี้
                    data: {
                        Semester_ID: Semester_ID
                    },
                    success: function(response) {
                        if (response === 'success') {
                            Swal.fire({
                                title: 'ลบข้อมูลสำเร็จ',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'เกิดข้อผิดพลาด',
                                text: 'ไม่สามารถลบข้อมูลนี้ได้',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            }
        });
    }
    $(document).ready(function() {
        $('#leaveHis').DataTable({
            pageLength: 5,
            paging: true,
            ordering: true,
            info: true,
            responsive: {
                orthogonal: 'responsive'
            }
        });
    });
</script>