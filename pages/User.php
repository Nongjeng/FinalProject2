<?php
include "./components/navbar.php";
include "./components/sidebar.php";

?>
<!-- Your HTML content here -->
<div class="content">
    <div class=" vh-100 vw-100">
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">ข้อมูลส่วนตัว</h1>
                </div>
            </div>
            <div class="row mt-3">
                <h5 style="font-weight: bold;">ข้อมูลการเรียน</h5>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="student-id">รหัสนักศึกษา :</label>
                        <input type="text" class="form-control" id="student-id" value="<?php echo "$STD_ID"; ?> " disabled>
                    </div>
                    <div class="form-group">
                        <label for="student-level">ระดับชั้น :</label>
                        <input type="text" class="form-control" id="student-level" value="<?php echo "$Classlev_ID"; ?>" disabled>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="department">แผนกวิชา :</label>
                        <input type="text" class="form-control" id="department" value="<?php echo "$Major_ID"; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="class-group">กลุ่มเรียน :</label>
                        <input type="text" class="form-control" id="class-group" value="<?php echo "$Group_ID"; ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <h5 style="font-weight: bold;">ข้อมูลทั่วไป</h5>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="student-name">ชื่อ - นามสกุล :</label>
                        <input type="text" class="form-control" id="student-name" value="<?php echo "$STD_Name"; ?>  <?php echo "$STD_Lastname "; ?> " disabled>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">วันเดือนปีเกิด :</label>
                        <input type="text" class="form-control" id="birthdate" value="<?php echo "$STD_Birth"; ?>" disabled>
                    </div>
                    <div class="form-group d-flex">
                        <label for="address" class=" text-nowrap">ที่อยู่ :</label>
                        <input type="text" class="form-control form mx-2" id="address" style="width: 250px;" value="<?php echo "$STD_Address"; ?>" disabled>
                        <?php
                        $sql_all =
                            "SELECT * FROM std
                        INNER JOIN subdistrict ON std.subdistrict_id = subdistrict.subdistrict_id
                        INNER JOIN district ON subdistrict.district_id = district.district_id
                        INNER JOIN provinces ON district.provinces_id = provinces.provinces_id
                        WHERE std.STD_ID = $STD_ID;";
                        $query_all = mysqli_query($connect, $sql_all);
                        $fetch_all = mysqli_fetch_assoc($query_all);
                        ?>
                        <label for="provinces" class=" text-nowrap">จังหวัด :</label>
                        <!-- <select name="" id="" class=" form-control" style="margin-left: 13px;"></select> -->
                        <input type="text" class="form-control form" name="provinces" id="provinces" style="margin-left: 10px;" value="<?php echo $fetch_all['name_th']; ?>" disabled>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="phone-number">เบอร์โทร :</label>
                        <input type="text" class="form-control" id="phone-number" value="<?php echo "$STD_Phone"; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="parent-name">ชื่อผู้ปกครอง :</label>
                        <input type="text" class="form-control" id="parent-name" value="<?php echo "$Parent_Name"; ?>" disabled>
                    </div>
                    <div class="form-group d-flex">
                        <label for="district" class=" text-nowrap">ตำบล :</label>
                        <!-- <select name="districts" id="districts" class=" form-control" style="margin-left: 13px;"></select> -->
                        <input type="text" class="form-control form " name="districts" id="districts" style="margin-left: 10px;" value="<?php echo $fetch_all['d_name_th']; ?>" disabled>

                        <label for="subdistrict" class=" text-nowrap" style="margin-left: 8px;">อำเภอ :</label>
                        <!-- <select name="subdistricts" id="subdistrict" class=" form-control" style="margin-left: 13px;"></select> -->
                        <input type="text" class="form-control form " name="subdistricts" id="subdistricts" style="margin-left: 10px;" value="<?php echo $fetch_all['s_name_th']; ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="form-group d-flex">
                        <label for="subdistrict" class=" text-nowrap">รหัสไปรษณีย์ :</label>
                        <input type="text" class="form-control form mx-2" name="zipcode" id="zipcode" style="width: 175px;" value="<?php echo $fetch_all['zip_code']; ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <button class="btn btn-success mr-3" onclick="window.location.href = 'EditUser.php';">แก้ไขข้อมูล</button>
                    <button class="btn btn-danger" onclick="window.location.href = 'index.php';">กลับหน้าหลัก</button>
                </div>
            </div>
        </div>
    </div>
</div>