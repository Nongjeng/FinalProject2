<style>
    .table-container {
        padding-top: 10px;
        display: block;
        margin-left: auto;
        margin-right: auto
    }

    h3 {
        padding-top: 50px;
        margin: 73px;
    }

    .table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        width: 90%;
    }

    .table thead tr th {
        background-color: #BA0900;
        color: #ffffff;
        border: 1px solid white;
        height: 50px;
        font-weight: bold;
    }

    .table tbody tr td {
        background-color: white;
        border: 1px solid white;
    }
</style>



<?php
require_once "./components/navbar.php";
require_once "./components/sidebar.php";

$query = "SELECT leave_id, start_leave_date ,date(start_leave_date) as start_date_woTime ,
              end_leave_date , time(start_leave_date) as start_time_woDate , lt.leave_type_name , 
              date(end_leave_date) as end_date_woTime , time(end_leave_date) as end_time_woDate ,
              leave_comment , ls.leave_status_name 
              FROM leaves
              inner JOIN leave_type lt on leaves.leave_type_id=lt.leave_type_id AND std_id = '$STD_ID'
              inner join leave_status ls on leaves.leave_status_id=ls.leave_status_id ";
$result = mysqli_query($connect, $query);

?>
<div class="content">
    <H3 class="align-left text-left mb-0">ประวัติการลา</H3>
    <div class="table-container w-100 d-flex justify-content-center mt-0">
        <table class="table table-striped m-0" style="width: 90%; font-size: 15px">
            <thead>
                <tr class="align-middle text-center">
                    <th>วันที่ลง</th>
                    <th>การลา</th>
                    <th>วันที่ลา</th>
                    <th>สถานะ</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>
            <tbody class="align-middle text-center">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['leave_id'] ?></td>
                        <td><?php echo $row['leave_type_name'] ?></td>
                        <td><?php echo $row['start_leave_date'] . " - " . $row['end_leave_date'] ?></td>
                        <td><?php echo $row['leave_status_name'] ?></td>
                        <td>
                            <button type="button" class="btn " style="background-color: #BA0900; color:#ffffff" data-bs-toggle="modal" data-bs-target="#detail<?php echo $row['leave_id'] ?>"><i class="bi bi-info-circle-fill fs-5"></i></button>
                            <div class="modal fade" id="detail<?php echo $row['leave_id'] ?>" data-bs-keyboard="false" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-fullscreen py-4 px-5">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex flex-column border-0">
                                            <div class="d-flex justify-content-between w-100 px-3 align-items-center">
                                                <i class="bi bi-file-text-fill fs-1"></i>
                                                <h1 class="modal-title fs-4" id="staticBackdropLabel">รายละเอียดการลา <?php echo $row['leave_id'] ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="w-100">
                                                <hr class="border border-3 border-dark mx-3 opacity-100">
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <!-- row 1 -->
                                            <div class=" d-flex flex-column">
                                                <div class="row row-cols-1 " style="align-items: center;">
                                                    <div class=" row row-cols-3 g-3">
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">วันที่เริ่มลา :</p>
                                                                <input type="text" id="start_date" name="start_date" class=" form-control shadow-none" value="<?php echo $row['start_date_woTime'] ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">เวลา :</p>
                                                                <input type="text" id="time_start_date" name="time_start_date" class=" form-control shadow-none" value="<?php echo $row['start_time_woDate'] ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">ประเภทการลา :</p>
                                                                <input type="text" id="leave_type" name="leave_type" class=" form-control shadow-none disabled" value="<?php echo $row['leave_type_name'] ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">ถึงวันที่ :</p>
                                                                <input type="text" id="end_date" name="end_date" class=" form-control shadow-none" value="<?php echo $row['end_date_woTime'] ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">เวลา :</p>
                                                                <input type="text" id="time_end_date" name="time_end_date" class=" form-control shadow-none" value="<?php echo $row['end_time_woDate'] ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">วิชาที่ลาได้ :</p>
                                                                <select name="" id="" class=" form-control" disabled>
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div class="row row-cols-2">
                                                            <div class=" col mt-3">
                                                                <div class=" d-flex align-items-center m-0 text-nowrap">
                                                                    <label for="exampleFormControlTextarea1" class="form-label">เหตุผลการลา :</label>
                                                                    <input type="text" id="time_end_date" name="time_end_date" class=" form-control shadow-none" VALUE="<?php echo $row['leave_comment'] ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- row 2 -->
                                            <div class=" d-flex flex-column mt-5">
                                                <div class="row row-cols-1">
                                                    <div class="row row-cols-2 d-flex justify-content-between">
                                                        <div class="col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <label class=" text-nowrap m-0">วันที่ทำการลา :</label>
                                                                <label class="mx-1" value="">xx/xx/xxxx</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" d-flex flex-column mt-1">
                                                <div class="row row-cols-1">
                                                    <div class="row row-cols-2 d-flex justify-content-between">
                                                        <div class="col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <label class=" text-nowrap m-0">สถานะการดำเนินการ :</label>
                                                                <label class="mx-1"><?php echo $row['leave_status_name'] ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer d-flex justify-content-between border-0">
                                            <button type="button" class="btn btn-dark">พิมพ์เอกสาร</button>
                                            <div>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_detail<?php echo $row['leave_id'] ?>">แก้ไขข้อมูล</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิกการลา</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- modal 2 -->
                            <div class="modal fade" id="edit_detail<?php echo $row['leave_id'] ?>" data-bs-keyboard="false" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-fullscreen py-4 px-5">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex flex-column border-0">
                                            <div class="d-flex justify-content-between w-100 px-3 align-items-center">
                                                <i class="bi bi-file-text-fill fs-1"></i>
                                                <h1 class="modal-title fs-4" id="staticBackdropLabel">แก้ไขรายละเอียดการลา</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="w-100">
                                                <hr class="border border-3 border-dark mx-3 opacity-100">
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <!-- row 1 -->
                                            <div class=" d-flex flex-column">
                                                <div class="row row-cols-1 " style="align-items: center;">
                                                    <div class=" row row-cols-3 g-3">
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">วันที่เริ่มลา :</p>
                                                                <input type="text" id="start_date" name="start_date" class=" form-control shadow-none" value="<?php echo $row['start_date_woTime'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">เวลา :</p>
                                                                <input type="text" id="time_start_date" name="time_start_date" class=" form-control shadow-none" value="<?php echo $row['start_time_woDate'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">ประเภทการลา :</p>
                                                                <input type="text" id="leave_type" name="leave_type" class=" form-control shadow-none disabled" value="<?php echo $row['leave_type_name'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">ถึงวันที่ :</p>
                                                                <input type="text" id="end_date" name="end_date" class=" form-control shadow-none" value="<?php echo $row['end_date_woTime'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">เวลา :</p>
                                                                <input type="text" id="time_end_date" name="time_end_date" class=" form-control shadow-none" value="<?php echo $row['end_time_woDate'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class=" col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <p class=" text-nowrap m-0">วิชาที่ลาได้ :</p>
                                                                <select name="" id="" class=" form-control" disabled>
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div class="row row-cols-2">
                                                            <div class=" col mt-3">
                                                                <div class=" d-flex align-items-center m-0 text-nowrap">
                                                                    <label for="exampleFormControlTextarea1" class="form-label">เหตุผลการลา :</label>
                                                                    <input type="text" id="time_end_date" name="time_end_date" class=" form-control shadow-none" VALUE="<?php echo $row['leave_comment'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- row 2 -->
                                            <div class=" d-flex flex-column mt-5">
                                                <div class="row row-cols-1">
                                                    <div class="row row-cols-2 d-flex justify-content-between">
                                                        <div class="col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <label class=" text-nowrap m-0">วันที่ทำการลา :</label>
                                                                <label class="mx-1" value="">xx/xx/xxxx</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" d-flex flex-column mt-1">
                                                <div class="row row-cols-1">
                                                    <div class="row row-cols-2 d-flex justify-content-between">
                                                        <div class="col">
                                                            <div class=" d-flex align-items-center m-0">
                                                                <label class=" text-nowrap m-0">สถานะการดำเนินการ :</label>
                                                                <label class="mx-1"><?php echo $row['leave_status_name'] ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer d-flex border-0">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal">บันทึกการแก้ไข</button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#detail<?php echo $row['leave_id'] ?>">ยกเลิกการแก้ไข</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>