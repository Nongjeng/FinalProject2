<?php
include "./Controllers/conncet.php";
include "./Controllers/dateThai.php";

//for user.php and editUser.php
if (isset($_POST['function']) && $_POST['function'] == 'provinces'){
    $provinces_id = $_POST['provinces_id'];
    $sql = "SELECT * from district WHERE provinces_id=$provinces_id order by d_name_th";
    $query = mysqli_query($connect, $sql);
    echo '<option selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach($query as $data){
        echo '<option value="'.$data['district_id'].'">'.$data['d_name_th'].'</option>';
    }
}
if (isset($_POST['function']) && $_POST['function'] == 'districts'){
    $district_id = $_POST['district_id'];
    $sql = "SELECT * from subdistrict WHERE district_id=$district_id order by s_name_th";
    $query = mysqli_query($connect, $sql);
    echo '<option selected disabled>-กรุณาเลือกอำเภอ-</option>';
    foreach($query as $data){
        echo '<option value="'.$data['subdistrict_id'].'">'.$data['s_name_th'].'</option>';
    }
}
if (isset($_POST['function']) && $_POST['function'] == 'subdistricts'){
    $subdistrict_id = $_POST['subdistrict_id'];
    $sql = "SELECT * from subdistrict WHERE subdistrict_id=$subdistrict_id";
    $query = mysqli_query($connect, $sql);
    $result = mysqli_fetch_assoc($query);
    echo $result['zip_code'];
}

// for show subject in index.php
if (isset($_POST['function']) && $_POST['function'] == 'startdate') {
    $studentDataJSON = $_POST['studentData'];
    $studentData = json_decode($studentDataJSON, true);

    $Group_id = $studentData['Group_ID'];
    $startdate_id = $_POST['startdate_id'];

    $sql_check_date = "SELECT sc.schedule_id, sc.Semester_ID, se.Start_semester, se.End_semester, sc.group_id from schedules sc
                       Inner join semester se on sc.Semester_ID = se.Semester_ID
                       Inner join groups g on sc.Group_ID = g.Group_ID
                       WHERE g.Group_ID = '$Group_id'";

    $query_check_date = mysqli_query($connect, $sql_check_date);
    $fa_check_date = mysqli_fetch_assoc($query_check_date);

    $schedule_id = $fa_check_date['schedule_id'];
    $start_semester = $fa_check_date['Start_semester'];
    $end_semester = $fa_check_date['End_semester'];

    if ($startdate_id < $start_semester or $startdate_id > $end_semester) {
        echo "กรุณากรอกวันที่ภายในเทอมที่เรียนเท่านั้น";
        echo "<br>";
        echo "เริ่มลาได้ตั้งแต่",$start_semester,"ถึง",$end_semester;
    } else {
        // Convert the selected date to Thai day of the week using your existing function
        $thaiDateString = date("d-M-Y", strtotime($startdate_id));
        $thaiDayOfWeek = checkDays(strtotime($startdate_id));


        // Perform the SQL query to fetch schedule data
        $sql = "SELECT sd.Schedule_id, sd.Subject_ID, s.Subject_Name, d.Day_name, sb.SB_ID, sb.SB_time
        FROM `schedule_detail` sd
        INNER JOIN subject s ON sd.Subject_ID = s.Subject_ID
        INNER JOIN days d ON sd.Day_ID = d.Day_ID
        INNER JOIN study_block sb ON sd.SB_ID = sb.SB_ID
        WHERE sd.Schedule_id = '$schedule_id' And d.Day_name LIKE '%$thaiDayOfWeek%'
        ORDER BY d.Day_ID , sb.SB_ID";

        $result = mysqli_query($connect, $sql);

        // Generate the HTML for the schedule table
        if (mysqli_num_rows($result) > 0) {
            echo $thaiDayOfWeek . ' ที่ ' . $thaiDateString;
            echo '<table class"table">
        <thead>
            <tr>
                <td class=" fw-medium">รหัสวิชา</td>
                <td class=" fw-medium">ชื่อวิชา</td>
                <td class=" fw-medium">เวลา</td>
                <td class=" fw-medium text-center">เลือกวิชาที่จะลา</td>
            </tr>
        </thead>
        <tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['Subject_ID'] . '</td>';
                echo '<td style="width: 330px">' . $row['Subject_Name'] . '</td>';
                echo '<td>' . $row['SB_time'] . '</td>';
                echo '<input type="hidden" name="selected_subject_sb_id[]" value="' . $row['SB_ID'] . '">';
                echo '<td class="text-center" ><input class="form-check-input" type="checkbox" name="selected_subject[]" id="selected_subject" value="' . $row['Subject_ID'] . '"></td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
            $selectedDays[] = $thaiDayOfWeek;
            echo '<input type="hidden" name="selectedDays[]" value="<?php echo $selectedDays; ?>">';
        } else {
            // Handle the case where there are no results.
            echo 'ไม่มีข้อมูลตารางเรียน';
        }
    }
}

if (isset($_POST['function']) && $_POST['function'] == 'enddate') {
    $studentDataJSON = $_POST['studentData'];
    $studentData = json_decode($studentDataJSON, true);

    $Group_id = $studentData['Group_ID'];

    $startdate_id = $_POST['startdate_id'];
    $enddate_id = $_POST['enddate_id'];

    $sql_check_date = "SELECT sc.schedule_id, sc.Semester_ID, se.Start_semester, se.End_semester, sc.group_id from schedules sc
    Inner join semester se on sc.Semester_ID = se.Semester_ID
    Inner join groups g on sc.Group_ID = g.Group_ID
    WHERE g.Group_ID = '$Group_id'";

    $query_check_date = mysqli_query($connect, $sql_check_date);
    $fa_check_date = mysqli_fetch_assoc($query_check_date);

    $schedule_id = $fa_check_date['schedule_id'];
    $start_semester = $fa_check_date['Start_semester'];
    $end_semester = $fa_check_date['End_semester'];

    if ($startdate_id < $start_semester or $enddate_id < $start_semester or $startdate_id > $end_semester or $enddate_id > $end_semester) {
        echo "กรุณากรอกวันที่ภายในเทอมที่เรียนเท่านั้น";
    } else {
        $Starttimestamp = strtotime($startdate_id);
        $thaiDateString = date("d-M-Y", $Starttimestamp);

        $Daybetween = countDays($startdate_id, $enddate_id);

        // Perform the SQL query and display schedule data for each day
        for ($count = 0; $count <= $Daybetween; $count++) {
            $thaiDayOfWeek = checkDays(strtotime($thaiDateString));

            $testsql = "SELECT sd.Subject_ID, s.Subject_Name, d.Day_name, sd.SB_ID, sb.SB_time FROM `schedule_detail` sd 
                        INNER JOIN subject s ON sd.Subject_ID = s.Subject_ID
                        INNER JOIN days d ON sd.Day_ID = d.Day_ID
                        INNER JOIN study_block sb ON sd.SB_ID = sb.SB_ID
                        WHERE d.Day_name LIKE '%$thaiDayOfWeek%' 
                        ORDER BY d.Day_ID, sb.SB_ID;";
            $testquery = mysqli_query($connect, $testsql);

            if (mysqli_num_rows($testquery) > 0) {
                // Generate the HTML for the schedule table
                echo $thaiDayOfWeek . ' ที่ ' . $thaiDateString;
                echo '<table class"table">
                <thead>
                    <td class=" fw-medium">รหัสวิชา</td>
                    <td class=" fw-medium">ชื่อวิชา</td>
                    <td class=" fw-medium">เวลา</td>
                    <td class=" fw-medium text-center">เลือกวิชาที่จะลา</td>
                </thead>
                <tbody>';

                while ($row = mysqli_fetch_assoc($testquery)) {
                    echo '<tr>';
                    echo '<td>' . $row['Subject_ID'] . '</td>';
                    echo '<td style="width: 330px">' . $row['Subject_Name'] . '</td>';
                    echo '<td>' . $row['SB_time'] . '</td>';
                    echo '<input type="hidden" name="selected_subject_sb_id[]" value="' . $row['SB_ID'] . '">';
                    echo '<td class="text-center""><input class="form-check-input" type="checkbox" name="selected_subject[]" value="' . $row['Subject_ID'] . '"></td>';
                    echo '</tr>';
                }
                $selectedDays[] = $thaiDayOfWeek;
                echo '<input type="hidden" name="selectedDays[]" value="<?php echo $selectedDays; ?>">';
                
                $thaiDateString = date("d-M-Y", strtotime($thaiDateString . "+1 days"));
                echo '</tbody></table><br>';
            } else {
                $thaiDateString = date("d-M-Y", strtotime($thaiDateString . "+1 days"));
            }
        }
    }
}

if (isset($_POST['leave_id'])) {
    $leave_id = $_POST['leave_id'];

    // ทำการอัปเดตฐานข้อมูล
    $update_status = "UPDATE leaves SET leave_status_id = 'LS03' WHERE leave_id = '$leave_id'";
    $query = mysqli_query($connect, $update_status);

    if ($query) {
        echo 'success';
    } else {
        echo 'error';
    }
}

?>