<script type="text/javascript">
    $('#provinces').change(function() {
        var id_province = $(this).val();
        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                provinces_id: id_province,
                function: 'provinces'
            },
            success: function(data) {
                $('#districts').html(data)
                $('#subdistricts').html('')
                $('#zipcode').val('')
            }
        });
    });
    $('#districts').change(function() {
        var id_district = $(this).val();
        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                district_id: id_district,
                function: 'districts'
            },
            success: function(data) {
                $('#subdistricts').html(data)
                $('#zipcode').val('')
            }
        });
    });
    $('#subdistricts').change(function() {
        var id_subdistrict = $(this).val();
        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                subdistrict_id: id_subdistrict,
                function: 'subdistricts'
            },
            success: function(data) {
                $('#zipcode').val(data)
            }
        });
    });

    $('#startdate').change(function() {
        var id_startdate = $(this).val();

        var studentData = {
            "STD_ID": <?php echo json_encode($_SESSION["STD_ID"]); ?>,
            "STD_Name": <?php echo json_encode($_SESSION["STD_Name"]); ?>,
            "STD_Lastname": <?php echo json_encode($_SESSION["STD_Lastname"]); ?>,
            "STD_Birth": <?php echo json_encode($_SESSION["STD_Birth"]); ?>,
            "STD_Phone": <?php echo json_encode($_SESSION["STD_Phone"]); ?>,
            "Classlev_ID": <?php echo json_encode($_SESSION["Classlev_ID"]); ?>,
            "Major_ID": <?php echo json_encode($_SESSION["Major_ID"]); ?>,
            "Parent_Name": <?php echo json_encode($_SESSION["Parent_Name"]); ?>,
            "STD_Address": <?php echo json_encode($_SESSION["STD_Address"]); ?>,
            "Group_ID": <?php echo json_encode($_SESSION["Group_ID"]); ?>,
            "Provinces_ID": <?php echo json_encode($_SESSION["provinces_id"]); ?>,
            "District_ID": <?php echo json_encode($_SESSION["district_id"]); ?>,
            "SubDistrict_ID": <?php echo json_encode($_SESSION["subdistrict_id"]); ?>,

        };

        var studentDataJSON = JSON.stringify(studentData);

        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                startdate_id: id_startdate,
                studentData: studentDataJSON,
                function: 'startdate'
            },
            success: function(data) {
                console.log(studentDataJSON);
                $('#subject').html(data)
                $('#enddate').val(id_startdate)
            }
        });
    });

    $('#enddate').change(function() {
        var id_startdate = $('#startdate').val();
        var id_enddate = $(this).val();

        var studentData = {
            "STD_ID": <?php echo json_encode($_SESSION["STD_ID"]); ?>,
            "STD_Name": <?php echo json_encode($_SESSION["STD_Name"]); ?>,
            "STD_Lastname": <?php echo json_encode($_SESSION["STD_Lastname"]); ?>,
            "STD_Birth": <?php echo json_encode($_SESSION["STD_Birth"]); ?>,
            "STD_Phone": <?php echo json_encode($_SESSION["STD_Phone"]); ?>,
            "Classlev_ID": <?php echo json_encode($_SESSION["Classlev_ID"]); ?>,
            "Major_ID": <?php echo json_encode($_SESSION["Major_ID"]); ?>,
            "Parent_Name": <?php echo json_encode($_SESSION["Parent_Name"]); ?>,
            "STD_Address": <?php echo json_encode($_SESSION["STD_Address"]); ?>,
            "Group_ID": <?php echo json_encode($_SESSION["Group_ID"]); ?>,
            "Provinces_ID": <?php echo json_encode($_SESSION["provinces_id"]); ?>,
            "District_ID": <?php echo json_encode($_SESSION["district_id"]); ?>,
            "SubDistrict_ID": <?php echo json_encode($_SESSION["subdistrict_id"]); ?>,

        };

        var studentDataJSON = JSON.stringify(studentData);

        $.ajax({
            type: "post",
            url: "ajax.php",
            data: {
                startdate_id: id_startdate, // แก้ชื่อตัวแปรให้เป็น startdate_id
                enddate_id: id_enddate,
                studentData: studentDataJSON,
                function: 'enddate'
            },
            success: function(data) {
                $('#subject').html(data)
            }
        });
    });

    function confirmCancellation(leave_id) {
        Swal.fire({
            title: 'ต้องการยกเลิกการลา?',
            text: 'คุณแน่ใจหรือไม่ว่าต้องการยกเลิกการลานี้?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                // ส่วนของ PHP ที่ใช้ในการอัปเดตฐานข้อมูล
                $.ajax({
                    type: 'POST',
                    url: 'ajax.php', // ระบุ URL ที่จะทำการอัปเดตในไฟล์นี้
                    data: {
                        leave_id: leave_id
                    },
                    success: function(response) {
                        if (response === 'success') {
                            Swal.fire({
                                title: 'ยกเลิกสำเร็จ',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'เกิดข้อผิดพลาด',
                                text: 'ไม่สามารถยกเลิกการลาได้',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            }
        });
    }

    function confirmSuccess(leave_id) {
        Swal.fire({
            title: 'ต้องการอนุมัติการลา?',
            text: 'คุณแน่ใจหรือไม่ว่าต้องการอนุมัติการลานี้?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                // ส่วนของ PHP ที่ใช้ในการอัปเดตฐานข้อมูล
                $.ajax({
                    type: 'POST',
                    url: 'ajax2.php', // ระบุ URL ที่จะทำการอัปเดตในไฟล์นี้
                    data: {
                        leave_id: leave_id
                    },
                    success: function(response) {
                        if (response === 'success') {
                            Swal.fire({
                                title: 'อนุมัติสำเร็จ',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'เกิดข้อผิดพลาด',
                                text: 'ไม่สามารถยกเลิกการลาได้',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            }
        });
    }
</script>