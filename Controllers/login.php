<?php
if(isset($_POST['login'])){
    $STD_ID  = $_POST["STD_ID"];
    $Password = $_POST["Password"];
    if(empty($STD_ID)||empty($Password)){
        echo "โปรดกรอกข้อมูลให้ครบ";
    }else{
        $sql = "SELECT * FROM std WHERE STD_ID ='$STD_ID' AND Password='$Password'";
        $sql_q = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($sql_q);
        echo ($sql);
        if(mysqli_num_rows($sql_q)>0){
            // $_SESSION['STD_ID'] = $STD_ID;
            // $_SESSION["STD_Name"] = $row["STD_Name"];
            // $_SESSION["STD_Lastname"] = $row["STD_Lastname"];
            // $_SESSION["STD_Birth"] = $row["STD_Birth"];
            // $_SESSION["STD_Phone"] = $row["STD_Phone"];
            // $_SESSION["Classlev_ID"] = $row["Classlev_ID"];
            // $_SESSION["Major_ID"] = $row["Major_ID"];
            // $_SESSION["Parent_Name"] = $row["Parent_Name"];
            // $_SESSION["STD_Address"] = $row["STD_Address"];
            // $_SESSION["Group_ID"] = $row["Group_ID"];
            // $_SESSION["provinces_id"] = $row["provinces_id"];
            // $_SESSION["district_id"] = $row["district_id"];
            // $_SESSION["subdistrict_id"] = $row["subdistrict_id"];
            // header("Location: ?page=home");
        }else{
            echo "รหัสผ่านหรือชื่อผู้ใช้งานไม่ถูกต้อง";
        }
    }
}
?>
