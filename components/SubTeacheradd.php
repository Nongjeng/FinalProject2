<div class="modal fade modal-lg" id="SubTeacheradd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php include('./Controllers/dateThai.php'); ?>
            <?php include('./Controllers/SubTeacheradd.php'); ?>
            <form method="post">
                <div class="modal-header bg-blue-800 text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มข้อมูลอาจารย์ผู้สอน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php
                $sql_teacher = "SELECT * FROM `teacher`";
                $sql_teacher_p = mysqli_query($connect, $sql_teacher);
                ?>
                <div class="modal-body">
                    <div class="form-floating mb-3 w-100">
                        <select class="form-control" id="teacher" name="teacher_id">
                            <?php foreach ($sql_teacher_p as $teacher) : ?>
                                <option value="<?php echo $teacher['Teacher_ID']; ?>">
                                    <?php echo $teacher['Teacher_Name'] . ' ' . $teacher['Teacher_Lastname']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="floatingInput" class=" fw-medium">อาจารย์ผู้สอน</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success px-5" name="SubTeacheradd">เพิ่มข้อมูล</button>
                </div>
            </form>
        </div>

    </div>
</div>