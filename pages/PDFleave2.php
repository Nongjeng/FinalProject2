<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="./public/Css/RT.css">
</head>

<body>

    <?php
    include "./components/navbarAdmin.php";
    require_once "./Controllers/dateThai.php";

    if (isset($_GET['leave_id'])) {
        $leaveId = $_GET['leave_id'];
        $sqCL = "SELECT * from leaves WHERE leave_id  = '$leaveId'";
        $q_sqCL = mysqli_query($connect, $sqCL);
        $row = mysqli_fetch_array($q_sqCL);
        $STD_ID = $row['std_id'];
    }
    ?>

    <style>
        ::-webkit-scrollbar {
            height: 0;
            width: 0;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .container {
                width: 100%;
                margin: 0;
                padding: 0;
            }

            .content {
                page-break-before: always;
                margin: 0;
                padding: 0;
            }
        }

        * {
            font-size: 14.7px;
        }
    </style>

    <div class="content" style="font-family: 'Sarabun';font-size: 14.7px;">
        <div class="card shadow" id="printLeave">
            <style>
                @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
                @import url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css');

                @media print {
                    body {
                        margin: 0;
                        padding: 0;
                    }

                    .container {
                        width: 100%;
                        margin: 0;
                        padding: 0;
                    }

                    .content {
                        page-break-before: always;
                        margin: 0;
                        padding: 0;
                    }
                }

                * {
                    font-size: 14.7px;
                }
            </style>
            <div class="*card-body">
                <div class="container">
                    <div style="font-size: 1rem;">
                        <div class="d-flex justify-content-end mt-1 w-100">
                            <?php
                            $sql_STD = "SELECT
                                subdistrict.s_name_th,
                                district.d_name_th,
                                provinces.name_th,
                                prefix.Prefix_Name,
                                std.STD_Name,
                                std.STD_Lastname,
                                class_level.Classlev_Name,
                                groups.Group_Name,
                                teacher.Teacher_Name,
                                teacher.Teacher_Lastname,
                                department.Departmetn_Name,
                                std.STD_ID,
                                std.Parent_Name,
                                std.STD_Address
                            from std
                            left join prefix on std.Prefix_ID = prefix.Prefix_ID
                            left join provinces on std.provinces_id = provinces.provinces_id
                            left join district on std.district_id = district.district_id
                            left join subdistrict on std.subdistrict_id = subdistrict.subdistrict_id
                            left join class_level on std.Classlev_ID = class_level.Classlev_ID
                            left join groups on std.Group_ID = groups.Group_ID
                            left join major on groups.Major_ID = major.Major_ID
                            left join department on major.Department_ID = department.Department_ID
                            left join teacher on groups.teacher_id = teacher.teacher_id
                            WHERE std.std_id = '$STD_ID'";
                            $q_STD = mysqli_query($connect, $sql_STD);
                            $fa_STD = mysqli_fetch_assoc($q_STD);

                            $sql_leave = "SELECT
                            leaves.leave_type_id,
                            leave_type.leave_type_name,
                            leaves.leave_comment,
                            study_block.SB_time,
                            leaves.write_date,
                            leaves.start_leave_date,
                            leaves.end_leave_date,
                            leaves.parent_comment,
                            leaves.teacher_comment
                        from leaves
                        left join leave_type on leaves.leave_type_id = leave_type.leave_type_id
                        left join leave_status on leaves.leave_status_id = leave_status.leave_status_id
                        left join leave_detail on leaves.leave_id = leave_detail.leave_id
                        left join study_block on leave_detail.sb_id = study_block.SB_ID
                        left join subject on leave_detail.subject_id = subject.Subject_ID
                        left join subject_detail on subject.Subject_ID = subject_detail.subject_id
                        left join teacher on subject_detail.teacher_id = teacher.Teacher_ID
                        WHERE leaves.std_id = '$STD_ID' AND leaves.leave_id = '$leaveId'";
                            $q_leave = mysqli_query($connect, $sql_leave);
                            $fa_leave = mysqli_fetch_assoc($q_leave);
                            ?>
                            <div class="align-items-end lh-1">
                                <div>
                                    <label for="">วิทยาลัยเทคนิคสัตหีบ ต.นาจอมเทียน</label>
                                </div>
                                <div class="mt-1">
                                    <label for="">อ.สัตหีบ จ.ชลบุรี 20250</label>
                                </div>
                                <div class="d-flex lh-1 me-3 w-100 mt-1">
                                    <label for="">บ้านเลขที่</label>
                                    <label for="" class="border-bottom px-3 m-0 border-dark" style="width: 18%;"></label>
                                    <label for="">หมู่ที่</label>
                                    <label for="" class="border-bottom px-1 text-center m-0 border-dark" style="width: 10%;"></label>
                                    <label for="">ซอย</label>
                                    <label for="" class="border-bottom px-3 m-0 border-dark" style="width: 24.4%;"></label>
                                </div>
                                <div class="d-flex lh-1 me-3 mt-1 w-100">
                                    <label for="">ถนน</label>
                                    <label for="" class="border-bottom px-3 text-center m-0 border-dark" style="width: 69.5%;"></label>
                                    <label for="">ตำบล</label>
                                    <div class="w-100">
                                        <label for="" class="border-bottom px-3 m-0 border-dark text-center" style="width: 100%;"><?= $fa_STD['s_name_th'] ?></label>
                                    </div>
                                </div>
                                <div class="d-flex lh-1 me-3 mt-1 w-100">
                                    <label for="">อำเภอ</label>
                                    <label for="" class="border-bottom px-3 text-center m-0 border-dark" style="width: 95%;"><?= $fa_STD['d_name_th'] ?></label>
                                    <label for="">จังหวัด</label>
                                    <div class="w-100">
                                        <label for="" class="border-bottom px-3 m-0 border-dark text-center" style="width: 100%;"><?= $fa_STD['name_th'] ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex lh-1 justify-content-end">
                            <div class="lh-1 mt-4">
                                <div style="margin-right: 4rem;">
                                    <?php
                                    $convert_dateTime = "SELECT CAST(write_date AS DATE) AS write_date from leaves WHERE std_id = '$STD_ID' and leave_id = '$leaveId'";
                                    $q_convert = mysqli_query($connect, $convert_dateTime);
                                    $fa_convert = mysqli_fetch_assoc($q_convert);

                                    $get_day = date('d', strtotime($fa_convert['write_date']));

                                    $get_month = date('M', strtotime($fa_convert['write_date']));
                                    $con_month = convertMonth($get_month);

                                    $get_year = date('Y', strtotime($fa_convert['write_date']));
                                    $con_year = convertYear($get_year);
                                    ?>
                                    <label for="">วันที่</label>
                                    <label for="" class="border-bottom px-3 m-0 border-dark"><?= $get_day ?></label>
                                    <label for="">เดือน</label>
                                    <label for="" class="border-bottom px-3 m-0 border-dark"><?= $con_month ?></label>
                                    <label for="">พ.ศ.</label>
                                    <label for="" class="border-bottom px-3 m-0 border-dark"><?= $con_year ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-start mt-3">
                            <div>
                                <label for="">เรื่อง</label>
                                <label for="" class="px-2">ขออนุญาต</label>
                                <?php
                                $check_type = $fa_leave['leave_type_id'];
                                if ($check_type == 'LT02') {
                                ?>
                                    <label for="" class=""><i class="bi bi-check-square"></i></label>
                                <?php } else { ?>
                                    <label for="" class=""><i class="bi bi-square"></i></label>
                                <?php } ?>

                                <label for="" class="px-2">ลาป่วย</label>
                                <?php
                                if ($check_type == 'LT01') {
                                ?>
                                    <label for="" class=""><i class="bi bi-check-square"></i></label>
                                <?php } else { ?>
                                    <label for="" class=""><i class="bi bi-square"></i></label>
                                <?php } ?>
                                <label for="" class="px-2">ลากิจ</label>

                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-start mt-1">

                            <div class="mt-4">
                                <label for="">เรียน</label>
                                <label for="" class="px-2">เรียนผู้อำนวยการวิทยาลัยเทคนิคสัตหีบ</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1" style="margin-left: 13.7rem;">
                            <div class="lh-1 d-flex mt-4 w-100">
                                <label for="">ด้วยข้าพเจ้า</label>
                                <label for="" class="px-1">นาย/นางสาว</label>
                                <label for="" class="border-bottom px-3 border-dark text-center text-nowrap" style="width: 50.1%;"><?php echo $fa_STD['STD_Name'] . " " . $fa_STD['STD_Lastname'] ?></label>
                                <label for="" class="px-1">นักเรียน/นักศึกษา</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-start">
                            <div class="lh-1 mt-2 w-100">
                                <label for="">ระดับ</label>
                                <label for="" class="border-bottom px-3 border-dark text-center text-nowrap" style="width: 12%;"><?= $fa_STD['Classlev_Name'] ?></label>
                                <label for="">กลุ่มที่</label>
                                <label for="" class="border-bottom px-3 border-dark text-center text-nowrap" style="width: 12%;"><?= $fa_STD['Group_Name'] ?></label>
                                <label for="">แผนกวิชา</label>
                                <label for="" class="border-bottom px-3 border-dark text-center text-nowrap" style="width: 22%;"><?= $fa_STD['Departmetn_Name'] ?></label>
                                <label for="">เลขประจำตัว</label>
                                <label for="" class="border-bottom px-3 border-dark text-center text-nowrap" style="width: 22%;"><?= $fa_STD['STD_ID'] ?></label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-start">
                            <div class="lh-1 mt-2">
                                <label for="">มีความประสงค์ขออนุญาต</label>

                                <?php
                                if ($check_type == 'LT02') {
                                ?>
                                    <label for="" class="px-2"><i class="bi bi-check-square"></i></label>
                                <?php } else { ?>
                                    <label for="" class="px-2"><i class="bi bi-square"></i></label>
                                <?php } ?>

                                <label for="">ลาป่วย</label>

                                <?php
                                if ($check_type == 'LT01') {
                                ?>
                                    <label for="" class="px-2"><i class="bi bi-check-square"></i></label>
                                <?php } else { ?>
                                    <label for="" class="px-2"><i class="bi bi-square"></i></label>
                                <?php } ?>

                                <label for="">ลากิจ</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-start">
                            <div class="lh-1 d-flex mt-2 w-100">
                                <label for="">เนื่องจาก</label>
                                <div class=" w-100">
                                    <label for="" class="border-bottom px-3 border-dark text-start text-nowrap w-100"><?= $fa_leave['leave_comment'] ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex lh-1" style="margin-left: 13.7rem;">
                            <div class="lh-1 mt-4 w-100">
                                <?php
                                $check_start_time = "SELECT MIN(sb_time) as Start_time from leave_detail
                                left join study_block on leave_detail.sb_id = study_block.SB_ID
                                where leave_id = '$leaveId'";
                                $q_check = mysqli_query($connect, $check_start_time);
                                $fa_check_start = mysqli_fetch_assoc($q_check);

                                $get_time = substr($fa_check_start['Start_time'], 0, 5);
                                ?>
                                <label for="">จึงขอเรียนมาเพื่อขออนุญาตลาเรียน ตั้งแต่เวลา</label>
                                <label for="" class="border-bottom m-0 border-dark text-center text-nowrap" style="width: 6.8%;"><?= $get_time ?></label>
                                <label for="">น.</label>
                                <label for="">วันที่</label>
                                <?php
                                $get_day = date('d', strtotime($fa_leave['start_leave_date']));

                                $get_month = date('M', strtotime($fa_leave['start_leave_date']));
                                $con_month = convertMonth($get_month);

                                $get_year = date('Y', strtotime($fa_leave['start_leave_date']));
                                $con_year = convertYear($get_year);
                                ?>
                                <label for="" class="border-bottom px-0 m-0 text-center border-dark" style="width: 5.5%;"><?= $get_day ?></label>
                                <label for="">เดือน</label>
                                <label for="" class="border-bottom px-0 m-0 border-dark text-center text-nowrap" style="width: 5.8%;"><?= $con_month ?></label>
                                <label for="">พ.ศ.</label>
                                <label for="" class="border-bottom px-0 m-0 border-dark text-center  text-nowrap" style="width: 6.5%;"><?= $con_year ?></label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 mt-2">
                            <div class="lh-1 w-100">
                                <?php
                                $check_end_time = "SELECT MAX(sb_time) as End_time from leave_detail
                                left join study_block on leave_detail.sb_id = study_block.SB_ID
                                where leave_id = '$leaveId'";
                                $q_check = mysqli_query($connect, $check_end_time);
                                $fa_check_end = mysqli_fetch_assoc($q_check);

                                $get_time = substr($fa_check_end['End_time'], -5);
                                ?>
                                <label for="">ถึงเวลา</label>
                                <label for="" class="border-bottom px-1 m-0 border-dark text-center  text-nowrap" style="width: 10%;"><?= $get_time ?></label>
                                <label for="">น.</label>
                                <?php
                                $get_day = date('d', strtotime($fa_leave['end_leave_date']));

                                $get_month = date('M', strtotime($fa_leave['end_leave_date']));
                                $con_month = convertMonth($get_month);

                                $get_year = date('Y', strtotime($fa_leave['end_leave_date']));
                                $con_year = convertYear($get_year);
                                ?>
                                <label for="" class="px-2">วันที่</label>
                                <label for="" class="border-bottom px-1 m-0 border-dark text-center  text-nowrap" style="width: 9%;"><?= $get_day ?></label>
                                <label for="">เดือน</label>
                                <label for="" class="border-bottom px-1 m-0 border-dark text-center  text-nowrap" style="width: 15%;"><?= $con_month ?></label>
                                <label for="">พ.ศ.</label>
                                <label for="" class="border-bottom px-1 m-0 border-dark text-center  text-nowrap" style="width: 10%;"><?= $con_year ?></label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class=" lh-1 mt-4">
                                <label for="">ขอแสดงความนับถือ</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class="w-100 d-flex justify-content-center mt-4">
                                <label for="">ลงชื่อ</label>
                                <label for="" class="border-bottom px-1 m-0 border-dark text-center text-nowrap" style="width: 31.5%;"><?php echo $fa_STD['STD_Name'] . " " . $fa_STD['STD_Lastname'] ?></label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class="w-100 mt-2 d-flex justify-content-center">
                                <label for="">(</label>
                                <label for="" class="border-bottom px-1 m-0 border-dark text-center text-nowrap" style="width: 34.8%;"><?php echo $fa_STD['Prefix_Name'] . " " . $fa_STD['STD_Name'] . " " . $fa_STD['STD_Lastname'] ?></label>
                                <label for="">)</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class="mt-2">
                                <label for="">นักเรียน นักศึกษา</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-start">
                            <div class="d-flex lh-1 mt-3 w-100">
                                <label for="" class="text-nowrap">ความเห็นของผู้ปกครอง</label>
                                <div class="w-100">
                                    <label for="" class="border-bottom px-3 m-0 border-dark text-start text-nowrap w-100"><?= $fa_leave['parent_comment'] ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class="lh-1 mt-3">
                                <label for="">ขอแสดงความนับถือ</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class="w-100 d-flex justify-content-center mt-4">
                                <label for="">ลงชื่อ</label>
                                <label for="" class="border-bottom px-1 m-0 border-dark text-center text-nowrap" style="width: 31.5%;"></label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class="w-100 mt-1 lh-1 d-flex justify-content-center">
                                <label for="">(</label>
                                <label for="" class="border-bottom px-1 m-0 border-dark text-center text-nowrap" style="width: 34.8%;"><?= $fa_STD['Parent_Name'] ?></label>
                                <label for="">)</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class="mt-2">
                                <label for="">ผู้ปกครอง</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-start">
                            <div class="d-flex lh-1 w-100 mt-3">
                                <label for="" class="text-nowrap">ความเห็นของครูที่ปรึกษา</label>
                                <div class="w-100">
                                    <div class="w-100">
                                        <label for="" class="border-bottom px-3 m-0 border-dark text-start text-nowrap w-100"><?= $fa_leave['parent_comment'] ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class="lh-1 mt-3">
                                <label for="">ขอแสดงความนับถือ</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class="w-100 lh-1 d-flex justify-content-center mt-4">
                                <label for="">ลงชื่อ</label>
                                <label for="" class="border-bottom px-1 m-0 border-dark text-center text-nowrap" style="width: 31.5%;"></label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-center">
                            <div class="w-100 lh-1 mt-2 d-flex justify-content-center">
                                <?php
                                $sql_teacher = "SELECT prefix.Prefix_Name from teacher
                                    left join prefix on teacher.prefix_id = prefix.prefix_id";
                                $q_teacher = mysqli_query($connect, $sql_teacher);
                                $fa_teacher = mysqli_fetch_assoc($q_teacher);
                                ?>
                                <label for="">(</label>
                                <label for="" class="border-bottom px-1 m-0 border-dark text-center text-nowrap" style="width: 34.8%;"><?php echo $fa_teacher['Prefix_Name'] . " " . $fa_STD['Teacher_Name'] . " " . $fa_STD['Teacher_Lastname'] ?></label>
                                <label for="">)</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 mt-2 mb-1 justify-content-center">
                            <div class="lh-1 ">
                                <label for="">ครูที่ปรึกษา</label>
                            </div>
                        </div>
                        <div class="d-flex lh-1 justify-content-start">
                            <div class="lh-1 mt-3 w-100">
                                <label for="">ครูประจำวิชาลงนามรับทราบ</label>
                                <label for="" class="px-1 fw-bold" style="font-size: 17px;">(ให้ครูผู้สอนเซ็นชื่อเพื่อรับทราบด้วยทุกครั้งก่อนนำใบลาส่งงานครูที่ปรึกษา)</label>
                            </div>
                        </div>
                        <?php
                        $l_detail = "SELECT
                    leave_detail.leave_id,
                    subject.Subject_Name
                FROM leave_detail
                left join subject on leave_detail.subject_id = subject.Subject_ID
                left join subject_detail on subject.Subject_ID = subject_detail.subject_id
                left join teacher on subject_detail.teacher_id = teacher.Teacher_ID
                WHERE leave_detail.leave_id = '$leaveId'";
                        $q_l_detail = mysqli_query($connect, $l_detail);
                        $num = mysqli_num_rows($q_l_detail);
                        $number = 1;
                        ?>

                        <?php for ($i = 1; $i <= 3; $i++) { ?>
                            <div class="d-flex lh-1 justify-content-start">
                                <div class="lh-1 w-100 mt-3">
                                    <?php for ($j = 1; $j <= 3; $j++) { ?>
                                        <?php
                                        // เริ่มต้นลูป while ถ้ามีข้อมูลใน query
                                        $counter = $num;

                                        if ($counter >= $number) {
                                            $fa_l_detail = mysqli_fetch_assoc($q_l_detail);
                                        ?>
                                            <label for=""><?= $number ?>. ชื่อวิชา</label>
                                            <label for="" class="border-bottom px-0 m-0 border-dark text-center" style="width: 9.6%;font-size: 7.38px;"><?= $fa_l_detail['Subject_Name'] ?></label>
                                            <label for="">ลายเซ็นครู</label>
                                            <label for="" class="border-bottom px-0 m-0 border-dark text-center text-nowrap" style="width: 5.4%;"></label>
                                        <?php
                                            $number++;
                                        } else { ?>
                                            <label for=""><?= $number ?>. ชื่อวิชา</label>
                                            <label for="" class="border-bottom px-0 m-0 border-dark text-center text-nowrap" style="width: 9.6%;"></label>
                                            <label for="">ลายเซ็นครู</label>
                                            <label for="" class="border-bottom px-0 m-0 border-dark text-center text-nowrap" style="width: 5.4%;"></label>
                                        <?php
                                            $number++;
                                        }

                                        // ถ้าไม่มีข้อมูลใน query จะไม่แสดงข้อมูล
                                        ?>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="d-flex lh-1 justify-content-start">
                            <div class="lh-1 mt-3">
                                <div>
                                    <label for="" style="font-weight: bolder;font-size: 1.1rem;text-decoration: underline;margin-right: 1rem;">หมายเหตุ</label>
                                    <label for="">1.นักศึกษานำ</label>
                                    <label for="" style="font-weight: bolder;text-decoration: underline;">ใบลากิจ</label>
                                    <label for="">ให้ครูที่ปรึกษาและครูผู้สอนลงนามรับทราบ ก่อนนำส่งงานครูที่ปรึกษา</label>
                                    <div class="mt-2" style="margin-left: 6rem;">
                                        <label for="">2.ถ้านักศึกษา</label>
                                        <label for="" style="font-weight: bolder;text-decoration: underline;">ลาป่วยเกิน 3
                                            วัน</label>
                                        <label for="">ต้องแนบใบรับรองแพทย์ และยื่นใบลาให้ครูผู้สอนลงนามรับทราบ</label>
                                    </div>
                                    <div class="mt-2" style="margin-left: 6.7rem;">
                                        <label for="">ด้วยตัวเองทุกครั้ง</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-success" onclick="printDiv('printLeave')">Print</button>
    <button type="button" class="btn btn-danger" onclick="window.location.href='?page=Manage_leaves'" >กลับหน้าหลัก</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

</body>

</html>