<?php
require_once "./components/navbar.php";
require_once "./components/sidebar.php";
require_once "./Controllers/conncet.php";
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
              <div class="row row-cols-lg-2 row-cols-md-1 row-cols-sm-1 gx-3 ">
                <!-- Left -->
                <div class="col col-12 col-sm-6">
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
                  <div class=" mt-3">
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
                    <label class=" form-label">แนปไฟล์ใบรับรองแพทย์</label>
                    <input type="file" class=" form-control" name="attachfile" id="attachfile">
                    <label class=" form-label text-danger mt-2">** หมายเหตุ ในกรณีที่ลาป่วย 3
                      วันขึ้นไปให้แนบรูปใบรับรองแพทย์ **</label>
                  </div>
                </div>
                <!-- Right -->
                <div class="col col-12 col-md-6 col-sm-6">
                  <div class=" d-flex align-content-end flex-column h-100">
                    รายวิชาที่สามารถลาได้
                    <div class=" table-responsive overflow-auto">
                      <div class="mb-4" id="subject" style="height: 20rem;;">

                      </div>
                    </div>
                    <div class=" mt-auto w-100 d-flex justify-content-end">
                      <input type="hidden" name="writedate" id="writedate" value="<?php echo currentdateTime(); ?>">
                      <button class=" btn btn-success px-5" type="submit" name="submit">ยืนยัน</button>
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
</div>
<script type="text/javascript">
    $('#provinces').change(function() {
        var id_province = $(this).val();
        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                provinces_id: id_province,
                function: 'provinces'
            },
            success: function(data) {
                $('#districts').html(data)
                $('#subdistricts').html('')
                $('#zipcode').val('')
            }
        });
    });
    $('#districts').change(function() {
        var id_district = $(this).val();
        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                district_id: id_district,
                function: 'districts'
            },
            success: function(data) {
                $('#subdistricts').html(data)
                $('#zipcode').val('')
            }
        });
    });
    $('#subdistricts').change(function() {
        var id_subdistrict = $(this).val();
        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                subdistrict_id: id_subdistrict,
                function: 'subdistricts'
            },
            success: function(data) {
                $('#zipcode').val(data)
            }
        });
    });

    $('#startdate').change(function() {
        var id_startdate = $(this).val();

        var studentData = {
            "STD_ID": <?php echo json_encode($_SESSION["STD_ID"]); ?>,
            "STD_Name": <?php echo json_encode($_SESSION["STD_Name"]); ?>,
            "STD_Lastname": <?php echo json_encode($_SESSION["STD_Lastname"]); ?>,
            "STD_Birth": <?php echo json_encode($_SESSION["STD_Birth"]); ?>,
            "STD_Phone": <?php echo json_encode($_SESSION["STD_Phone"]); ?>,
            "Classlev_ID": <?php echo json_encode($_SESSION["Classlev_ID"]); ?>,
            "Major_ID": <?php echo json_encode($_SESSION["Major_ID"]); ?>,
            "Parent_Name": <?php echo json_encode($_SESSION["Parent_Name"]); ?>,
            "STD_Address": <?php echo json_encode($_SESSION["STD_Address"]); ?>,
            "Group_ID": <?php echo json_encode($_SESSION["Group_ID"]); ?>,
            "Provinces_ID": <?php echo json_encode($_SESSION["provinces_id"]); ?>,
            "District_ID": <?php echo json_encode($_SESSION["district_id"]); ?>,
            "SubDistrict_ID": <?php echo json_encode($_SESSION["subdistrict_id"]); ?>,

        };

        var studentDataJSON = JSON.stringify(studentData);

        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                startdate_id: id_startdate,
                studentData: studentDataJSON,
                function: 'startdate'
            },
            success: function(data) {
                console.log(studentDataJSON);
                $('#subject').html(data)
                $('#enddate').val(id_startdate)
            }
        });
    });

    $('#enddate').change(function() {
        var id_startdate = $('#startdate').val();
        var id_enddate = $(this).val();

        var studentData = {
            "STD_ID": <?php echo json_encode($_SESSION["STD_ID"]); ?>,
            "STD_Name": <?php echo json_encode($_SESSION["STD_Name"]); ?>,
            "STD_Lastname": <?php echo json_encode($_SESSION["STD_Lastname"]); ?>,
            "STD_Birth": <?php echo json_encode($_SESSION["STD_Birth"]); ?>,
            "STD_Phone": <?php echo json_encode($_SESSION["STD_Phone"]); ?>,
            "Classlev_ID": <?php echo json_encode($_SESSION["Classlev_ID"]); ?>,
            "Major_ID": <?php echo json_encode($_SESSION["Major_ID"]); ?>,
            "Parent_Name": <?php echo json_encode($_SESSION["Parent_Name"]); ?>,
            "STD_Address": <?php echo json_encode($_SESSION["STD_Address"]); ?>,
            "Group_ID": <?php echo json_encode($_SESSION["Group_ID"]); ?>,
            "Provinces_ID": <?php echo json_encode($_SESSION["provinces_id"]); ?>,
            "District_ID": <?php echo json_encode($_SESSION["district_id"]); ?>,
            "SubDistrict_ID": <?php echo json_encode($_SESSION["subdistrict_id"]); ?>,

        };

        var studentDataJSON = JSON.stringify(studentData);

        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                startdate_id: id_startdate, // แก้ชื่อตัวแปรให้เป็น startdate_id
                enddate_id: id_enddate,
                studentData: studentDataJSON,
                function: 'enddate'
            },
            success: function(data) {
                $('#subject').html(data)
            }
        });
    });

    
</script>