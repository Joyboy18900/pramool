<?php 
require_once "checkSessionUser.php";
require_once "include/connectDB.php";
require_once "admin/productController.php";

$rows_product = showProductUsersByUsersID($conn, $_SESSION["user_ID"]);

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
                        <h1 class="h3 text-gray-800">สินค้าทั้งหมด</h1>
                        <a href="userProductAdd.php" class="btn btn-outline-primary text-right">เพิ่มข้อมูลสินค้า</a>
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
                                            <th>วันที่ปิดประมูล</th>
                                            <th>ราคาเริ่มต้น</th>
                                            <th>สถานะ</th>
                                            <th>จัดการข้อมูล</th>
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
                                            <td class="text-center">
                                                <button id="infoProduct" onclick="showInfoProduct(<?php echo $value['item_ID']; ?>);" class="btn btn-info btn-circle btn-sm">
                                                    <i class="fas fa-search"></i>
                                                </button>
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

    <!-- Modal -->
    <div class="modal fade" id="InfoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">รายละเอียดสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="table">
                        <table id="tableInfoProduct" class="table table-bordered">
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Javascript -->
    <?php include_once "include/script.php"; ?>

    <script>
        function showInfoProduct(item_ID) {
            
            $.ajax({
                type: "POST",
                url: "admin/productController.php?getProductById",
                data: {
                    item_ID: item_ID
                },
                dataType: "json",
                success: function (data) {
                    var rows = '';
                    rows += "<tr class='text-center'>" +
                    
                    "<td colspan=2><img width='250' src='admin/assets/img/imageProduct/"+ data.item_Path +"'></td>" + 
                    "</tr>" +

                    "<td>รหัสสินค้า</td>" + 
                    "<td>" + data.item_ID + "</td>" + 
                    "</tr>" + 

                    "<tr>" +
                    "<td>ชื่อสินค้า</td>" + 
                    "<td>" + data.item_Name + "</td>" + 
                    "</tr>" + 

                    "<tr>" +
                    "<td>รายละเอียดสินค้า</td>" + 
                    "<td>" + data.item_Description + "</td>" + 
                    "</tr>" + 

                    "<tr>" +
                    "<td>วันที่ปิดประมูล</td>" + 
                    "<td>" + data.item_Close_Date + "</td>" + 
                    "</tr>" + 

                    "<tr>" +
                    "<td>ราคาเริ่มต้น/บิต</td>" + 
                    "<td>" + data.item_Increment_Price + "</td>" + 
                    "</tr>" + 

                    "<tr>" +
                    "<td>ราคาปัจจุบัน</td>" + 
                    "<td>" + data.item_Actual_Price + "</td>" + 
                    "</tr>" + 

                    "<tr>" +
                    "<td>สถานะสินค้า</td>" + 
                    "<td>" + (data.item_Status == 1 ? "<span class='badge badge-pill badge-success'>สินค้าปิดประมูลแล้ว</span>" : "<span class='badge badge-pill badge-danger'>รอการประมูล</span>") + "</td>" + 
                    "</tr>" + 

                    "<tr>" +
                    "<td>ชื่อผู้ขาย</td>" + 
                    "<td>" + data.OwnUser_Name + "</td>" + 
                    "</tr>" + 

                    "<tr>" +
                    "<td>ชื่อผู้บิตล่าสุด</td>" + 
                    "<td>" + data.user_Name + "</td>" + 
                    "</tr>";

                    $("#tableInfoProduct tbody").empty();
                    $("#tableInfoProduct tbody").append(rows);
                }
            });

            $("#InfoModal").modal("show");
        }
    </script>

</body>

</html>