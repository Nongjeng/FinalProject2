<?php 
  if (isset($_POST['save'])) {
    $leaveid = $_POST['leaveid'];
    $startleave = $_POST['startleave'];
    $endleave = $_POST['endleave'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $comment = $_POST['comment'];
    $leavetype = $_POST['leavetype'];
    $attachfile = $_POST['attachfile'];

    $sql_leave = "INSERT INTO leaves(leave_id,leave_type_id,std_id,start_leave_date,end_leave_date,leave_comment,leave_status_id,attach_medCerti)
                  VALUES ('$leaveid','$leavetype','$STD_ID','$startleave $start_time','$endleave $end_time','$comment','LS01','$attachfile')";
    if (mysqli_query($connect,$sql_leave)) {
      echo "<script>alert('insert success')</script>";
    }else{
      echo mysqli_error($connect);
    }

  }?>
    <?php
  function generateNewProvinceId($conn)
  {
    $increment = 1;

    $sql_max_id = "SELECT MAX(leave_id) AS max_id FROM leaves";
    $result = mysqli_query($conn, $sql_max_id);
    $row = mysqli_fetch_assoc($result);
    $lastLeaveId = $row['max_id'];

    if ($lastLeaveId !== null){
      $numberPart = (int)substr($lastLeaveId, 1);
      $newNumberPart = $numberPart + $increment;

      $newLeaveId = "L" . str_pad($newNumberPart, 3, '0', STR_PAD_LEFT);
    } return $newLeaveId;
  }
  ?>