<?php 
require_once "checkSessionUser.php";
require_once "include/connectDB.php";
require_once "userController.php";

$rows_user = showUserById($conn, $_GET["user_ID"]);

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
                        <h1 class="h3 text-gray-800">แก้ไขข้อมูลสินค้า</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ฟอร์มรายละเอียดสินค้า</h6>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-9 offset-3">

                                    <form id="frmAdd" action="userController.php?editUser" method="POST" enctype="multipart/form-data">

                                        <div class="form-group col-7 d-none">
                                            <label for="user_ID">รหัสสมาชิก</label>
                                            <input type="text" name="user_ID" class="form-control" value="<?php echo $rows_user["user_ID"]; ?>" placeholder="" readonly>
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_RealName">ชื่อ-นามสกุล</label>
                                            <input type="text" name="user_RealName" class="form-control" value="<?php echo $rows_user["user_RealName"]; ?>" placeholder="">
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Name">ชื่อผู้ใช้</label>
                                            <input type="text" name="user_Name" class="form-control" value="<?php echo $rows_user["user_Name"]; ?>" placeholder="" readonly>
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Address">ที่อยู่</label>
                                            <textarea class="form-control" name="user_Address" rows="3"><?php echo $rows_user["user_Address"]; ?></textarea>
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Postal">รหัสไปรษณีย์</label>
                                            <input type="number" min="0" name="user_Postal" class="form-control" value="<?php echo $rows_user["user_Postal"]; ?>" placeholder="">
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Email">อีเมล์</label>
                                            <input type="text" name="user_Email" class="form-control" value="<?php echo $rows_user["user_Email"]; ?>" placeholder="">
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="user_Phone">เบอร์โทรศัพท์</label>
                                            <input type="text" name="user_Phone" class="form-control" value="<?php echo $rows_user["user_Phone"]; ?>" placeholder="">
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

    <script>
        $(function () {
            $('#dataTable').DataTable();
        });
    </script>

</body>

</html>