<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar_a">
        <a href="?page=User"  title="ข้อมูลผู้ใช้" class="text-white no-underline"> <img src="./public/img/Edituser-W.png" width="50"></a>
        <a href="?page=LeaveHistory" title="ประวัติการลา" class="text-white no-underline "><i class="fas fa-history "></i></a>
        <a href="?page=schedule" title="ตารางเรียน" class="text-white no-underline"> <i class="bi bi-calendar-fill icon-calendar "></i></a>
        <div class="sidebar_logout">
            <a href="login.php" class="text-white no-underline">Logout</a>
        </div>

    </div>
</div>
<script>
    (function() {
    'use strict'
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function(tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
    })
})()
</script>
