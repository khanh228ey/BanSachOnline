<?php
ob_start();
?>
<?php
include "head.php";
include "header.php";
include "menu.php";
require "connect/config.php";
require "luudathang.php";
?>
<!--//////////////////////////////////////////////////-->
<!--///////////////////Cart Page//////////////////////-->
<!--//////////////////////////////////////////////////-->

<form name="form6" id="ff6" method="POST" action="<?php include 'luudathang.php' ?>">
    <div id="page-content" class="single-page">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a style="text-align:center">Xác nhận đơn hàng</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông tin khách hàng</div>
                        <div class="panel-body">
                            <div class="col-md-8" style="margin-left: 130px;">
                                <label>Tên khách hàng : <?php echo  $_SESSION['hotenuser'] ?></label>
                                <label>Email:<?php echo $_SESSION['email'] ?></label>
                                <label><input type="text" class="form-control" placeholder="Nhập địa chỉ giao hàng   :" name="diachi" required></label>
                                <br />

                                <label><input type="date" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose" required></label>
                                <label> Hình thức thanh toán :<select class="selectpicker" name="hinhthuctt">
                                        <option value="ATM">Trả thẻ</option>
                                        <option value="Live">Trực tiếp</option>
                                        </optgroup>
                                    </select>
                                </label>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông tin đơn hàng</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sách</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart'] as $key  => $value) {
                                                    $item[] = $key;
                                                }
                                                // echo $item;
                                                $str = implode(",", $item);
                                                $query = "SELECT s.sp_id,s.sp_ten,s.sp_gia,s.sp_giakhuyenmai,s.sp_khuyenmai,s.sp_img,s.sp_mota, n.nxb_name ,s.nxb_id
                                                from sanpham s 
                                                LEFT JOIN nhaxuatban n on n.nxb_id = s.nxb_id
                                                 WHERE  s.sp_id  in ($str)";
                                                $result = $conn->query($query);

                                                $total = 0;
                                                foreach ($result as $s) {

                                            ?>
                                                    <tr>
                                                        <td><?php echo $s["sp_ten"] ?></td>
                                                        <td><?php echo $_SESSION['cart'][$s["sp_id"]] ?></td>
                                                        <?php
                                                        if ($s["sp_khuyenmai"] == true) {
                                                        ?>
                                                            <td><?php echo $s["sp_giakhuyenmai"] ?>.000 VNĐ</td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($s["sp_khuyenmai"] == false) {
                                                        ?>
                                                            <td><?php echo $s["sp_gia"] ?>.000 VNĐ</td>
                                                        <?php
                                                        }
                                                        ?>

                                                    </tr>
                                                    <?php
                                                    if ($s["sp_khuyenmai"] == true) {
                                                    ?>
                                                        <?php
                                                        $total += $_SESSION['cart'][$s["sp_id"]] * $s["sp_giakhuyenmai"]  ?>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($s["sp_khuyenmai"] == false) {
                                                    ?>
                                                        <?php
                                                        $total += $_SESSION['cart'][$s["sp_id"]] * $s["sp_gia"]  ?>
                                                    <?php
                                                    }
                                                    ?>

                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Thành tiền:</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th name="total" style="color:red"><strong style="color:red" id="result" name="total"><?php echo  $total    ?>.000 VNĐ</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Sách (<?php echo count($_SESSION['cart']) ?>)</div>
                    <div class="panel-body">
                        <?php

                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key  => $value) {
                                $item[] = $key;
                            }
                            // echo $item;
                            $str = implode(",", $item);
                            $query = "SELECT s.sp_id,s.sp_ten,s.sp_gia,s.sp_giakhuyenmai,s.sp_khuyenmai,s.sp_img,s.sp_mota, n.nxb_name ,s.nxb_id
				from sanpham s 
				LEFT JOIN nhaxuatban n on n.nxb_id = s.nxb_id
				 WHERE  s.sp_id  in ($str)";
                            $result = $conn->query($query);
                            foreach ($result as $s) {
                        ?>
                                <div class="product well">
                                    <div class="col-md-3">
                                        <div class="image">
                                            <img src="img/<?php echo $s["sp_img"] ?>" style="width:300px;height:300px" />
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="caption">
                                            <div class="name">
                                                <h3><a href="product.php?sp_id=<?php echo $s["sp_id"] ?>"><?php echo $s["sp_ten"] ?></a></h3>
                                            </div>
                                            <div class="info">
                                                <ul>
                                                    <li>Nhà xuất bản: <?php echo $s["nxb_name"] ?></li>
                                                </ul>
                                            </div>
                                            <?php
                                            if ($s["sp_khuyenmai"] == true) {
                                            ?>
                                                <div class="price"><?php echo $s["sp_giakhuyenmai"] ?> VNĐ</div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($s["sp_khuyenmai"] == false) {
                                            ?>
                                                <div class="price"><?php echo $s["sp_gia"] ?> VNĐ</div>
                                            <?php
                                            }
                                            ?>

                                            <!-- <label>Số lượng: </label>  -->
                                            <input class="form-inline quantity" type="hidden" name="qty[<?php echo $s["sp_id"] ?>]" value="<?php echo $_SESSION['cart'][$s["sp_id"]] ?>">
                                            <hr>

                                            <lable>Số lượng :<?php echo $_SESSION['cart'][$s["sp_id"]] ?></lable>
                                            <input type="hidden" name="idsprm" value="<?php echo $s["sp_id"] ?>" />
                                            <?php
                                            ?>

                                        </div>
                                    </div>

                                    <div class="clear"></div>
                                </div>


                        <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
            <input type="submit" name="dathang" value="Đặt hàng" class="btn btn-1" />
        </div>
    </div>
</form>
<?php
include "footer.php"
?>
</body>

</html>
<!-- Lấy ngày hiện tại -->
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
</script>
<script src="plugins/select2/select2.full.min.js"></script>
<?php ob_end_flush(); ?>