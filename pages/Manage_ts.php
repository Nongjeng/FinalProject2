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

$sql_schedule = "SELECT
schedules.Schedule_ID,
semester.Semester_ID,
semester.Semester_name,
department.Departmetn_Name,
groups.Group_Name
from schedules
left join semester on schedules.Semester_ID = semester.Semester_ID
left join years on semester.Year_ID = years.Year_ID
left join groups on schedules.Group_ID = groups.Group_ID
left join major on groups.Major_ID = major.Major_ID
left join department on major.Department_ID = department.Department_ID";
$result = mysqli_query($connect, $sql_schedule);
?>

<div class="content">
    <div class="container">
        <div class="d-flex justify-content-between">
            <H3 class="mt-5">จัดการตารางเรียน</H3>
            <div>
            <button class="btn btn-success mt-5" data-bs-toggle="modal" type="button" data-bs-target="#Table_Sub">เพิ่มข้อมูล <i class="bi bi-plus"></i></button>
                <?php 
                include "./components/TableSub.php"; 
                include "./Controllers/schedules_details.php";
                ?>
                
            </div>
        </div>
        <table class="table table-striped m-0" id="leaveHis">
            <thead>
                <tr class="align-middle text-center text-white" style="height: 50px">
                    <th>รหัสตารางเรียน</th>
                    <th>ภาคเรียน/ปีการศึกษา</th>
                    <th>เทอม</th>
                    <th>แผนกวิชา</th>
                    <th>กลุ่มเรียน</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>
            <tbody class="text-start">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr class="align-middle text-center">
                    <form method="post">
                        <td class="text-center"><?php echo $row['Schedule_ID'] ?></td>
                        <td class="text-center"><?php echo $row['Semester_ID'] ?></td>
                        <td class="text-center"><?php echo $row['Semester_name'] ?></td>
                        <td class="text-center"><?php echo $row['Departmetn_Name'] ?></td>
                        <td class="text-center"><?php echo $row['Group_Name'] ?></td>
                        <td class="text-center">
                        <input type="hidden" name="Schedule_ID" value="<?php echo $row['Schedule_ID'] ?>" >
                            <button type="submit" name="schedules_details" class="btn btn-primary" style="color:#ffffff"><i class="bi bi-info-circle-fill fs-5"></i></button>
                            </form>
                            <button type="button" class="btn " style="background-color: #BA0900; color:#ffffff" onclick="confirmDeleteSchedule('<?php echo $row['Schedule_ID'] ?>')"><i class="bi bi-trash-fill fs-5"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
      function confirmDeleteSchedule(Schedule_ID) {
        console.log(Schedule_ID)
        Swal.fire({
            title: 'ต้องการลบตารางเรียนนี้?',
            text: 'คุณแน่ใจหรือไม่ว่าต้องการลบตารางเรียนนี้?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ลบข้อมูล',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                // ส่วนของ PHP ที่ใช้ในการอัปเดตฐานข้อมูล
                $.ajax({
                    type: 'POST',
                    url: 'editSchedule.php', // ระบุ URL ที่จะทำการอัปเดตในไฟล์นี้
                    data: {
                        Schedule_ID: Schedule_ID
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