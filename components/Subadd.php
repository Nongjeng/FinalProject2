<div class="modal fade modal-lg" id="sub_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php include('./Controllers/sub_add.php'); ?>
            <form method="post">
                <div class="modal-header bg-blue-800 text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มข้อมูลวิชาเรียน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3 w-100">
                        <input type="text" class="form-control shadow-none rounded-pill" name="Subject_Name">
                        <label for="floatingInput" class=" fw-medium">รายวิชา</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <select class="form-select shadow-none rounded-pill" name="Theory_Hours">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <label for="floatingInput" class=" fw-medium">ชั่วโมงทฤษฎี</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <select class="form-select shadow-none rounded-pill" name="Practice_HOURS">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <label for="floatingInput" class=" fw-medium">ชั่วโมงปฏิบัติ</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <select class="form-select shadow-none rounded-pill" name="Unit">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label for="floatingInput" class=" fw-medium">หน่วยกิต</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success px-5" name="Subadd">เพิ่มข้อมูล</button>
                </div>
            </form>
        </div>

    </div>
</div>