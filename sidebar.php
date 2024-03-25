<div id="sidebar" class="col-md-4">
	<div class="widget wid-categories">
		<div class="heading">
			<h4>Nhà xuất bản</h4>
		</div>
		<div class="content">
			<ul>
				<?php
				require 'connect/config.php';
				//lay san pham theo id
				$layidrandom = "SELECT nxb_id,nxb_name  from nhaxuatban";
				$kq = $conn->query($layidrandom);
				if ($kq->num_rows > 0) {
					// output data of each row
					while ($d = $kq->fetch_assoc()) {

				?>
						<li><a href="category.php?nxb_id=<?php echo $d["nxb_id"] ?>"><?php echo $d["nxb_name"] ?></a></li>
				<?php
					}
				}
				?>
			</ul>
		</div>
	</div>
	<div class="widget wid-product">
		<div class="heading">
			<h4>Sách khuyến mai</h4>
		</div>
		<div class="content">
			<?php

			$query = "SELECT * from sanpham where sp_khuyenmai = 0 limit 4;";
			$rs = $conn->query($query);
			if ($rs->num_rows > 0) {
				// output data of each row
				while ($row = $rs->fetch_assoc()) {

			?>
					<div class="product">
						<a href="product.php?sp_id=<?php echo $row["sp_id"] ?>"><img src="img/<?php echo $row["sp_img"] ?>" style="width:80px;height:100px" /></a>
						<div class="wrapper">
							<h5><a href="product.php?sp_id=<?php echo $row["sp_id"] ?>"><?php echo $row["sp_ten"] ?></a></h5>
							<div class="price"><?php echo $row["sp_gia"] ?>VNĐ</div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>