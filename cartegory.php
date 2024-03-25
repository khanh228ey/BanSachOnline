<?php
ob_start();
?>
<?php
include "head.php";
include "header.php";
include "menu.php";
?>
<!--//////////////////////////////////////////////////-->
<!--///////////////////Category Page//////////////////-->
<!--//////////////////////////////////////////////////-->
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Trang chủ</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div id="main-content" class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="products">
                            <?php
                            require 'connect/config.php';
                            //lay san pham theo id
                            $nxb = $_GET["nxb_id"];
                            $sql_s = 'select count(nxb_id) as total from sanpham where nxb_id = ' . $nxb;
                            $result = $conn->query($sql_s);
                            $row = $result->fetch_assoc();
                            if ($row['total'] == 0) {
                            ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="heading">
                                            <h1 style="color:red">không có Sách nào</h1>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    $result = mysqli_query($conn, "SELECT * FROM sanpham where nxb_id = '$nxb' LIMIT 4 ");
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {

                                    ?>

                                        <div class="col-lg-4 col-md-4 col-xs-12">
                                            <div class="product">
                                                <div class="image"><a href="product.php?sp_id=<?php echo $row["sp_id"] ?>"><img src="img/<?php echo $row["sp_img"] ?>" style="width:300px;height:300px" /></a></div>
                                                <div class="caption">
                                                    <div class="name">
                                                        <h3><a href="product.php?sp_id=<?php echo $row["sp_id"] ?>"><?php echo $row["sp_ten"] ?></a></h3>
                                                    </div>
                                                    <div class="price"><?php echo $row["sp_gia"] ?> VNĐ</div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                </div>
                        </div>

                    </div>


                    <div class="row text-center">
                        <ul class="pagination">
                            <?php

                            ?>
                            <?php
                            ?>
                        </ul>
                    </div>


                </div>
                <?php

                include "sidebar.php"
                ?>
            </div>
        </div>
    </div>
    <?php
    include "footer.php"
    ?>
    </body>

    </html>
    <?php ob_end_flush(); ?>