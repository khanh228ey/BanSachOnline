<?php
 session_start();
    $admin = $_SESSION['txtusername'];
    if($admin != "admin") {
        echo "<script>window.location.replace('http://localhost:3000/index.php'); </script>";
    }else{
        
    }
?>
<?php
include "head.php";
include "header.php";
include "menu.php";
ob_start();
?>
    

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Left side column. contains the logo and sidebar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Trang quản trị
                    <small>Admin</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Trang quản trị</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>Quản lý</h3>
                                <p>Sách</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="dssach.php" class="small-box-footer">xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>Quản lý</h3>
                                <p>Nhà xuất bản</p>
                            </div>
                            <div class="icon">
                                <i class="ion-ios-home"></i>
                            </div>
                            <a href="dsnxb.php" class="small-box-footer">xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>Danh Sách</h3>
                                <p>Khách hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion-person-stalker"></i>
                            </div>
                            <a href="dsuser.php" class="small-box-footer">Xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>Danh Sách</h3>
                                <p>Hóa đơn</p>
                            </div>
                            <div class="icon">
                                <i class="ion-printer"></i>
                            </div>
                            <a href="dshoadon.php" class="small-box-footer">Xem danh Sách <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                </div><!-- /.row -->
                <!-- Main row -->

            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <?php
        include "footer.php";
        ?>
        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <?php
    include "script.php";
    ?>
</body>

</html>
<?php ob_end_flush(); ?>