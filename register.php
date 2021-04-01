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
                                                    <h1 class="h4 text-gray-900 mb-4">สมัครสมาชิก</h1>
                                                </div>
                                                <form id="frmAdd" class="user" action="registerController.php?registerUser" method="POST">

                                                    <div class="form-group col-12">
                                                        <label for="user_RealName">ชื่อ-นามสกุล</label>
                                                        <input type="text" name="user_RealName" class="form-control" required 
                                                            placeholder="">
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <label for="user_Address">ที่อยู่</label>
                                                        <textarea class="form-control" required name="user_Address"
                                                            rows="3"></textarea>
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <label for="user_Postal">รหัสไปรษณีย์</label>
                                                        <input type="number" min="0" name="user_Postal"
                                                            class="form-control" required placeholder="">
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <label for="user_Email">อีเมล์</label>
                                                        <input type="text" name="user_Email" class="form-control" required
                                                            placeholder="">
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <label for="user_Phone">เบอร์โทรศัพท์</label>
                                                        <input type="text" name="user_Phone" class="form-control" required
                                                            placeholder="">
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <label for="user_Name">ชื่อผู้ใช้</label>
                                                        <input type="text" id="user_Name" name="user_Name" class="form-control" required
                                                            placeholder="">
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <label for="user_Password">รหัสผ่าน</label>
                                                        <input type="password" id="user_Password" name="user_Password" class="form-control" required
                                                            placeholder="">
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <label for="user_Password_chk">รหัสผ่านอีกครั้ง</label>
                                                        <input type="password" id="user_Password_chk" name="user_Password_chk" class="form-control" required
                                                            placeholder="">
                                                    </div>

                                                    <div class="form-group col-12 pt-3">
                                                        <a href="login.php" class="btn btn-light">ย้อนกลับ</a>
                                                        <button type="button" id="btnSubmit" 
                                                            class="btn btn-success">สมัครสมาชิก</button>
                                                    </div>

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

    <script>
        $("#btnSubmit").click(function (e) { 
            e.preventDefault();

            var user_Password = $("#user_Password").val();
            var user_Password_chk = $("#user_Password_chk").val();

            if(user_Password != user_Password_chk) {
                alert("รหัสผ่านไม่ตรงกัน");
                return;
            } else {

                $("#frmAdd").submit();
            }
        });
    </script>

</body>

</html>