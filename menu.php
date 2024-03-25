<nav id="menu" class="navbar">
	<div class="container">
		<div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
			<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Trang chủ</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Nhà xuất bản</a>
					<div class="dropdown-menu">
						<div class="dropdown-inner">
							<ul class="list-unstyled">
								<?php
								//lay id nha san xuat
								require 'connect/config.php';
								$laydanhsachnhasx = "SELECT nxb_name ,nxb_id from nhaxuatban";
								$rstennhasx = $conn->query($laydanhsachnhasx);
								if ($rstennhasx->num_rows > 0) {
									// output data of each row
									while ($row = $rstennhasx->fetch_assoc()) {

								?>
										<li><a href="cartegory.php?nxb_id=<?php echo $row["nxb_id"]?>"><?php echo $row["nxb_name"] ?></a></li>
								<?php
									}
								}
								?>
							</ul>
				<li><a href="https://shopee.vn/saigon_books">Shoppe</a></li>
				<li><a href="contact.php">Liên hệ</a></li>

		</div>
	</div>
	</li>
	</ul>
	</div>
	</div>
</nav>