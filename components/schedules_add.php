<div class="modal fade modal-lg" id="schedules_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php include('./Controllers/dateThai.php'); ?>
            <?php include('./Controllers/schedules_add.php'); ?>
            <form method="post">
                <div class="modal-header bg-blue-800 text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มข้อมูลรายละเอียดตารางเรียน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3 w-100">
                        <?php
                        $sql_subject = "SELECT * FROM `subject`";
                        $sql_subject_p = mysqli_query($connect, $sql_subject);
                        ?>
                        <select class="form-control" id="subject" name="Subject_ID">
                            <?php foreach ($sql_subject_p as $subject) : ?>
                                <option value="<?php echo $subject['Subject_ID']; ?>">
                                    <?php echo $subject['Subject_Name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="floatingInput" class="fw-medium">วิชา</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <?php
                        $sql_days = "SELECT * FROM `days`";
                        $sql_days_p = mysqli_query($connect, $sql_days);
                        ?>
                        <select class="form-control" id="days" name="Day_ID">
                            <?php foreach ($sql_days_p as $days) : ?>
                                <option value="<?php echo $days['Day_ID']; ?>">
                                    <?php echo $days['Day_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label for="floatingInput" class="fw-medium">วัน</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <?php
                        $sql_study_block = "SELECT * FROM `study_block`";
                        $sql_study_block_p = mysqli_query($connect, $sql_study_block);
                        ?>
                        <select class="form-control" id="study_block" name="SB_ID">
                            <?php foreach ($sql_study_block_p as $study_block) : ?>
                                <option value="<?php echo $study_block['SB_ID']; ?>">
                                    <?php echo $study_block['SB_time']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="floatingInput" class="fw-medium">เวลา</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <input type="text" class="form-control shadow-none rounded-pill" name="Classroom">
                        <label for="floatingInput" class="fw-medium">ห้องเรียน</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success px-5" name="schedulesD_add">เพิ่มข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</div>