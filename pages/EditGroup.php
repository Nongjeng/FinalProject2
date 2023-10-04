<?php
include "./components/navbarAdmin.php";
include "./components/sidebarAdmin.php";
include "./Controllers/Editgroup.php";

$groupID = $_GET['Group_ID'];
?>
<style>
    .table thead tr th {
        background-color: #BA0900;
        color: #ffffff;
        border: 1px solid white;
        height: 10px;
        font-weight: bold;
    }

    .table tbody tr td {
        background-color: white;
        border: 1px solid white;
    }
</style>
<div class="content mt-3">
    <div class="card-body">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">ข้อมูลช้ันเรียน</h1>
                </div>
            </div>

            <?php

            $sql_list_group = "SELECT g.Group_ID, g.Major_ID, g.Group_Name, g.Teacher_ID, t.Teacher_Name, t.Teacher_Lastname
            FROM `groups` AS g
            INNER JOIN `teacher` AS t ON g.Teacher_ID = t.Teacher_ID
            WHERE Group_ID = $groupID";

            $sql_list_group_q = mysqli_query($connect, $sql_list_group);

            if ($data = mysqli_fetch_assoc($sql_list_group_q)) {
            ?>
                <div class="card-body">
                <form method="post">
                        <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="student-id">รหัสกลุ่ม :</label>
                                    <input type="hidden" name="Group_ID" value="<?= $data['Group_ID'] ?>">
                                    <input type="text" class="form-control" value="<?= $data['Group_ID'] ?>" disabled>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="student-level">สาขา :</label>
                                    <input type="text" class="form-control" value="<?= $data['Major_ID'] ?>" disabled>
                                </div>
                            </div>
                        <? } ?>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="teacher">ชื่ออาจารย์:</label>
                                <?php
                                $sql_teacher = "SELECT * FROM `teacher`";
                                $sql_teacher_p = mysqli_query($connect, $sql_teacher);
                                ?>
                                <select class="form-control" id="teacher" name="teacher_id">
                                    <option value="<?php echo $data['Teacher_ID']; ?>" selected>
                                        <?php echo $data['Teacher_Name'] . ' ' . $data['Teacher_Lastname']; ?>
                                    </option>
                                    <?php foreach ($sql_teacher_p as $teacher) : ?>
                                        <option value="<?php echo $teacher['Teacher_ID']; ?>">
                                            <?php echo $teacher['Teacher_Name'] . ' ' . $teacher['Teacher_Lastname']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="student-level">ชื่อกลุ่ม :</label>
                                <input type="text" class="form-control" value="<?= $data['Group_Name'] ?>" disabled>
                            </div>
                        </div>
                        </div>
                        <!-- เพิ่มปุ่ม "บันทึก" ด้านล่าง -->
                       
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" name="Editgroup">บันทึก</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                </div>
   
        </div>
    </div>


    <table class="table table-striped" id="group_list">
        <thead>
            <tr>
                <th>รหัสนักศึกษา</th>
                <th>ชื่อนักศึกษา</th>
                <th>ชื่อผู้ปกครอง</th>
                <th>ที่อยู่</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_list_group = "SELECT
                        *
                    FROM
                        `groups` g
                    INNER JOIN
                        `std` s ON s.Group_ID = g.Group_ID
                    WHERE
                        g.Group_ID = $groupID;
                    ";

            $sql_list_group_q = mysqli_query($connect, $sql_list_group);

            while ($data = mysqli_fetch_assoc($sql_list_group_q)) { ?>
                <tr>
                    <td><?php echo $data['STD_ID'] ?></td>
                    <td><?php echo $data['STD_Name'], " ", $data['STD_Lastname'] ?></td>
                    <td><?php echo $data['Parent_Name'] ?></td>
                    <td><?php echo $data['STD_Address'] ?></td>

                </tr>
            <?php  } ?>
        </tbody>
    </table>

</div>
<script>
    $(document).ready(function() {
        $('#group_list').DataTable({
            pageLength: 10,
            paging: true,
            ordering: true,
            info: true,
            responsive: {
                orthogonal: 'responsive'
            }
        });
    });
</script>