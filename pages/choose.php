<?php
require_once "./components/boostrap.html";
?>
<section class="vh-100 ">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-white" style="background: #454ABB; border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <img src="./public/img/TATC_Logo.png" width="150" class="rounded-circle border-10px">
                        <div class="mb-md-0 mt-md-4 pb-2 ">
                                <h2 class="fw-bold mb-4 text-uppercase">การเข้าสู่ระบบโดย</h2>
                                <div class="form-outline form-white mb-4">
                                    <a href="?page=homeadmin"> <button class="btn btn-outline-light btn-lg px-5" >ผู้ดูแลระบบ</button></a>
                                </div>

                                <div class="form-outline form-white mb-4">
                                <a href="?page=homeTeacher" > <button class="btn btn-outline-light btn-lg px-5" >ครู,อาจารย์</button></a>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="?page=loginAdmin" class="text-white-50 fw-bold">
                                  ยกเลิก
                                    </a>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
