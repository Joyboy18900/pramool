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
                        <h1 class="h3 text-gray-800">เพิ่มข้อมูลสินค้า</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ฟอร์มรายละเอียดสินค้า</h6>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-9 offset-3">

                                    <form id="frmAdd" action="admin/productController.php?addProduct" method="POST" enctype="multipart/form-data">

                                        <div class="form-group col-7">
                                            <label for="item_Name">ชื่อสินค้า</label>
                                            <input type="text" name="item_Name" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="item_Description">รายละเอียดสินค้า</label>
                                            <textarea class="form-control" name="item_Description" rows="3" required></textarea>
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="item_Increment_Price">ราคาเริ่มต้น</label>
                                            <input type="number" min="0" name="item_Increment_Price" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="form-group col-7">
                                            <label for="item_Path">รูปสินค้า</label>
                                            <input type="file" name="item_Path" class="form-control" accept="image/*"  placeholder="" required>
                                        </div>

                                        <div class="form-group col-7 pt-3">
                                            <a href="userProduct.php" class="btn btn-light">ย้อนกลับ</a>
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