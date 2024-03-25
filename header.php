<?php
session_start();
?>

<body>
	<nav id="top">
		<div class="container">
			<div class="row">
				<div class="col-xs-6"> </div>
				<div class="col-xs-6">
					<ul class="top-link">
						<?php
						if (!isset($_SESSION['txtusername'])) // If session is not set then redirect to Login Page
						{
							printf('<li><a href="acccount.php"><span class="fa fa-sign-in"></span> Đăng nhập</a></li>
									<li><a href="account.php"><span class=""></span> Đăng kí</a></li>');
						} else {
							echo '<li><span class="fa fa-user-o"></span> Xin chào ';
							echo '<span style="color:Tomato;"><b>' . $_SESSION['hotenuser'] . '</b></span></li>';
							echo '<li><span class="fa fa-sign-out"></span><a href="logout.php"> Đăng xuất!</a></li>';
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<header class="container">
		<div class="row">
			<div class="col-md-4">
				<div id="logo"><img src="img/logo.png" /></div>
			</div>
			<div class="col-md-4">
				<form class="form-search">
					<input type="text" class="input-medium search-query">
					<button type="submit" class="btn"><span class="fa fa-search"></span></button>
				</form>
			</div>
			<div class="col-md-4">
				<div id="cart"><a class="btn btn-1"
				<?php 
				if(isset($_SESSION['hotenuser'])){ ?>
				 			href="cart.php">
							<?php
				}else{
					?>
					href="acccount.php">
					<?php
				}
							?>
						<span class="glyphicon glyphicon-shopping-cart"></span>CART
						(<?php
							$ok = 1;
							if (isset($_SESSION['cart'])) {
								foreach ($_SESSION['cart'] as $key => $value) {
									if (isset($key)) {
										$ok = 2;
									}
								}
							}

							if ($ok == 2) {
								echo count($_SESSION['cart']);
							} else {
								echo   "0";
							}


							?>)
							</a></div>
			</div>
		</div>
	</header>