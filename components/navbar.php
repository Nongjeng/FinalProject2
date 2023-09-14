<?php
include_once "./components/BSCss.html";
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

<nav class="navbar navbar-expand-lg navbar-light  fixed-top" style=" background: #BA0900;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mx-2">
            <li class="nav-item ml-1">
                <img src="./public/img/TATC_Logo.png" width="70" class="rounded-circle border-10px">
            </li>

            <li class="nav-item mt-2 ml">
                <a class="nav-link text-white" href="?page=home">วิทยาลัยเทคนิคสัตหีบ</a>
            </li>



        </ul>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5">

            </ul>
            <ul class="navbar-nav mt-1">
                <li class="nav-item" id="nav-item">
                    <a href="?page=User" class="text-white no-underline"><i class="bi bi-person-circle fs-5"></i>&nbsp;&nbsp;<?php echo "$Prefix_Name"; ?>&nbsp;&nbsp;<?php echo "$STD_Name  $STD_Lastname"; ?></a>
                </li>
                <li class="nav-item" id="nav-item">
                <a href="?page=logout"  title="ออกจากระบบ" class="text-white no-underline" data-bs-toggle="tooltip"> <i class="bi bi-box-arrow-right fs-5"></i></a>     
            </li>
            </ul>
        </div>
    </div>
</nav>
<?php
include_once "./components/footer.html";
?>