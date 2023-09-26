<?php
include_once "./components/BSCss.html";
include "./Controllers/selectAdmin.php"
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: #BA0900; padding: 10px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mx-2">
            <li class="nav-item ml-1">
                <img src="./public/img/TATC_Logo.png" width="20" class="rounded-circle border-10px">
            </li>
            <li class="nav-item mt-2 ml">
                <a class="nav-link text-white" href="?page=homeadmin">วิทยาลัยเทคนิคสัตหีบ</a>
            </li>
        </ul>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-2"></ul>
            <ul class="navbar-nav mt-1">
                <li class="nav-item" id="nav-item">
                <a href="?page=Useradmin" class="text-white no-underline"><i class="bi bi-person-circle fs-5"></i>&nbsp;&nbsp;<?php echo "$Prefix_Name"; ?>&nbsp;&nbsp;<?php echo "$Teacher_Name  $Teacher_Lastname"; ?></a>
                </li>
                <li class="nav-item" id="nav-item">
                    <a href="?page=log_outAD" title="ออกจากระบบ" class="text-white no-underline" data-bs-toggle="tooltip"> <i class="bi bi-box-arrow-right fs-4"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>