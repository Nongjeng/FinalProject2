<?php
include "./components/navbarAdmin.php";
include "./components/sidebarAdmin.php";
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="content">
    <div class="col-md-9">
        <!-- เนื้อหาหลัก -->
        <h1 class="text-primary">รายงานการลา</h1>
        <p class="text-muted">นี่คือรายงานการลาของเรา</p>

        <!-- ข้อมูลการลาทั้งหมด -->
        <div class="d-flex flex-row mb-3">
            <!-- การ์ดของวิชาที่ลามากที่สุด -->
            <div class="card flex-grow-1 me-3 bg-primary h-120 w-120">
                <div class="card-body">
                    <h7 class="card-title text-white">วิชาที่ลามากที่สุด</h7>
                    <p class="card-text">วิชา: <span id="mostLeaveSubject"></span></p>
                </div>
            </div>

            <!-- การ์ดของวิชาที่ลาน้อยที่สุด -->
            <div class="card flex-grow-1 me-3 bg-success h-120 w-120">
                <div class="card-body">
                    <h7 class="card-title text-white">วิชาที่ลาน้อยที่สุด</h7>
                    <p class="card-text">วิชา: <span id="leastLeaveSubject"></span></p>
                </div>
            </div>

            <!-- การ์ดของจำนวนการลาทั้งหมดของวัน -->
            <div class="card flex-grow-1 me-3 bg-info h-120 w-120">
                <div class="card-body">
                    <h7 class="card-title text-white">จำนวนการลาทั้งหมดของวัน</h7>
                    <p class="card-text">จำนวน: <span id="totalLeaveDay"></span> วัน</p>
                </div>
            </div>

            <!-- เพิ่มการ์ดของจำนวนการลาทั้งหมดของเดือน -->
            <div class="card flex-grow-1 me-3 bg-warning h-120 w-120">
                <div class="card-body">
                    <h7 class="card-title text-white">จำนวนการลาทั้งหมดของเดือน</h7>
                    <p class="card-text">จำนวน: <span id="totalLeaveMonth"></span> วัน</p>
                </div>
            </div>

            <!-- เพิ่มการ์ดของจำนวนการลาทั้งหมดของปี -->
            <div class="card flex-grow-1 bg-danger h-120 w-120">
                <div class="card-body">
                    <h7 class="card-title text-white">จำนวนการลาทั้งหมดของปี</h7>
                    <p class="card-text">จำนวน: <span id="totalLeaveYear"></span> วัน</p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mb-3">
            <canvas id="pieChart" width="300" height="300"></canvas>

        </div>
    </div>
</div>


<!-- เรียกใช้ Bootstrap JavaScript (Popper.js และ jQuery จำเป็นต้องใช้ด้วย) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const leaveData = {
        labels: ['ลาป่วย', 'ลากิจ'],
        datasets: [{
            data: [20, 10], // จำนวนการลาตามประเภท
            backgroundColor: ['#FF5733', '#33FF57'], // สีของแต่ละส่วน
        }]
    };

    // สร้างแผนภูมิวงกลม
    const pieChart = new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: leaveData,
    });

    // คำนวณวิชาที่ลามากที่สุดและน้อยที่สุด
    let mostLeaveSubject = leaveData[0];
    let leastLeaveSubject = leaveData[0];

    for (const leave of leaveData) {
        if (leave.leaveCount > mostLeaveSubject.leaveCount) {
            mostLeaveSubject = leave;
        }
        if (leave.leaveCount < leastLeaveSubject.leaveCount) {
            leastLeaveSubject = leave;
        }
    }

    // คำนวณจำนวนการลาทั้งหมดของวัน, เดือน, และปี (สมมติว่ามีข้อมูลการลาใน leaveData)
    const today = new Date();
    const currentMonth = today.getMonth() + 1;
    const currentYear = today.getFullYear();

    let totalLeaveDay = 0;
    let totalLeaveMonth = 0;
    let totalLeaveYear = 0;

    for (const leave of leaveData) {
        totalLeaveDay += leave.leaveCount;
        totalLeaveYear += leave.leaveCount;
        // ตรวจสอบว่าการลาอยู่ในเดือนและปีปัจจุบันหรือไม่
        if (leave.leaveMonth === currentMonth && leave.leaveYear === currentYear) {
            totalLeaveMonth += leave.leaveCount;
        }
    }

    // แสดงข้อมูลในรายงาน
    document.getElementById("mostLeaveSubject").textContent = mostLeaveSubject.subject;
    document.getElementById("leastLeaveSubject").textContent = leastLeaveSubject.subject;
    document.getElementById("totalLeaveDay").textContent = totalLeaveDay;
    document.getElementById("totalLeaveMonth").textContent = totalLeaveMonth;
    document.getElementById("totalLeaveYear").textContent = totalLeaveYear;
</script>