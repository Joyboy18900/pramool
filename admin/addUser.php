<?php 

require_once "checkSessionUser.php";

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "include/header.php"; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once "layout/sidebarMenu.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once "layout/topbarMenu.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 text-gray-800">เพิ่มข้อมูลสมาชิก</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ฟอร์มรายละเอียดสมาชิก</h6>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-9 offset-3">

                                    <form id="frmAdd" action="userController.php?addUser" method="POST">

                                        <div class="form-group col-7">
                                            <label for="user_RealName">ชื่อ-นามสกุล</label>
                                            <input type="text" name="user_RealName" class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Name">ชื่อผู้ใช้</label>
                                            <input type="text" name="user_Name" class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Password">รหัสผ่าน</label>
                                            <input type="password" name="user_Password" class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Address">ที่อยู่</label>
                                            <textarea class="form-control" name="user_Address" rows="3"></textarea>
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Postal">รหัสไปรษณีย์</label>
                                            <input type="number" min="0" name="user_Postal" class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Email">อีเมล์</label>
                                            <input type="text" name="user_Email" class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Phone">เบอร์โทรศัพท์</label>
                                            <input type="text" name="user_Phone" class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group col-7 pt-3">
                                            <a href="User.php" class="btn btn-light">ย้อนกลับ</a>
                                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                                        </div>

                                    </form>

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