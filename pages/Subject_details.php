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
<?php $Subject_ID = $_SESSION['Subject_ID'] ?>
<?php
include "./components/navbarAdmin.php";
include "./components/sidebarAdmin.php";

$sql_subject = "SELECT *
FROM subject
INNER JOIN subject_detail ON subject.Subject_ID = subject_detail.Subject_ID
inner join teacher on teacher.Teacher_ID = subject_detail.teacher_id
WHERE subject.Subject_ID = '$Subject_ID'; ";
$result = mysqli_query($connect, $sql_subject);
?>

<div class="content">
    <div class="container">
        <div class="d-flex justify-content-between">

            <H3 class="mt-5">จัดการรายวิชา <?php echo $Subject_ID ?></H3>
            <div>
                <button class="btn btn-success mt-5" data-bs-toggle="modal" type="button" data-bs-target="#SubTeacheradd">เพิ่มข้อมูล <i class="bi bi-plus"></i></button>
                <?php
                include "./components/SubTeacheradd.php";
                include "./Controllers/subject_details.php";

                ?>

            </div>
        </div>
        <table class="table table-striped m-0" id="leaveHis">
            <thead>
                <tr class="align-middle text-center text-white" style="height: 50px">
                    <th>รหัสวิชา</th>
                    <th>รายวิชา</th>
                    <th>ชั่วโมงรวม</th>
                    <th>ชั่วโมงทฤษฎี</th>
                    <th>ชั่วโมงปฏิบัติ</th>
                    <th>หน่วยกิต</th>
                    <th>อาจารย์ที่ปรึกษา</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>

            <tbody class="text-start">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr class="align-middle text-center">
                        <td class="text-center"><?php echo $row['Subject_ID'] ?></td>
                        <td class="text-center"><?php echo $row['Subject_Name'] ?></td>
                        <td class="text-center"><?php echo $row['Total_Hours'] ?></td>
                        <td class="text-center"><?php echo $row['Theory_Hours'] ?></td>
                        <td class="text-center"><?php echo $row['Practice_HOURS'] ?></td>
                        <td class="text-center"><?php echo $row['Unit'] ?></td>
                        <td class="text-center"><?php echo $row['Teacher_Name'], " ", $row['Teacher_Lastname'] ?></td>
                        <td class="text-center">
                            <button type="button" class="btn " style="background-color: #BA0900; color:#ffffff" onclick="confirmDeleteSubject_D('<?php echo $row['Subject_ID'] ?>', '<?php echo $row['teacher_id'] ?>')"><i class="bi bi-trash-fill fs-5"></i></button>
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
    function confirmDeleteSubject_D(Subject_ID,teacher_id ) {
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
                    url: 'editSubject_d.php',
                    data: {
                        Subject_ID: Subject_ID,
                        teacher_id: teacher_id
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