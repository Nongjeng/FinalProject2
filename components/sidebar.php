<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidebar_com.css">
</head>

<body>
    <?php require_once "./Controllers/conncet.php";?>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar_a" >
            <a href="User.php" class="text-white no-underline"> <img src="./public/img/Edituser-W.png" width="50"> ข้อมูลผู้ใช้</a>
            <a href="LeaveHistory.php" class="text-white no-underline "><i class="fas fa-history "></i> ประวัติการลา</a>
            <a href="schedule.php" class="text-white no-underline"> <i class="bi bi-calendar-fill icon-calendar "></i> ตารางเรียน</a>
            <div class="sidebar_logout" >
            <a href="login.php" class="text-white no-underline">Logout</a>
            </div>
            
        </div>
    </div>
</body>

</html>