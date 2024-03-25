<?php
ob_start();
include "head.php";
include "header.php";
include "menu.php";
require "connect/config.php";
require "removecart.php";
?>
<!--//////////////////////////////////////////////////-->
<!--///////////////////Cart Page//////////////////////-->
<!--//////////////////////////////////////////////////-->
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cart.php">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
        <?php
        if (is_countable($_SESSION['cart']) == 0) {
            echo "<script>window.location.replace('http://localhost:3000/giohangrong.php'); </script>";
        }else{
        ?>
        <div class="cart">
            <p><?php
                $ok = 1;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        if (isset($key)) {
                            $ok = 2;
                        }
                    }
                }

                if ($ok == 2) {
                    echo "Có " . count($_SESSION['cart']) . " sách trong giỏ hàng ";
                } 
                $sl = count($_SESSION['cart']);
                ?>
            </p>
        </div>
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

                <div class="row">
                    <form name="form5" id="ff5" method="POST" action="">
                        <div class="product well">
                            <div class="col-md-3">
                                <div class="image">
                                    <img src="img/<?php echo $s["sp_img"] ?>" style="width:300px;height:300px" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="caption">
                                    <div class="name">
                                        <h3><a href="product.php?id=<?php echo $s["sp_id"] ?>"><?php echo $s["sp_ten"] ?></a></h3>
                                    </div>
                                    <div class="info">
                                        <ul>
                                            <li>Nhà xuất bản: <?php echo $s["nxb_name"] ?></li>
                                        </ul>
                                    </div>
                                    <?php
                                    if ($s["sp_khuyenmai"] == true) {
                                    ?>
                                        <div class="price"><?php echo $s["sp_giakhuyenmai"] ?>VNĐ</div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($s["sp_khuyenmai"] == false) {
                                    ?>
                                        <div class="price"><?php echo $s["sp_gia"] ?>VNĐ</div>
                                    <?php
                                    }
                                    ?>

                                    <label>Số lượng: </label>
                                    <input class="form-inline quantity" style="margin-right: 80px;width:50px" min="1" max="99" type="number" name="qty[<?php echo $s["sp_id"] ?>]" value="<?php echo $_SESSION['cart'][$s["sp_id"]] ?>">
                                    <hr>
                                    <form method="POST">
                                    <button type="submit" name="remove" class="btn  pull-right" style="color:black;">Xóa sản phẩm</button>
                                    <input type="hidden" name="idsprm" value="<?php echo $s["sp_id"] ?>" />
                                    </form>
                                    <?php
                                    if ($s["sp_khuyenmai"] == true) {
                                    ?>
                                        <label style="color:red">Thành tiền: <?php ;
                                                                                echo  $_SESSION['cart'][$s["sp_id"]] * $s["sp_giakhuyenmai"] ?>.000 </label>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($s["sp_khuyenmai"] == false) {
                                    ?>
                                        <label style="color:red">Thành tiền: <?php
                                                                                echo  $_SESSION['cart'][$s["sp_id"]] * $s["sp_gia"] ?>.000VND</label>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </form>
                    <?php
                    if ($s["sp_khuyenmai"] == true) {
                    ?>
                        <?php
                        $total += $_SESSION['cart'][$s["sp_id"]] * $s["sp_giakhuyenmai"] ?>
                    <?php
                    }
                    ?>
                    <?php
                    if ($s["sp_khuyenmai"] == false) {
                    ?>
                        <?php
                        $total += $_SESSION['cart'][$s["sp_id"]] * $s["sp_giakhuyenmai"] ?>
                    <?php
                    }
                    ?>

                </div>
        <?php
            }
        }
        ?>
        <!--Xóa hết sản phẩm-->
        <div class="row">
            <form action="" method="POST">
                <button type="submit" name="removeAll" class="btn btn-2" style="margin-bottom:31px">Xóa tất cả sản phẩm</button>
            </form>
            <div class="col-md-4 col-md-offset-8 ">
                <center><a href="index.php" class="btn btn-1" style="margin-left:-76px">Chọn những sách khác</a></center>
            </div>
            <div class="row">
                <div class="pricedetails">
                    <div class="col-md-4 col-md-offset-8">
                        <table style="margin-right:31px">
                            <h6>Price Details</h6>
                            <tr>
                                <td>Số lượng sách </td>
                                <td><?php echo $sl ?></td>
                            </tr>
                            <tr style="border-top: 1px solid #333">
                                <td>
                                    <h5>Tổng cộng</h5>
                                </td>
                                <td><?php echo $total ?>.000</td>
                            </tr>
                        </table>
                        <center><a href="dathang.php" class="btn btn-1">Đặt hàng</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
<?php
        }
?>
<?php ob_end_flush(); ?>
<?php
include "footer.php"
?>
