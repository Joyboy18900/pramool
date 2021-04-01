<?php 
require_once "checkSessionUser.php";
require_once "include/connectDB.php";
require_once "userController.php";

$rows_user = showUsers($conn);

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
                        <h1 class="h3 text-gray-800">สมาชิกทั้งหมด</h1>
                        <a href="addUser.php" class="btn btn-outline-primary text-right">เพิ่มข้อมูลสมาชิก</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">รายการสมาชิก</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>รหัสสมาชิก</th>
                                            <th>ชื่อผู้ใช้</th>
                                            <th>อีเมล์</th>
                                            <th>เบอร์โทรศัพท์</th>
                                            <th>จัดการข้อมูล</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rows_user as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value["user_ID"]; ?></td>
                                            <td><?php echo $value["user_Name"]; ?></td>
                                            <td><?php echo $value["user_Email"]; ?></td>
                                            <td><?php echo $value["user_Phone"]; ?></td>
                                            <td>
                                                <a href="editUser.php?user_ID=<?php echo $value["user_ID"]; ?>" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="userController.php?user_ID=<?php echo $value["user_ID"]; ?>&deleteUser" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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