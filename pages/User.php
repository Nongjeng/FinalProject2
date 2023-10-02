<?php
include "./components/navbar.php";
include "./components/sidebar.php";

?>
<div class="content">
    <div class="card-body">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">ข้อมูลส่วนตัว</h1>
                </div>
            </div>
            <?php
            $std_sql = "SELECT std.STD_ID,
                std.Prefix_ID,
                std.STD_Name,
                std.STD_Lastname,
                std.STD_Birth,
                std.STD_Phone,
                class_level.Classlev_Name,
                department.Departmetn_Name,
                std.Parent_Name,
                std.STD_Address,
                std.Group_ID,
                major.Major_Name,
                std.Password
                FROM `std`
                left join class_level on std.Classlev_ID = class_level.Classlev_ID
                left join groups on std.Group_ID = groups.Group_ID
                left join major on groups.Major_ID = major.Major_ID
                left join department on major.Department_ID = department.Department_ID
                WHERE std.STD_ID = '$STD_ID'";
            $std_q = mysqli_query($connect, $std_sql);
            $std_fa = mysqli_fetch_assoc($std_q);
            ?>
            <div class="card shadow bg-200 mt-2 rounded-4">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="d-flex align-items-center text-nowrap">
                            <div class="spinner-grow" role="status" style="width: 1rem;height: 1rem;">
                            </div>
                            <h5 class="px-2" style="font-weight: bold;">ข้อมูลการเรียน</h5>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="student-id">รหัสนักศึกษา :</label>
                                <input type="text" class="form-control" id="student-id" value="<?= $std_fa['STD_ID'] ?>" disabled>
                            </div>
                            <div class="form-group mt-2">
                                <label for="student-level">ระดับชั้น :</label>
                                <input type="text" class="form-control" id="student-level" value="<?= $std_fa['Classlev_Name'] ?>" disabled>
                            </div>
                            <div class="form-group mt-2">
                                <label for="student-level">รหัสผ่าน :</label>
                                <input type="text" class="form-control" id="password" value="<?= $std_fa['Password'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="department">แผนกวิชา :</label>
                                <input type="text" class="form-control" id="department" value="<?= $std_fa['Departmetn_Name'] ?>" disabled>
                            </div>
                            <div class="form-group mt-2">
                                <label for="class-group">กลุ่มเรียน :</label>
                                <input type="text" class="form-control" id="class-group" value="<?php echo $std_fa['Group_ID'] . " " . $std_fa['Major_Name'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadaow bg-200 mt-4 rounded-4">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="d-flex align-items-center text-nowrap">
                            <div class="spinner-grow" role="status" style="width: 1rem;height: 1rem;">
                            </div>
                            <h5 class="px-2" style="font-weight: bold;">ข้อมูลทั้วไป</h5>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="student-name">ชื่อ - นามสกุล :</label>
                                <input type="text" class="form-control" id="student-name" value="<?php echo "$STD_Name"; ?>  <?php echo "$STD_Lastname "; ?> " disabled>
                            </div>
                            <div class="form-group mt-2">
                                <label for="birthdate">วันเดือนปีเกิด :</label>
                                <input type="text" class="form-control" id="birthdate" value="<?php echo "$STD_Birth"; ?>" disabled>
                            </div>
                            <div class="form-group d-flex mt-3">
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
                            <div class="form-group mt-2">
                                <label for="parent-name">ชื่อผู้ปกครอง :</label>
                                <input type="text" class="form-control" id="parent-name" value="<?php echo "$Parent_Name"; ?>" disabled>
                            </div>
                            <div class="form-group d-flex mt-3">
                                <label for="district" class=" text-nowrap">อำเภอ :</label>
                                <!-- <select name="districts" id="districts" class=" form-control" style="margin-left: 13px;"></select> -->
                                <input type="text" class="form-control form " name="districts" id="districts" style="margin-left: 10px;" value="<?php echo $fetch_all['d_name_th']; ?>" disabled>

                                <label for="subdistrict" class=" text-nowrap" style="margin-left: 8px;">ตำบล :</label>
                                <!-- <select name="subdistricts" id="subdistrict" class=" form-control" style="margin-left: 13px;"></select> -->
                                <input type="text" class="form-control form " name="subdistricts" id="subdistricts" style="margin-left: 10px;" value="<?php echo $fetch_all['s_name_th']; ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group d-flex mt-3">
                                <label for="subdistrict" class=" text-nowrap">รหัสไปรษณีย์ :</label>
                                <input type="text" class="form-control form mx-2" name="zipcode" id="zipcode" style="width: 175px;" value="<?php echo $fetch_all['zip_code']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <button class="btn btn-success mr-3" onclick="window.location.href = '?page=EditUser';">แก้ไขข้อมูล</button>
                    <button class="btn btn-danger" onclick="window.location.href = '?page=home';">กลับหน้าหลัก</button>
                </div>
            </div>
        </div>
    </div>
</div>