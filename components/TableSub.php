<div class="modal fade modal-lg" id="Table_Sub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php include('./Controllers/dateThai.php'); ?>
            <?php include('./Controllers/TableSub.php'); ?>
            <form method="post">
                <div class="modal-header bg-blue-800 text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มข้อมูลตารางเรียน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3 w-100">
                        <?php
                        $sql_years = "SELECT * FROM `years`";
                        $sql_years_p = mysqli_query($connect, $sql_years);
                        ?>
                        <select class="form-control" id="years" name="Year_ID">
                            <?php foreach ($sql_years_p as $years) : ?>
                                <option value="<?php echo $years['Year_name']; ?>">
                                    <?php echo $years['Year_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label for="floatingInput" class="fw-medium">ปีการศึกษา</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <?php
                        $sql_semester = "SELECT * FROM `semester`";
                        $sql_semester_p = mysqli_query($connect, $sql_semester);
                        ?>
                        <select class="form-control" id="semester" name="Semester_ID">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <label for="floatingInput" class="fw-medium">เทอมที่</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <?php
                        $sql_groups = "SELECT * FROM `groups`";
                        $sql_groups_p = mysqli_query($connect, $sql_groups);
                        ?>
                        <select class="form-control" id="groups" name="Group_ID">
                            <?php foreach ($sql_groups_p as $groups) : ?>
                                <option value="<?php echo $groups['Group_ID']; ?>">
                                    <?php echo $groups['Group_Name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="floatingInput" class="fw-medium">กลุ่มเรียน</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success px-5" name="TableSub">เพิ่มข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</div>