<?php
include "head.php";
include "header.php";

include "menu.php";
require '../connect/config.php';
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php
            //lay san pham theo id
            $id = $_GET["sp_id"];
            $query = "SELECT sp_id , sp_ten ,sp_gia , sp_giakhuyenmai , sp_img , sp_khuyenmai , tacgia , sp_mota , nxb_name 
   from sanpham s 
   LEFT JOIN nhaxuatban n on n.nxb_id = s.nxb_id 
	WHERE  sp_id =" . $id;
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            ?>
            <section class="content-header">
                <h1>
                    Chi tiết
                    <small>Sách</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->

                    <!-- right column -->

                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Chi tiết Sách</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2">Tên:</label>
                                        <div class="col-sm-5">
                                            <p><?php echo $row["sp_ten"] ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Hình ảnh:</label>
                                        <div class="col-sm-2">
                                            <p><img src="../img/<?php echo $row["sp_img"] ?>" style="width:300px;height:300px"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 ">Nhà xuất bản:</label>
                                        <div class="col-sm-5">
                                            <p><?php echo $row["nxb_name"] ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 ">Tác giả</label>
                                        <div class="col-sm-5">
                                            <p><?php echo $row["tacgia"] ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 ">Giá:</label>
                                        <div class="col-sm-5">
                                            <p><?php echo $row["sp_gia"] ?>.000 VNĐ</p>
                                        </div>
                                    </div>
                                    <?php
                                    if ($row["sp_khuyenmai"]  == 1) {
                                    ?>
                                        <div class="form-group">
                                            <label class="col-sm-2">Khuyến mãi:</label>
                                            <div class="col-sm-5">
                                                <p style="color:red">Có khuyến mãi</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2">Giá khuyến mãi:</label>
                                            <div class="col-sm-5">
                                                <p style="color:red"><?php echo $row["sp_giakhuyenmai"] ?>.000 VNĐ</p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($row["sp_khuyenmai"]  == 0) {
                                    ?>
                                        <div class="form-group">
                                            <label class="col-sm-2">Khuyến mãi:</label>
                                            <div class="col-sm-5">
                                                <p style="color:red">Không có khuyến mãi</p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 ">Mô tả: </label>
                                        <div class="col-sm-5">
                                            <p><?php echo $row["sp_mota"] ?></p>
                                        </div>

                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <a href="dssach.php"><button type="button" name="cancel" class="btn btn-default">Cancel</button></a>
                                </div><!-- /.box-footer -->
                            </form>
                        </div><!-- /.box -->
                        <!-- general form elements disabled -->
                        <!-- /.box -->
                    </div><!--/.col (right) -->
                </div> <!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <?php
        include "footer.php";
        ?>
        <div class="control-sidebar-bg">
        </div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <script>
        $(function() {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>