<?php
if(isset($_POST['login'])){
    $Username  = $_POST["Username"];
    $Password = $_POST["Password"];
    $_SESSION['Username'] = $Username;

    $sql = "SELECT * FROM teacher WHERE Teacher_ID ='$Username' AND Password='$Password'";
    $sql_q = mysqli_query($connect,$sql);
    if (!$sql_q) {
        echo "รหัสผ่านหรือชื่อผู้ใช้งานไม่ถูกต้อง";
    }else{
        header("Location: ?page=homeadmin");
        }
    }
?>
