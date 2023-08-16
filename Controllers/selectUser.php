<?php // ตรวจสอบว่ามีตัวแปรเซสชัน username และ fullname ถูกตั้งค่าหรือไม่
    if (isset($_SESSION["STD_ID"])) {
        $STD_ID = $_SESSION["STD_ID"];
        $STD_Name = $_SESSION["STD_Name"];
        $STD_Lastname = $_SESSION["STD_Lastname"];
        $STD_Birth = $_SESSION["STD_Birth"];
        $STD_Phone = $_SESSION["STD_Phone"];
        $Classlev_ID = $_SESSION["Classlev_ID"];
        $Major_ID = $_SESSION["Major_ID"];
        $Parent_Name = $_SESSION["Parent_Name"];
        $STD_Address = $_SESSION["STD_Address"];
        $Group_ID = $_SESSION["Group_ID"];
        $Provinces_ID = $_SESSION["provinces_id"];
        $District_ID = $_SESSION["district_id"];
        $SubDistrict_ID = $_SESSION["subdistrict_id"];
    } else {
        // ถ้าไม่มีตัวแปรเซสชัน username แสดงว่ายังไม่ได้ล็อกอิน
        echo "กรุณาล็อกอินก่อนใช้งาน!";
    }?>