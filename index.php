<?php 
require_once "checkSessionUser.php";
require_once "include/connectDB.php";
require_once "admin/productController.php";

$rows_product = showProductByStatusNotApprove($conn, $_SESSION['user_ID']);

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
            <h1 class="h3 mb-0 text-gray-800">รายการสินค้า</h1>
          </div>

          <!-- Content Row -->

          <div class="row">

            <?php if(empty($rows_product)) { ?>
            <div class="col-xl-12 col-lg-12">
              <div class="alert alert-danger" role="alert">
                <strong>แจ้งเตือน</strong> ยังไม่มีสินค้าออกประมูล ! 
              </div>
            </div>
            <?php } ?>

            <?php foreach ($rows_product as $key => $value) { ?>

            <!-- Area Chart -->
            <div class="col-xl-4 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">รายการสินค้า</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body text-center">
                  <div>
                    <h5><?php echo $value["item_Name"]; ?></h5>
                  </div>
                  <div class="image mb-3">
                    <img
                      src="<?php echo (!empty($value["item_Path"])) ? "admin/assets/img/imageProduct/" . $value["item_Path"] : "admin/assets/img/example.jpg"; ?>"
                      width="250" class="img-responsive" alt="รูปสินค้า">
                  </div>
                  <div class="mb-4">
                    <h6>ราคาล่าสุด : 
                      <span style="font-weight: normal !important;">
                        <?php echo number_format($value["item_Actual_Price"]) . ' บาท'; ?>
                      </span>
                    </h6>
                  </div>
                  <a href="productDetail.php?item_ID=<?php echo $value["item_ID"]; ?>" class="btn btn-outline-primary">ประมูลสินค้านี้</a>
                </div>
              </div>
            </div>

            <?php } ?>

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