<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Leave System</title>
    <link rel="stylesheet" href="./components/forindex.css">
</head>

<body>
    <?php
    include_once "./components/BSCss.html";
  
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
                    <a class="nav-link text-white" href="index.php">วิทยาลัยเทคนิคสัตหีบ</a>
                </li>



            </ul>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5">

                </ul>
                <ul class="navbar-nav mt-1">
                    <li class="nav-item" id="nav-item" >
                    <a href="User.php" class="text-white no-underline"><i class="bi bi-person-circle fs-5"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "$STD_Name $STD_Lastname"; ?></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <?php
    include_once "./components/footer.html";
    ?>
</body>

</html>