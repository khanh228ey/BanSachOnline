<?php
ob_start();
?>
<?php
include "head.php";
include "header.php";
include "menu.php";
require '../connect/config.php';
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php
            //lay san pham theo id
            $id = $_GET["sp_id"];
            $query = "SELECT sp_id , sp_ten ,sp_gia , sp_giakhuyenmai , sp_img , sp_khuyenmai , tacgia , sp_mota , s.nxb_id as nxb,nxb_name 
from sanpham s 
LEFT JOIN nhaxuatban n on n.nxb_id = s.nxb_id 
WHERE  sp_id =" . $id;
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            ?>
            <section class="content-header">
                <h1>
                    Sửa
                    <small>Sách</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang quản trị</a></li>
                </ol>
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
                                <h3 class="box-title">Sửa Sách</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="POST" action="<?php include 'xulysach.php' ?>" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tên</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" value="<?php echo $row["sp_ten"] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Hình ảnh</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="hinhanh" value="<?php echo $row["sp_img"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tác giả</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tacgia" value="<?php echo $row["tacgia"] ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Ảnh hiện tại: </label>
                                        <div class="col-sm-10">
                                            <img src="../img/<?php echo $row["sp_img"] ?>" style="width:300px;height:300px">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $row["sp_id"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Nhà xuất bản</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" style="width: 100%;" name="manhasx">
                                            <option selected="selected" value="<?php echo $row["nxb"] ?>"><?php echo $row["nxb_name"] ?></option>
                                            <?php
                                            $sqls = "SELECT nxb_id,nxb_name from nhaxuatban where nxb_id !=" . $row["nxb"];
                                            $results = $conn->query($sqls);
                                            if ($results->num_rows > 0) {
                                                // output data of each row
                                                while ($rows = $results->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $rows["nxb_id"] ?>"><?php echo $rows["nxb_name"] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Giá</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="gia" required value="<?php echo $row["sp_gia"] ?>">
                                    </div>
                                </div>
                                <?php
                                if ($row["sp_khuyenmai"]  == 1) {
                                ?>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Khuyến mãi</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%;" name="khuyenmai">
                                                <option selected="selected" value="1">Có khuyến mãi</option>
                                                <option value="0">Không khuyến mãi</option>
                                            </select>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if ($row["sp_khuyenmai"]  == 0) {
                                ?>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Khuyến mãi</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%;" name="khuyenmai">
                                                <option selected="selected" value="0">False</option>
                                                <option value="1">True</option>
                                            </select>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Giá khuyến mãi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="giakhuyenmai" value="<?php echo $row["sp_giakhuyenmai"] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả</label>
                                    <div class="col-sm-10">
                                        <textarea id="editor1" name="mota" name="mota" rows="10" cols="80">
                    <?php echo $row["sp_mota"] ?>
                    </textarea>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <a href="dssach.php"><button type="button" name="cancel" class="btn btn-default">Cancel</button></a>
                                    <button type="submit" name="edit" class="btn btn-info pull-right">Edit</button>
                                </div><!-- /.box-body -->
                        </div><!-- /.box-footer -->
                        </form>
                    </div><!-- /.box -->
                    <!-- general form elements disabled -->
                    <!-- /.box -->
                </div><!--/.col (right) -->
        </div> <!-- /.row -->
        </section><!-- /.content -->

        <?php
        include "footer.php";
        ?>

    </div><!-- /.content-wrapper -->

    <div class="control-sidebar-bg"></div>
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
<?php ob_end_flush(); ?>