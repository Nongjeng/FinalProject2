<?php

$STD_ID = $_SESSION['STD_ID'];
$sql = "SELECT * FROM std WHERE STD_ID ='$STD_ID'";
$result = mysqli_query($connect, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $Prefix_ID = $row['Prefix_ID'];
    $STD_Name = $row["STD_Name"];
    $STD_Lastname = $row["STD_Lastname"];
    $STD_Birth = $row["STD_Birth"];
    $STD_Phone = $row["STD_Phone"];
    $Classlev_ID = $row["Classlev_ID"];
    $Major_ID = $row["Major_ID"];
    $Parent_Name = $row["Parent_Name"];
    $STD_Address = $row["STD_Address"];
    $Group_ID = $row["Group_ID"];
    $Provinces_ID = $row["provinces_id"];
    $District_ID = $row["district_id"];
    $Subdistrict_ID = $row["subdistrict_id"];
    $_SESSION["Group_ID"] = $Group_ID;

    $sql_Prefix = "SELECT * FROM prefix WHERE Prefix_ID ='$Prefix_ID'";
    $result_prefix = mysqli_query($connect, $sql_Prefix);
    if ($result_prefix) {
        $row = mysqli_fetch_assoc($result_prefix);
        $Prefix_Name = $row['Prefix_Name'];
    }
    // if (isset($_SESSION["UpdatedSTD_Birth"])) {
    //     $STD_Birth = $_SESSION["UpdatedSTD_Birth"];
    // }
    // if (isset($_SESSION["UpdatedSTD_Address"])) {
    //     $STD_Address = $_SESSION["UpdatedSTD_Address"];
    // }
    // if (isset($_SESSION["UpdatedSTD_Phone"])) {
    //     $STD_Phone = $_SESSION["UpdatedSTD_Phone"];
    // }
    // if (isset($_SESSION["UpdatedParent_Name"])) {
    //     $Parent_Name = $_SESSION["UpdatedParent_Name"];
    // }
} else {
    echo "Eror in " . $sql;
}

?>