<?php
include 'head.php';
include 'header.php';
include 'menu.php';
include 'slider.php';
?>
<div class="row">
	<div class="col-lg-12">
		<div class="heading">
			<h2>Sách đang khuyến mãi</h2>
		</div>

		<div class="products">
			<?php
			require 'connect/config.php';
			//lay danh sach san pham khuyen mai
			$sql = "SELECT * FROM sanpham   ORDER BY sp_id desc  limit 4 ";
			$result = $conn->query($sql);
			?>
			<?php
			if (!empty($result) && $result->num_rows > 0) {
				// output data of each row
				while ($row = $result->fetch_assoc()) {
			?>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="product">
							<div class="image"><a href="product.php?sp_id=<?php echo $row["sp_id"] ?>"><img src="img/<?php echo $row["sp_img"] ?>" style="width:300px;height:300px" /></a></div>
							<div class="caption">
								<div class="name">
									<h3><a href="product.php?sp_id=<?php echo $row["sp_id"] ?>"><?php echo $row["sp_ten"] ?></a></h3>
								</div>
								<?php
								if ($row["sp_khuyenmai"] == true) {
								?>
									<div class="price" style="color: red;"><?php echo $row["sp_giakhuyenmai"] ?>₫<span style="font-size: 14px;"><?php echo $row["sp_gia"] ?>₫</span></div>
								<?php
								} else {
								?>
									<div class="price" style="color: red;"><?php echo $row["sp_gia"] ?>₫</div>
								<?php
								}
								?>
								<div class="g-plusone" data-size="medium" data-annotation="none" data-href="/product.php?sp_id=<?php echo $row["sp_id"] ?>"></div>
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

</div>


</div>

</div>

</body>

</html>
<?php
	include 'footer.php';
?>

