 <section class="vh-100 ">
     <div class="container py-5 h-100">
         <div class="row d-flex justify-content-center align-items-center h-100">
             <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                 <div class="card text-white" style="background: #454ABB; border-radius: 1rem;">
                     <div class="card-body p-5 text-center">
                         <?php
                            require_once "./components/boostrap.html";
                            require_once "./Controllers/login.php";
                            ?>
                         <img src="./public/img/TATC_Logo.png" width="150" class="rounded-circle border-10px">
                         <div class="mb-md-0 mt-md-4 pb-2 ">
                             <form method="POST">
                                 <h2 class="fw-bold mb-4 text-uppercase">วิทยาลัยเทคสัตหีบ</h2>
                                 <div class="form-outline form-white mb-4">
                                     <input type="text" class="form-control form-control-lg" name="STD_ID" required placeholder="ชื่อผู้ใช้งาน" />
                                 </div>

                                 <div class="form-outline form-white mb-4">
                                     <input type="Password" id="typePasswordX" class="form-control form-control-lg" name="Password" required placeholder="รหัสผ่าน" />
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center">

                                     <p class="mb-0"><a href="regis.jsp" class="text-white-50 fw-bold" style="text-decoration: none;">เข้าสู่ระบบด้วยแอดมิน</a>

                                     </p>
                                     <button class="btn btn-outline-light btn-lg px-5" name="login">เข้าสู่ระบบ</button>

                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>