<?php 
require_once "checkSessionUser.php";
require_once "include/connectDB.php";
require_once "productController.php";

$rows_product = showProductSaleByUsers($conn);

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
                        <h1 class="h3 text-gray-800">รายการสินค้าที่ขาย</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">รายการสินค้า</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>รหัสสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>รายละเอียด</th>
                                            <th>เวลาปิดประมูล</th>
                                            <th>ราคาเริ่มต้น</th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rows_product as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value["item_ID"]; ?></td>
                                            <td><?php echo $value["item_Name"]; ?></td>
                                            <td><?php echo $value["item_Description"]; ?></td>
                                            <td><?php echo $value["item_Close_Date"]; ?></td>
                                            <td><?php echo $value["item_Increment_Price"]; ?></td>
                                            <td>
                                                <?php if($value["item_Status"] == 1) { ?>
                                                    <span class="badge badge-pill badge-success">สินค้าปิดประมูลแล้ว</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-pill badge-danger">รอการประมูล</span>
                                                <?php } ?>
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

</body>

</html>