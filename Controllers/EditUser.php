    <?php
    if (isset($_POST['update'])) {
        // ดึงค่าที่อัปเดตจากการส่งฟอร์ม
        $updatedSTD_Birth = $_POST['birthdate'];
        $updatedSTD_Address = $_POST['address'];
        $updatedSTD_Phone = $_POST['phone-number'];
        $updatedParent_Name = $_POST['parent-name'];
        $updatePassword = $_POST['password'];
        $updatedProvinces_ID = $_POST['provinces_id']; 
        $updatedDistricts = $_POST['districts'];
        $updatedSubdistricts = $_POST['subdistricts'];
        // อัปเดตค่าในฐานข้อมูล
        $sql = "UPDATE std SET STD_Birth = '$updatedSTD_Birth', STD_Address = '$updatedSTD_Address',
                STD_Phone = '$updatedSTD_Phone', Password = '$updatePassword', Parent_Name = '$updatedParent_Name' , provinces_id = $updatedProvinces_ID,
                district_id = $updatedDistricts, subdistrict_id = $updatedSubdistricts WHERE STD_ID = '$STD_ID'";
        $sql_p = mysqli_query($connect, $sql);
        if ($sql_p) {
            header("Location: ?page=User");
            exit;
        } else {
            echo "Error updating record: " . $sql;
        }
    }
    
    ?>