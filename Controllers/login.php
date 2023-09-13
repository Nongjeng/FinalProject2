<?php
if(isset($_POST['login'])){
    $STD_ID  = $_POST["STD_ID"];
    $Password = $_POST["Password"];
    $_SESSION['STD_ID'] = $STD_ID;

    $sql = "SELECT * FROM std WHERE STD_ID ='$STD_ID' AND Password='$Password'";
    $sql_q = mysqli_query($connect,$sql);
    if (!$sql_q) {
        echo "รหัสผ่านหรือชื่อผู้ใช้งานไม่ถูกต้อง";
    }else{
        header("Location: ?page=home");
        }
    }
?>
