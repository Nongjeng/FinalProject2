<?php
include "./components/navbarAdmin.php";
include "./components/sidebarAdmin.php";
$currentDate = date('Y-m-d');
// สร้างวันที่เริ่มต้นของปีปัจจุบัน
$startOfYear = date('Y-01-01', strtotime($currentDate));

// สร้างวันที่สิ้นสุดของปีปัจจุบัน
$endOfYear = date('Y-12-31', strtotime($currentDate));

// ส่งคำสั่ง SQL เพื่อคำนวณจำนวนใบลาทั้งหมดของปีปัจจุบัน
$query_leave_this_year = "SELECT COUNT(*) AS leave_count FROM leaves WHERE write_date BETWEEN '$startOfYear' AND '$endOfYear'";
$result_leave_this_year = mysqli_query($connect, $query_leave_this_year);

// ดึงข้อมูลจากคำสั่ง SQL
$row_leave_this_year = mysqli_fetch_assoc($result_leave_this_year);

// แสดงผลจำนวนใบลาทั้งหมดของปีปัจจุบัน
$leaveCountThisYear = isset($row_leave_this_year['leave_count']) ? $row_leave_this_year['leave_count'] : 0;



// สร้างวันที่เริ่มต้นของเดือนปัจจุบัน
$startOfMonth = date('Y-m-01', strtotime($currentDate));

// สร้างวันที่สิ้นสุดของเดือนปัจจุบัน
$endOfMonth = date('Y-m-t', strtotime($currentDate));

// ส่งคำสั่ง SQL เพื่อคำนวณจำนวนใบลาทั้งหมดของเดือนปัจจุบัน
$query_leave_this_month = "SELECT COUNT(*) AS leave_count FROM leaves WHERE write_date BETWEEN '$startOfMonth' AND '$endOfMonth'";
$result_leave_this_month = mysqli_query($connect, $query_leave_this_month);

// ดึงข้อมูลจากคำสั่ง SQL
$row_leave_this_month = mysqli_fetch_assoc($result_leave_this_month);

// แสดงผลจำนวนใบลาทั้งหมดของเดือนปัจจุบัน
$leaveCountThisMonth = isset($row_leave_this_month['leave_count']) ? $row_leave_this_month['leave_count'] : 0;




// ส่งคำสั่ง SQL เพื่อคำนวณจำนวนใบลาทั้งหมดของวันนี้
$query_leave_today = "SELECT COUNT(*) AS leave_count FROM leaves WHERE write_date = '$currentDate'";
$result_leave_today = mysqli_query($connect, $query_leave_today);

// ดึงข้อมูลจากคำสั่ง SQL
$row_leave_today = mysqli_fetch_assoc($result_leave_today);

// แสดงผลจำนวนใบลาทั้งหมดของวันนี้
$leaveCountToday = isset($row_leave_today['leave_count']) ? $row_leave_today['leave_count'] : 0;


// ส่งคำสั่ง SQL เพื่อคำนวณจำนวนการลาทั้งหมดของวิชาที่มากที่สุด
$query_most_leave_subject = "SELECT s.Subject_Name, COUNT(ld.Leave_ID) AS leave_count
                             FROM subject AS s
                             INNER JOIN leave_detail AS ld ON s.Subject_ID = ld.Subject_ID
                             GROUP BY s.Subject_Name
                             ORDER BY leave_count DESC
                             LIMIT 1";

$result_most_leave_subject = mysqli_query($connect, $query_most_leave_subject);

// ดึงข้อมูลวิชาที่มีการลามากที่สุด
$row_most_leave_subject = mysqli_fetch_assoc($result_most_leave_subject);

// ส่งคำสั่ง SQL เพื่อคำนวณจำนวนการลาทั้งหมดของวิชาที่น้อยที่สุด
$query_least_leave_subject = "SELECT s.Subject_Name, COUNT(ld.Leave_ID) AS leave_count
                             FROM subject AS s
                             INNER JOIN leave_detail AS ld ON s.Subject_ID = ld.Subject_ID
                             GROUP BY s.Subject_Name
                             ORDER BY leave_count ASC
                             LIMIT 1";

$result_least_leave_subject = mysqli_query($connect, $query_least_leave_subject);

// ดึงข้อมูลวิชาที่มีการลาน้อยที่สุด
$row_least_leave_subject = mysqli_fetch_assoc($result_least_leave_subject);

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="content">
    <div class="col-md-9 mt-5">
        <div class="d-flex flex-row mb-3">
            <!-- การ์ดของวิชาที่ลามากที่สุด -->
            <div class="card flex-grow-1 me-3 bg-primary h-120 w-120">
                <div class="card-body">
                    <h7 class="card-title text-white">วิชาที่ลามากที่สุด</h7>
                    <p class="card-text">วิชา: <span id="mostLeaveSubject"><?php echo $row_most_leave_subject['Subject_Name']; ?></span></p>
                    <p class="card-text">จำนวน: <?php echo $row_most_leave_subject['leave_count']; ?> ครั้ง</p>
                </div>
            </div>

            <!-- การ์ดของวิชาที่ลาน้อยที่สุด -->
            <div class="card flex-grow-1 me-3 bg-success h-120 w-120">
                <div class="card-body">
                    <h7 class="card-title text-white">วิชาที่ลาน้อยที่สุด</h7>
                    <p class="card-text">วิชา: <span id="leastLeaveSubject"><?php echo $row_least_leave_subject['Subject_Name']; ?></span></p>
                    <p class="card-text">จำนวน: <?php echo $row_least_leave_subject['leave_count']; ?> ครั้ง</p>
                </div>
            </div>

            <!-- การ์ดของจำนวนการลาทั้งหมดของวัน -->
            <div class="card flex-grow-1 me-3 bg-info h-120 w-120">
                <div class="card-body">
                    <h7 class="card-title text-white">จำนวนการลาทั้งหมดของวัน</h7>
                    <p class="card-text">จำนวน: <span id="totalLeaveDay"><?php echo $leaveCountToday; ?></span>ครั้ง</p>
                </div>
            </div>

            <!-- เพิ่มการ์ดของจำนวนการลาทั้งหมดของเดือน -->
            <div class="card flex-grow-1 me-3 bg-warning h-120 w-120">
                <div class="card-body">
                    <h7 class="card-title text-white">จำนวนการลาทั้งหมดของเดือน</h7>
                    <p class="card-text">จำนวน: <span id="totalLeaveMonth"><?php echo $leaveCountThisMonth; ?></span> ครั้ง</p>
                </div>
            </div>

            <!-- เพิ่มการ์ดของจำนวนการลาทั้งหมดของปี -->
            <div class="card flex-grow-1 bg-danger h-120 w-120">
                <div class="card-body">
                    <h7 class="card-title text-white">จำนวนการลาทั้งหมดของปี</h7>
                    <p class="card-text">จำนวน: <span id="totalLeaveYear"><?php echo $leaveCountThisYear; ?></span>ครั้ง</p>
                </div>
            </div>
        </div>

        <div class="d-flex flex-row mb-3">
            <canvas id="pieChart" width="500" height="500"></canvas>
        </div>

    </div>
</div>
<?php
// ส่งคำสั่ง SQL เพื่อดึงข้อมูลวิชาที่มีการลามากที่สุด




$query = "SELECT lt.leave_type_name, COUNT(*) AS leave_count
          FROM leaves AS l
          INNER JOIN leave_type AS lt ON l.leave_type_id = lt.leave_type_id
          GROUP BY lt.leave_type_name";
$result = mysqli_query($connect, $query);

// สร้างอาร์เรย์เพื่อเก็บข้อมูลการลาแต่ละประเภท
$leaveData = [];
while ($row = $result->fetch_assoc()) {
    $leaveData[$row['leave_type_name']] = $row['leave_count'];
}

?>

<!-- เรียกใช้ Bootstrap JavaScript (Popper.js และ jQuery จำเป็นต้องใช้ด้วย) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ใช้ข้อมูลจากฐานข้อมูลในการสร้างแผนภูมิ
    const leaveData = <?php echo json_encode($leaveData); ?>;

    // สร้างแผนภูมิวงกลม
    const pieChart = new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: Object.keys(leaveData),
            datasets: [{
                data: Object.values(leaveData),
                backgroundColor: ['#FF5733', '#33FF57', '#5733FF', '#FF33F5'], // สีของแต่ละส่วน
            }]
        },
        options: {
            responsive: false,
        }
    });
</script>