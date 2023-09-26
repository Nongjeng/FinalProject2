<?php
include "./components/navbarAdmin.php";
include "./components/sidebarAdmin.php";
?>
<div class="content mt-5">
    <table class="table" id="group_list">
        <thead>
            <tr>
                <th>รหัสกลุ่ม</th>
                <th>สาขา</th>
                <th>กลุ่ม</th>
                <th>ชื่ออาจารย์</th>
                <th>แก้ไข</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_list_group = "SELECT g.Group_ID, g.Major_ID, g.Group_Name, g.Teacher_ID, t.Teacher_Name, t.Teacher_Lastname
           FROM `groups` AS g
           INNER JOIN `teacher` AS t ON g.Teacher_ID = t.Teacher_ID";

            $sql_list_group_q = mysqli_query($connect, $sql_list_group);

            while ($data = mysqli_fetch_assoc($sql_list_group_q)) { ?>
                <tr>
                    <td><?php echo $data['Group_ID'] ?></td>
                    <td><?php echo $data['Major_ID'] ?></td>
                    <td><?php echo $data['Group_Name'] ?></td>
                    <td><?php echo $data['Teacher_Lastname']," ",$data['Teacher_Lastname'] ?></td>
                    <td><button>แก้ไข</button></td>
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