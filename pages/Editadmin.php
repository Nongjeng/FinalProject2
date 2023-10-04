<?php
include "./components/navbarAdmin.php";
include "./components/sidebarAdmin.php";
include "./Controllers/Editadmin.php";
$sql = "SELECT * FROM teacher WHERE Teacher_ID ='$Teacher_ID'";
$result = mysqli_query($connect, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
}
?>
<div class="content">
    <div class="card-body">
        <div class="container mt-3">
            <form method="POST" action="">
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
                            <input type="hidden" name="teacherid"  value="<?php echo $row["Teacher_ID"]; ?>">
                            <input type="text" class="form-control" id="teacher-id"  value="<?php echo $row["Teacher_ID"]; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="prefix">คำนำหน้าชื่อ :</label>
                            <input type="text" class="form-control" id="prefix" name="prefix" value="<?php echo $Prefix_Name; ?>" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="teacher-name">ชื่อ :</label>
                            <input type="text" class="form-control" id="teacher-name" name="teacher-name" value="<?php echo $row["Teacher_Name"]; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="teacher-lastname">นามสกุล :</label>
                            <input type="text" class="form-control" id="teacher-lastname" name="teacher-lastname" value="<?php echo $row["Teacher_Lastname"]; ?>" >
                        </div>
                    </div>
                </div>

                <!-- ส่วนของที่อยู่ -->
                <div class="row mt-3">
                    <h5 style="font-weight: bold;">ที่อยู่</h5>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="teacher-address">ที่อยู่ :</label>
                            <textarea class="form-control" id="teacher-address" name="teacher-address" rows="4" ><?php echo $row["Teacher_Address"]; ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- ส่วนของตำแหน่ง -->
                <div class="row mt-3">
                    <h5 style="font-weight: bold;">ตำแหน่ง</h5>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="position">ตำแหน่ง :</label>
                            <input type="text" class="form-control" id="position" name="position" value="<?php echo $Position_Name; ?>" disabled>
                        </div>
                    </div>
                </div>

                <!-- ปุ่มกลับหน้าหลัก และ บันทึกการแก้ไข -->
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <button class="btn btn-success mr-3" type="submit" name="update">บันทึกการแก้ไข</button>
                        <a class="btn btn-danger" href="?page=UserAdmin">กลับหน้าหลัก</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
