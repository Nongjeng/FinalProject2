<div class="modal fade modal-lg" id="term_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <?php include('./Controllers/dateThai.php') ;?>
        <?php include('./Controllers/Tadd.php') ;?>
            <form method="post">
                <div class="modal-header bg-blue-800 text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มข้อมูลภาคเรียน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3 w-100">
                    <select class="form-select shadow-none rounded-pill" name="Semester_name">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select><label for="floatingInput" class=" fw-medium">ภาคเรียนที่</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <input type="text" class="form-control shadow-none rounded-pill" placeholder="ตัวอย่าง 2565" name="Year_ID" >
                        <label for="floatingInput" class=" fw-medium">ปีการศึกษา (ตัวอย่าง 2565)</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <input type="date" class="form-control shadow-none rounded-pill"  name="Start_semester" value="<?=currentdate()?>">
                        <label for="floatingInput" class=" fw-medium">เริ่มภาคเรียน</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <input type="date" class="form-control shadow-none rounded-pill"  name="End_semester" value="<?=currentdate()?>">
                        <label for="floatingInput" class=" fw-medium">สิ้นสุดภาคเรียน</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success px-5" name="Term_ADD">เพิ่มข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</div>