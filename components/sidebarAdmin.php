<div class="sidebar" id="sidebar">
    <div class="sidebar_a mb-auto">
        <a href="?page=home" title="หน้าหลัก" class="text-white no-underline" data-bs-toggle="tooltip"><i class="bi bi-house-door-fill custom-icon"></i></a>
        <a href="?page=User" title="ข้อมูลผู้ใช้" class="text-white no-underline" data-bs-toggle="tooltip"> <img src="./public/img/Edituser-W.png" width="50"></a>
        <a href="?page=LeaveHistory" title="ประวัติการลา" class="text-white no-underline" data-bs-toggle="tooltip"><i class="fas fa-history"></i></a>
        <a href="?page=schedule" title="คู่มือการใช้งาน" class="text-white no-underline" data-bs-toggle="tooltip"> <i class="bi bi-book custom-icon"></i></a>
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