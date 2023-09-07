<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<body>
    <?php
    require_once "./components/navbar.php";
    require_once "./components/sidebar.php";
    ?>
    <div class="content">
        <h1>ตารางเรียน</h1>
        <table>
            <tr>
                <th>วัน</th>
                <th>เวลา</th>
                <th>วิชา</th>
            </tr>
            <tr>
                <td>จันทร์</td>
                <td>08:00 - 10:00</td>
                <td>คณิตศาสตร์</td>
            </tr>
            <tr>
                <td>อังคาร</td>
                <td>13:00 - 15:00</td>
                <td>วิทยาศาสตร์</td>
            </tr>
            <tr>
                <td>พุธ</td>
                <td>10:00 - 12:00</td>
                <td>ภาษาอังกฤษ</td>
            </tr>
            <!-- เพิ่มแถวตามตารางเรียนของคุณ -->
        </table>
    </div>