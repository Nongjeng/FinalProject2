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
<?php $Schedule_ID = $_SESSION['Schedule_ID'] ?>
<?php
include "./components/navbarAdmin.php";
include "./components/sidebarAdmin.php";

$sql_subject = "SELECT *
FROM schedules
INNER JOIN schedule_detail ON schedules.Schedule_ID = schedule_detail.Schedule_ID
INNER JOIN days ON days.Day_ID = schedule_detail.Day_ID 
INNER JOIN study_block ON study_block.SB_ID  = schedule_detail.SB_ID
INNER JOIN subject ON subject.Subject_ID = schedule_detail.Subject_ID
WHERE schedules.Schedule_ID = '$Schedule_ID';";

$result = mysqli_query($connect, $sql_subject);

?>

<div class="content">
    <div class="container">
        <div class="d-flex justify-content-between">

            <H3 class="mt-5">จัดการตารางเรียน <?php echo $Schedule_ID ?></H3>
            <div>
                <button class="btn btn-success mt-5" data-bs-toggle="modal" type="button" data-bs-target="#schedules_add">เพิ่มข้อมูล <i class="bi bi-plus"></i></button>
                <?php
                include "./components/schedules_add.php";
                ?>

            </div>
        </div>
        <table class="table table-striped m-0" id="leaveHis">
            <thead>
                <tr class="align-middle text-center text-white" style="height: 50px">
                    <th>รหัสตาราง</th>
                    <th>รายวิชา</th>
                    <th>วัน</th>
                    <th>เวลา</th>
                    <th>ห้องเรียน</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>

            <tbody class="text-start">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr class="align-middle text-center">
                        <td class="text-center"><?php echo $row['Schedule_ID'] ?></td>
                        <td class="text-center"><?php echo $row['Subject_Name'] ?></td>
                        <td class="text-center"><?php echo $row['Day_name'] ?></td>
                        <td class="text-center"><?php echo $row['SB_time'] ?></td>
                        <td class="text-center"><?php echo $row['Classroom'] ?></td>
                        <td class="text-center">
                            <button type="button" class="btn " style="background-color: #BA0900; color:#ffffff" onclick="confirmDeleteSubject_D('<?php echo $row['Schedule_ID'] ?>', '<?php echo $row['Subject_ID'] ?>', '<?php echo $row['Day_ID'] ?>', '<?php echo $row['SB_ID'] ?>')"><i class="bi bi-trash-fill fs-5"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "suo.php";
?>
<script>
    function confirmDeleteSubject_D(Schedule_ID,Subject_ID,Day_ID,SB_ID) {
        Swal.fire({
            title: 'ต้องการลบวิชานี้?',
            text: 'คุณแน่ใจหรือไม่ว่าต้องการลบวิชานี้?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ลบข้อมูล',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'POST',
                    url: 'editschedules_d.php',
                    data: {
                        Subject_ID: Subject_ID,
                        Schedule_ID: Schedule_ID,
                        Day_ID: Day_ID,
                        SB_ID: SB_ID
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