<?php
if (isset($_POST['login'])) {
    $STD_ID = $_POST["STD_ID"];
    $Password = $_POST["Password"];
    $_SESSION['STD_ID'] = $STD_ID;

    $sql = "SELECT * FROM std WHERE STD_ID ='$STD_ID' AND Password='$Password'";
    $sql_q = mysqli_query($connect, $sql);

    if (!$sql_q) {
        echo "มีข้อผิดพลาดในการคิวรี: " . mysqli_error($connect);
    } else {
        $num_rows = mysqli_num_rows($sql_q);

        if ($num_rows == 1) {
            echo '<script>
            Swal.fire({
              icon: "success",
              title: "เข้าสู่ระบบสำเร็จ",
              text: "ยินดีต้อนรับเข้าสู่ระบบ"
            }).then(function() {
              window.location.href = "?page=home";
            });
          </script>';
        } else {
            echo '<script>
            Swal.fire({
              icon: "error",
              title: "เกิดข้อผิดพลาด",
              text: "รหัสผ่านหรือชื่อผู้ใช้งานไม่ถูกต้อง"
            }).then(function() {
              window.location.href = "?page=login";
            });
          </script>';

        }
    }
}
