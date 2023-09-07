<?php
   require_once "./components/navbar.php";
   require_once "./components/sidebar.php";

?>

<div class="content">
<h2 class="d-flex justify-content-center my-3">บันทึกการลา</h2>
    <div>
      <div class="container d-flex justify-content-center align-content-center">
        <fo rm method="post">
          <div class="card text-bg-secondary mb-3" style="width: 1000px;">
            <div class="card-body">

              <!-- query insert -->
              <?php

              ?>
              <!-- แถวแรก -->
              <div class="row mt-3">

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">วันที่เริ่มลา</label>
                    <input type="date" name="startdate" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">ถึงวันที่</label>
                    <input type="date" name="enddate" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class=" form-group">
                    <label for="">ตั้งแต่เวลา</label>
                    <select name="start_time" id="start_time" class=" form-control"></select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class=" form-group">
                    <label for="">ถึงเวลา</label>
                    <select name="end_time" id="end_time" class=" form-control"></select>
                  </div>
                </div>

              </div>

              <!-- แถวสอง -->
              <div class="row mt-3">
                <div class="col-md-7">
                  <div class=" form-group">
                    <label for="">เหตุผลการลา</label>
                    <textarea name="" id="" class=" form-control" style="  height: 7rem;width: 29rem;padding: 5px;"></textarea>
                    <!-- <input type="text" name="comment" class=" form-control"> -->
                  </div>
                </div>
                <div class="col " style="margin-left: 50px;">
                  <?php
                  $sql_type = "SELECT * FROM leave_type";
                  $query_type = mysqli_query($connect, $sql_type);
                  ?>
                  <div class=" form-group">
                    <label for="">ประเภทการลา</label>
                    <select name="leavetype" id="leavetype" class=" form-control">
                      <option value="" selected disabled>กรุณาเลือกประเภทการลา</option>
                      <?php
                      while ($type_fa = mysqli_fetch_assoc($query_type)) {
                      ?>
                        <option value="<?php echo $type_fa['leave_type_id'] ?>"><?php echo $type_fa['leave_type_name'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>

                  <!-- <div class="col">
                    <div class=" form-group">
                      <label for="">วิชาที่ลาได้</label>
                      <select name="subject" id="" class=" form-control"></select>
                    </div>
                  </div> -->
                </div>
              </div>

              <!-- แถว3 -->
              <div class="row mt-3">

                <div class="col-md-7">

                </div>
                <div class="col " style="margin-left: 50px;">
                  <div class=" form-group">
                    <label for="">ประเภทการลา</label>
                    <select name="leavetype" id="" class=" form-control"></select>
                  </div>
                </div>

              </div>

              <!-- แถวสี่ -->
              <div class="row mt-3">
                <div class="col col-md-8">
                  <p style="margin-top: 0; margin-bottom: 0;">แนบไฟล์ ใบรับรองแพทย์</p>
                  <input type="file" name="attachfile" id="attachfile">
                  <p style="margin-top: 10px; margin-bottom: 0;color: red;">** หมายเหตุ กรณีที่ลาป่วยเกิน 3 วันควรมีใบรับรองแพทย์ในการยืนยัน</p>
                </div>
                <div class="col">
                  <button class=" btn bg-success form-control" style="width: 200px; height: 50px; margin-left: 99px; margin-top: 55px; color: white;">บันทึกการลา</button>
                </div>
              </div>
            </div>
          </div>
          </form>
      </div>
    </div>
  </div>