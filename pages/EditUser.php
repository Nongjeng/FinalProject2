<?php
include "./components/navbar.php";
include "./components/sidebar.php";
include_once "./Controllers/EditUser.php";
?>
<div class="content">
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">ข้อมูลส่วนตัว</h1>
            </div>
        </div>
        <form method="post">
            <div class="row mt-3">
                <h5 style="font-weight: bold;">ข้อมูลการเรียน</h5>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="student-id">รหัสนักศึกษา :</label>
                        <input type="text" class="form-control" id="student-id" name="student-id" value="<?php echo "$STD_ID"; ?> " disabled>
                    </div>
                    <div class="form-group">
                        <label for="student-level">ระดับชั้น :</label>
                        <input type="text" class="form-control" id="student-level" name="student-level" value="<?php echo "$Classlev_ID"; ?>" disabled>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="department">แผนกวิชา :</label>
                        <input type="text" class="form-control" id="department" name="department" value="<?php echo "$Major_ID"; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="class-group">กลุ่มเรียน :</label>
                        <input type="text" class="form-control" id="class-group" name="class-group" value="<?php echo "$Group_ID"; ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <h5 style="font-weight: bold;">ข้อมูลทั่วไป</h5>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="student-name">ชื่อ - นามสกุล :</label>
                        <input type="text" class="form-control" id="student-name" name="student-name" value="<?php echo "$STD_Name"; ?>  <?php echo "$STD_Lastname "; ?> " disabled>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">วันเดือนปีเกิด :</label>
                        <input type="text" class="form-control" id="birthdate" name="birthdate" value="<?php echo "$STD_Birth"; ?>">
                    </div>
                    <div class="form-group d-flex">
                        <label for="address" class=" text-nowrap">ที่อยู่ :</label>
                        <input type="text" class="form-control form mx-2" id="address" name="address" style="width: 250px;" value="<?php echo "$STD_Address"; ?>">

                        <label for="provinces1_id" class=" text-nowrap">จังหวัด :</label>
                        <?php
                        $sql_all =
                            "SELECT * FROM std
                        INNER JOIN subdistrict ON std.subdistrict_id = subdistrict.subdistrict_id
                        INNER JOIN district ON subdistrict.district_id = district.district_id
                        INNER JOIN provinces ON district.provinces_id = provinces.provinces_id
                        WHERE std.STD_ID = $STD_ID;";
                        $query_all = mysqli_query($connect, $sql_all);
                        $fetch_all = mysqli_fetch_assoc($query_all);

                        $sql_provinces = "SELECT * FROM provinces";
                        $sql_provinces_q = mysqli_query($connect, $sql_provinces);

                        $sql_district = "SELECT * FROM district WHERE provinces_id=$Provinces_ID";
                        $sql_district_q = mysqli_query($connect, $sql_district);

                        $sql_subdistrict = "SELECT * FROM subdistrict WHERE district_id=$District_ID";
                        $sql_subdistrict_q = mysqli_query($connect, $sql_subdistrict);
                        ?>
                        <select name="provinces1_id" id="provinces" class="form-control">
                            <option value="<? echo $Provinces_ID ?>" selected><?php echo $fetch_all['name_th']; ?></option>
                            <?php foreach ($sql_provinces_q as $data) { ?>
                                <option value="<?= $data['provinces_id'] ?>"><?= $data['name_th'] ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="phone-number">เบอร์โทร :</label>
                        <input type="text" class="form-control" id="phone-number" name="phone-number" value="<?php echo "$STD_Phone"; ?>">
                    </div>
                    <div class="form-group">
                        <label for="parent-name">ชื่อผู้ปกครอง :</label>
                        <input type="text" class="form-control" id="parent-name" name="parent-name" value="<?php echo "$Parent_Name"; ?>">
                    </div>
                    <div class="form-group d-flex">
                        <label for="district" class=" text-nowrap">ตำบล :</label>
                        <select name="districts" id="districts" class=" form-control" style="margin-left: 13px;">
                            <option value="<?php echo $fetch_all['district_id']; ?>" selected ><?php echo $fetch_all['d_name_th']; ?></option>
                            <?php foreach ($sql_district_q as $data2) { ?>
                                <option value="<?= $data2['district_id'] ?>"><?= $data2['d_name_th'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="subdistrict" class=" text-nowrap" style="margin-left: 8px;">อำเภอ :</label>
                        <select name="subdistricts" id="subdistricts" class=" form-control" style="margin-left: 13px;">
                            <option value="<?php echo $fetch_all['subdistrict_id']; ?>" selected ><?php echo $fetch_all['s_name_th']; ?></option>
                            <?php foreach ($sql_subdistrict_q as $data3) { ?>
                                <option value="<?= $data3['subdistrict_id'] ?>"><?= $data3['s_name_th'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="form-group d-flex">
                        <label for="subdistrict" class=" text-nowrap">รหัสไปรษณีย์ :</label>
                        <input type="text" class="form-control form mx-2" name="zipcode" id="zipcode" style="width: 175px;" value="<?php echo $fetch_all['zip_code'] ?>">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <button class="btn btn-success mr-3" type="submit" name="update">บันทึกการแก้ไข</button>
                    <a class="btn btn-danger" href="?page=User">ยกเลิกการแก้ไข</a>
                </div>
            </div>
        </form>
    </div>
</div>