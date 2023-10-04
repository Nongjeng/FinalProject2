<?php 
if(isset($_POST['Editgroup'])){
$Teacher_ID = $_POST['teacher_id'];
$Group_ID = $_POST['Group_ID'];

$sql="UPDATE groups set Teacher_ID = '$Teacher_ID' WHERE Group_ID = $Group_ID";
$sql_p = mysqli_query($connect,$sql);
if($sql_p){
    echo '<script>
    Swal.fire({
      icon: "success",
      title: "แก้ไขข้อมูลสำเร็จ",
      text: "เรียบร้อย"
    }).then(function() {
      window.location.href = "?page=MUseradmin";
    });
  </script>';
}else{
    echo "Error in ". $sql;
}

}
