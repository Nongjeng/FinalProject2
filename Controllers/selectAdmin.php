<?php

$Teacher_ID = $_SESSION['Username'];
$sql = "SELECT * FROM teacher WHERE Teacher_ID ='$Teacher_ID'";
$result = mysqli_query($connect, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $Prefix_ID = $row['Prefix_ID'];
    $Teacher_Name = $row["Teacher_Name"];
    $Teacher_Lastname = $row["Teacher_Lastname"];
    $Teacher_Address = $row["Teacher_Address"];
    $Position_ID = $row["Position_ID"];
    $Position_Admin = $row["Position_Admin"];


    $sql_Prefix = "SELECT * FROM prefix WHERE Prefix_ID ='$Prefix_ID'";
    $result_prefix = mysqli_query($connect, $sql_Prefix);
    if ($result_prefix) {
        $row = mysqli_fetch_assoc($result_prefix);
        $Prefix_Name = $row['Prefix_Name'];
    }

    $sql_Position = "SELECT * FROM position WHERE Position_ID ='$Position_ID'";
    $result_Position = mysqli_query($connect, $sql_Position);
    if ($result_Position) {
        $row = mysqli_fetch_assoc($result_Position);
        $Position_Name = $row['Position_Name'];
    }else{
        echo "Error in ". $sql_Position;
    }



} else {
    echo "Eror in " . $sql;
}
?>