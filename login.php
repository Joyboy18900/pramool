<!DOCTYPE html>
<html lang="en">

<?php include_once "include/header.php"; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Outer Row -->
                    <div class="row justify-content-center">

                        <div class="col-xl-10 col-lg-12 col-md-9">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">เข้าสู่ระบบเว็บประมูล</h1>
                                                </div>
                                                <form class="user" action="loginController.php?checkLogin" method="POST">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user"
                                                            name="user_Name" placeholder="Enter your Username">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-user"
                                                            name="user_Password"
                                                            placeholder="Enter your Password">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                        เข้าสู่ระบบ
                                                    </button>
                                                    <br>
                                                    <a href="register.php" class="btn btn-user btn-success btn-block">สมัครสมาชิก</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once "layout/footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Javascript -->
    <?php include_once "include/script.php"; ?>

</body>

</html>