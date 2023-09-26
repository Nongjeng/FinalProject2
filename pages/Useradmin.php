<?php
include "./components/navbarAdmin.php";
include "./components/sidebarAdmin.php";
?>
<div class="content">
    
    <table class="table" id="group_list">
        <thead>
            <tr>
                <th>Group_ID</th>
                <th>Major_ID</th>
                <th>Group_Name</th>
                <th>Teacher_ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_list_group = "SELECT * FROM `groups`";
            $sql_list_group_q = mysqli_query($connect, $sql_list_group);
            while ($data = mysqli_fetch_assoc($sql_list_group_q)) { ?>
                <tr>
                    <td><?php echo $data['Group_ID'] ?></td>
                    <td><?php echo $data['Major_ID'] ?></td>
                    <td><?php echo $data['Group_Name'] ?></td>
                    <td><?php echo $data['Teacher_ID'] ?></td>
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