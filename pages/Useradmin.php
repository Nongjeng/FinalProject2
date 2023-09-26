<?php
include "./components/navbarAdmin.php";
include "./components/sidebarAdmin.php";
?>
<div class="content">
    <div class="card-body">
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">ข้อมูลส่วนตัว</h1>
                </div>
            </div>
            <div class="row mt-3">
                <h5 style="font-weight: bold;">ข้อมูลครู</h5>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="teacher-id">รหัสครู :</label>
                        <input type="text" class="form-control" id="teacher-id" value="<?php echo $Teacher_ID; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="prefix">คำนำหน้าชื่อ :</label>
                        <input type="text" class="form-control" id="prefix" value="<?php echo $Prefix_ID; ?>" disabled>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="teacher-name">ชื่อ :</label>
                        <input type="text" class="form-control" id="teacher-name" value="<?php echo $Teacher_Name; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="teacher-lastname">นามสกุล :</label>
                        <input type="text" class="form-control" id="teacher-lastname" value="<?php echo $Teacher_Lastname; ?>" disabled>
                    </div>
                </div>
            </div>

            <!-- ส่วนของที่อยู่ -->
            <div class="row mt-3">
                <h5 style="font-weight: bold;">ที่อยู่</h5>
                <div class="col-12">
                    <div class="form-group">
                        <label for="teacher-address">ที่อยู่ :</label>
                        <textarea class="form-control" id="teacher-address" rows="4" disabled><?php echo $Teacher_Address; ?></textarea>
                    </div>
                </div>
            </div>

            <!-- ส่วนของตำแหน่ง -->
            <div class="row mt-3">
                <h5 style="font-weight: bold;">ตำแหน่ง</h5>
                <div class="col-12">
                    <div class="form-group">
                        <label for="position">ตำแหน่ง :</label>
                        <input type="text" class="form-control" id="position" value="<?php echo $Position_ID; ?>" disabled>
                    </div>
                </div>
            </div>

            <!-- ปุ่มกลับหน้าหลัก -->
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <button class="btn btn-success mr-3" onclick="window.location.href = '?page=EditUser';">แก้ไขข้อมูล</button>
                    <button class="btn btn-danger" onclick="window.location.href = '?page=homeadmin';">กลับหน้าหลัก</button>
                </div>
            </div>
        </div>
    </div>
</div>