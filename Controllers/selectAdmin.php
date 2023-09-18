<?php

$Teacher_ID = $_SESSION['Username'];
$sql = "SELECT * FROM teacher WHERE Teacher_ID ='$Teacher_ID'";
$result = mysqli_query($connect, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $Prefix_ID = $row['Prefix_ID'];
    $Teacher_Name = $row["Teacher_Name"];
    $Teacher_Lastname = $row["Teacher_Lastname"];


    $sql_Prefix = "SELECT * FROM prefix WHERE Prefix_ID ='$Prefix_ID'";
    $result_prefix = mysqli_query($connect, $sql_Prefix);
    if ($result_prefix) {
        $row = mysqli_fetch_assoc($result_prefix);
        $Prefix_Name = $row['Prefix_Name'];
    }
} else {
    echo "Eror in " . $sql;
}

?>