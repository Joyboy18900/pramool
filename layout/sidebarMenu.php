<?php 
if(session_status() == PHP_SESSION_NONE) {

    session_start();
}
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">Pramool <sup>ประมูล</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>หน้าแรก</span></a>
    </li>

    <?php if(isset($_SESSION['user_ID']) && $_SESSION['userRole'] == 0) { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        จัดการข้อมูล
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="userProduct.php">
            <i class="fas fa-fw fa-cog"></i>
            <span>ข้อมูลสินค้าของฉัน</span></a>
    </li>

    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        รายงาน 
    </div>
    
    <?php if(isset($_SESSION['user_ID']) && $_SESSION['userRole'] == 0) { ?>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="userPramoolProduct.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>สินค้าที่ประมูลได้</span></a>
    </li>

    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>