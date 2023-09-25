<?php
require_once "./components/navbar.php";
require_once "./components/sidebar.php";
require_once "./Controllers/insertLeaves.php";
require_once "./Controllers/dateThai.php";

?>
<div class="content mt-5">
  <h2 class="d-flex justify-content-center my-3">บันทึกการลา</h2>
  <div>
    <div class=" container ">
      <div class=" w-100 justify-content-center ">
        <div class=" card shadow bg-200 mt-5 ">
          <div class=" card-body text-secondary" style="background-color: #F4F4F4;">
            <form method="post" id="formPost">
              <div class="row row-cols-2 gx-3">
                <div class="col">
                  <div class=" row row-cols-2 ">
                    <div class=" col">
                      <label class=" form-label">วันที่ลา</label>
                      <input type="date" name="startleave" id="startdate" class=" form-control" value="<?php echo currentdate(); ?>">
                    </div>
                    <div class=" col">
                      <label class=" form-label">ถึงวันที่</label>
                      <input type="date" name="endleave" id="enddate" class=" form-control" value="<?php echo currentdate(); ?>">
                    </div>
                  </div>
                  <div class=" mt-3">
                    <label>เหตุผลการลา</label>
                    <textarea name="comment" id="comment" class=" form-control w-100" style="height: 130px;" placeholder="กรอกเหตุผลการลาเช่น ไม่สบาย, ทำธุระต่างจังหวัด"></textarea>
                  </div>
                  <div class="mt-3">
                    <label>ประเภทการลา</label>
                    <?php
                    $sql_type = "SELECT * FROM leave_type";
                    $query_type = mysqli_query($connect, $sql_type);
                    ?>
                    <select name="leavetype" id="leavetype" class=" form-control" required>
                      <option value="" selected disabled>กรุณาเลือกประเภทการลา</option>
                      <?php
                      while ($type_fa = mysqli_fetch_assoc($query_type)) {
                      ?>
                        <option value="<?= $type_fa['leave_type_id'] ?>"><?php echo $type_fa['leave_type_name'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="mt-3">
                    <label class=" form-label">แนบไฟล์ใบรับรองแพทย์</label>
                    <input type="file" class=" form-control" name="attachfile" id="attachfile">
                    <label class=" form-label text-danger mt-2">** หมายเหตุ ในกรณีที่ลาป่วย 3
                      วันขึ้นไปให้แนบรูปใบรับรองแพทย์ **</label>
                  </div>
                </div>
                <div class="col">
                  <div class=" d-flex align-content-end flex-column h-100">
                    รายวิชาที่สามารถลาได้
                    <div class=" table-responsive">
                      <div class="overflow-auto mb-5" id="subject" style="height: 20rem;;">

                      </div>
                    </div>
                    <div class=" mt-auto w-100 d-flex justify-content-end">
                    <input type="hidden" name="leaveid" id="leaveid" value="<?php echo generateNewProvinceId($connect); ?>">
                      <button class=" btn btn-success px-5" name="submit" onclick="subForm()">ยืนยัน</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?
  function generateNewProvinceId($conn)
  {
    $increment = 1;

    $sql_max_id = "SELECT MAX(leave_id) AS max_id FROM leaves";
    $result = mysqli_query($conn, $sql_max_id);
    $row = mysqli_fetch_assoc($result);
    $lastLeaveId = $row['max_id'];

    if ($lastLeaveId !== null) {
      $numberPart = (int)substr($lastLeaveId, 1);
      $newNumberPart = $numberPart + $increment;

      $newLeaveId = "L" . str_pad($newNumberPart, 3, '0', STR_PAD_LEFT);
    }
    return $newLeaveId;
  }

  ?>



  <?php
include "./Controllers/scrip.php";
?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <Script src="https://code.jquery.com/jquery-3.7.1.min.js"></Script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
