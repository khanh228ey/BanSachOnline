<?php
include 'head.php';
include 'header.php';
include 'menu.php';
?>
<!--//////////////////////////////////////////////////-->
<!--///////////////////Product Page///////////////////-->
<!--//////////////////////////////////////////////////-->
<div id="page-content" class="single-page">
	<?php
	require 'connect/config.php';
	//lay san pham theo id
	$id = $_GET["sp_id"];
	$query = "SELECT s.sp_id,s.sp_ten,s.sp_gia,s.sp_giakhuyenmai,s.sp_img,sp_khuyenmai,s.nxb_id,s.sp_mota,s.tacgia,n.nxb_name , n.nxb_id
   from sanpham s 
   LEFT JOIN nhaxuatban n on n.nxb_id = s.nxb_id WHERE  s.sp_id = " . $id;
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	// them san pham vao gio hang nếu chưa đăng nhập thì người dùng cần đăng nhập
	if (isset($_POST['submit'])) {
		if (isset($_SESSION['txtusername'])) {
			$idsp = $_POST["idsp"];
			$sl;
			if (isset($_SESSION['cart'][$idsp])) {
				$sl = $_SESSION['cart'][$idsp] + 1;
			} else {
				$sl = 1;
			}
			$_SESSION['cart'][$idsp] = $sl;
			echo "<script>window.location.replace('http://localhost:3000/cart.php'); </script>";
		} else {
			header("Location:acccount.php");
		}
	}

	?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Trang chủ</a></li>
					<li><a href="#">Sách</a></li>
					<li><a href="#"><?php echo $row["sp_ten"] ?></a></li>
				</ul>
			</div>
		</div>
		<div class="row">

			<div id="main-content" class="col-md-8">
				<div class="product">
					<div class="col-md-6">
						<div class="image">
							<img src="img/<?php echo $row["sp_img"] ?>" style="width:300px;height:300px" />

						</div>
					</div>
					<div class="col-md-6">
						<div class="caption">
							<div class="name">
								<h5><?php echo $row["sp_ten"] ?></h5>
							</div>
							<div class="info">
								<ul>
									<li>Tác giả: <b><?php echo $row["tacgia"] ?></b></li>
									<li>Nhà xuất bản: <a href=""><?php echo $row["nxb_name"] ?></a>
										<h3>
									</li>
								</ul>
							</div>
							<?php
							if ($row["sp_khuyenmai"] == true) {
							?>
								<div class="price"><?php echo $row["sp_giakhuyenmai"] ?> VNĐ<span><?php echo $row["sp_gia"] ?> VNĐ</span></div>
							<?php
							}
							?>
							<?php
							if ($row["sp_khuyenmai"] == false) {
							?>
								<p style="color:red">Không có khuyến mãi</p>
								<div class="price"><?php echo $row["sp_gia"] ?> VNĐ<span></span></div>
							<?php
							}
							?>

							<div class="well">
								<form name="form3" id="ff3" method="POST" action="">
									<input type="submit" name="submit" id="add-to-cart" class="btn btn-2" value="Thêm vào giỏ hàng" />
									<a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Mua ngay</a>
									<input type="hidden" name="acction" value="them vao gio hang" />
									<input type="hidden" name="idsp" value="<?php echo $row["sp_id"] ?>" />
								</form>
							</div>


							<div class="modal fade" id="myModal" role="dialog">

								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" style="text-align: center">Thông tin khách hàng</h4>
										</div>
										<div class="modal-body">
											<p>Chức năng mua ngay giúp bạn mua nhanh mà không cần đăng nhập hoặc đặt hàng với một thông tin khác với thông tin trên tài khoản. Tuy nhiên bạn chỉ có thể mua một loại sách trong một lần đặt hàng, bạn nên đăng nhập để không phải nhập lại thông tin cũng như mua nhiều loại sách cùng lúc.</p>
											<form name="form6" id="ff6" method="POST" action="<?php //include "luumuangay.php" 
																								?>">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Tên:" name="name" id="name" required>
												</div>
												<div class="form-group">
													<input type="email" class="form-control" placeholder="Email :" name="email" id="email" required>
												</div>
												<div class="form-group">
													<input type="tel" class="form-control" placeholder="Điện thoại :" name="phone" id="phone" required>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Địa chỉ :" name="txtdiachi" id="txtdiachi" required>
												</div>
												<div class="form-group">
													<input type="number" class="form-control" placeholder="Số lượng:" name="txtsoluong" id="txtsoluong" required>
												</div>
												<div class="form-group">
													<label><input type="date" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose" required></label>
												</div>
												<div class="form-group">
													<label> Hình thức thanh toán :<select class="selectpicker" name="hinhthuctt">
															<option value="ATM">Trả thẻ</option>
															<option value="Live">Trực tiếp</option>
															</optgroup>
														</select>
														</lable>
												</div>

												<input type="hidden" name="idsp" value="<?php echo $row["sp_id"] ?>" />
												<input type="hidden" name="gia" value="<?php echo $row["sp_gia"] ?>" />
												<button type="submit" name="muangay" class="btn btn-1">Đặt hàng</button>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>

								</div>
							</div>


						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product-desc">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#description">Thông tin sách</a></li>
					</ul>
					<div class="tab-content">
						<div id="description" class="tab-pane fade in active">

							<div innerHTML>
								<p><?php echo $row["sp_mota"] ?></p>
							</div>
						</div>

					</div>
				</div>
				<?php
				include "sanphamlienquan.php"
				?>

				<div class="clear"></div>
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
<!-- IMG-thumb -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="js/app.js"></script>
</body>
</html>
