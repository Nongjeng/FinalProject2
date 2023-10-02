<section class="vh-100 ">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-white" style="background: #454ABB; border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <?php
                        require_once "./components/boostrap.html";
                        require_once "./Controllers/loginAdmin.php";
                        ?>
                        <img src="./public/img/TATC_Logo.png" width="150" class="rounded-circle border-10px">
                        <div class="mb-md-0 mt-md-4 pb-2 ">
                            <form method="POST">
                                <h2 class="fw-bold mb-4 text-uppercase">วิทยาลัยเทคสัตหีบ</h2>
                                <div class="form-outline form-white mb-4">
                                    <input type="text" class="form-control form-control-lg" name="Username" required placeholder="Username" />
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="Password" id="typePasswordX" class="form-control form-control-lg" name="Password" required placeholder="รหัสผ่าน" />
                                </div>

                                <div class="d-flex justify-content-between align-items-center">

                                    <p class="mb-0"><a href="?page=login" class="text-white-50 fw-bold" style="text-decoration: none; font-size:  19px; ">เช้าสู่ระบบด้วยรหัสนักศึกษา</a>

                                    </p>
                                    <button class="btn btn-outline-light btn-lg px-5" name="login">เข้าสู่ระบบ</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="container rounded-3" style="background-color: #7f82be;">
                            <div class="d-flex justify-content-center mt-3">
                                <div class="mt-3">
                                    <label for="" class="fs-5">วิธีการเข้าสู่ระบบ</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <label for="" class="fs-6">สำหรับนักศึกษา</label>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <label for="" class="fs-6">ชื่อผู้ใช้ให้ใส่รหัสนักศึกษาของตนเอง</label>
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <label for="" class="fs-6">และรหัสผ่าน 1234 เช่น ชื่อผู้ใช้ 65309010005 รหัสผ่าน 1234</label>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <label for="" class="fs-6">สำหรับครู อาจารย์</label>
                            </div>
                            <div class="d-flex justify-content-center mt-2 mb-3">
                                <div class="mb-3">
                                    <label for="" class="fs-6">ชื่อผู้ใช้ให้ใส่รหัสผู้ใช้ของตนเองตาม RMS</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>