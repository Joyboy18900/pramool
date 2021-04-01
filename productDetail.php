<?php
require_once "checkSessionUser.php";
require_once "include/connectDB.php";
require_once "admin/productController.php";
require_once "bitController.php";

$result_product = showProductById($conn, $_GET["item_ID"]);
$result_bid = showLastBitByItemId($conn, $_GET["item_ID"]);

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
                        <h1 class="h3 mb-0 text-dark">รายละเอียดสินค้า : <?php echo $result_product["item_Name"]; ?>
                        </h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">รายละเอียดการประมูล</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-4 d-flex">
                                            <div class="card shadow mb-2 border-bottom-primary">
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class="image mb-3 col-md-12">
                                                        <img src="<?php echo (!empty($result_product["item_Path"])) ? "admin/assets/img/imageProduct/" . $result_product["item_Path"] : "admin/assets/img/example.jpg"; ?>"
                                                            width="100%" height="250" class="img-responsive"
                                                            alt="รูปสินค้า">
                                                    </div>
                                                    <div>
                                                        <h5>

                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4 d-flex">
                                            <div class="card shadow mb-2 border-bottom-primary" style="width: 100%;">
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class=" b-3 col-md-12 text-center">
                                                        <h5 class="text-dark">ประมูลสูงสุดโดย</h5>
                                                    </div>
                                                    <div class=" b-3 col-md-12 text-center">
                                                        <h6 class="text-dark"><?php echo $result_product["user_Name"]; ?></h6>
                                                    </div>
                                                    <div class=" b-3 col-md-12 text-center mt-4"> 
                                                        <h6 class="text-dark">ราคาปัจจุบัน : <?php echo $result_product["item_Actual_Price"]; ?></h6>
                                                    </div>
                                                    <div class=" b-3 col-md-12 text-center mt-4"> 
                                                        <h6 class="text-dark"> วันที่เวลาปิดประมูล <br>
                                                            <?php 
                                                            echo date("d-m-Y H:i:s", strtotime($result_product["item_Close_Date"]));
                                                            ?>
                                                        </h6> 
                                                    </div>
                                                    <div class=" b-3 col-md-12 text-center mt-4"> 
                                                        <a href="bitController.php?bitProduct&item_ID=<?php echo $result_product["item_ID"]; ?>&item_Increment_Price=<?php echo $result_product["item_Increment_Price"]; ?>&item_Actual_Price=<?php echo $result_product["item_Actual_Price"]; ?>&item_Name=<?php echo $result_product["item_Name"]; ?>" class="btn btn-info">ประมูล/บิต</a>
                                                    </div>
                                                    <div class=" b-3 col-md-12 text-center mt-2"> 
                                                        <h6 class="text-dark">ราคา/บิต : <?php echo $result_product["item_Increment_Price"]; ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4 d-flex">
                                            <div class="card shadow mb-2 border-bottom-primary">
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div>
                                                        <h5 class="text-center text-dark">ประวัติการเสนอราคา</h5>
                                                    </div>
                                                    <div>
                                                        <h6 class="text-dark">ผู้ประมูล&nbsp;&nbsp;&nbsp;&nbsp;เวลาการบิต&nbsp;&nbsp;&nbsp;&nbsp;ราคาปัจจุบัน</h6>
                                                        <?php foreach ($result_bid as $key => $value) { ?>
                                                            <label class="text-dark text-xs">
                                                                <?php echo $value["user_Name"] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $value["bid_Date"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $value["bid_Price"]; ?>
                                                            </label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-12 mt-4">
                                            <div class="card shadow mb-2 border-bottom-primary">
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div>
                                                        <h2 class="text-dark">รายละเอียดสินค้า</h2>
                                                    </div>
                                                    <div>
                                                        <h5 class="text-dark"><?php echo $result_product["item_Description"]; ?></h5>
                                                    </div>
                                                </div>
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