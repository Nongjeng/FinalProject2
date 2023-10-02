<?php
require_once "./components/navbarTeach.php";
require_once "./components/sidebarTeach.php";
require_once "./Controllers/insertLeaves.php";
require_once "./Controllers/dateThai.php";
$Teacher_ID  = $_SESSION['Username']
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
<div class="content mt-5">
    <h3>นักเรียนในชั้นเรียน</h3>
    <table class="table table-striped" id="std_list">
        <thead>
            <tr>
                <th>รหัสนักศึกษา</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>กลุ่ม</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_list_stdg = "SELECT s.STD_ID, s.STD_Name, s.STD_Lastname, g.Group_Name
            FROM std AS s 
            INNER JOIN groups AS g ON s.Group_ID = g.Group_ID 
            INNER JOIN teacher AS t ON g.Teacher_ID = t.Teacher_ID 
            WHERE t.Teacher_ID = '$Teacher_ID'";

            $sql_list_stdg_q = mysqli_query($connect, $sql_list_stdg);

            while ($data = mysqli_fetch_assoc($sql_list_stdg_q)) { ?>
                <tr>
                    <td><?php echo $data['STD_ID'] ?></td>
                    <td><?php echo $data['STD_Name'] ?></td>
                    <td><?php echo $data['STD_Lastname'] ?></td>
                    <td><?php echo $data['Group_Name'] ?></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#std_list').DataTable({
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