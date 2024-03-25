
<div class="product-related">
						<div class="heading"><h2>Sách liên quan</h2></div>
						<div class="products">
						<?php
   require 'connect/config.php';
   //lay san pham theo id
   $nxb = $row["nxb_id"];
   $truyvan="SELECT sp_id,sp_ten,sp_gia,sp_img
   from sanpham 
	WHERE  nxb_id = '$nxb'  limit 3 " ;
   $re = $conn->query($truyvan);
   if ($re ->num_rows > 0) {
	// output data of each row
	while($dong = $re ->fetch_assoc()) {

?>

							<div class="col-lg-4 col-md-4 col-xs-12">
								<div class="product">
									<div class="image"><a href="product.php?sp_id=<?php echo $dong["sp_id"]?>"><img src="img/<?php echo $dong["sp_img"]?>" style="width:300px;height:300px"/></a></div>
									<div class="caption">
										<div class="name"><h3><a href="product.php?sp_id=<?php echo $dong["sp_id"]?>"><?php echo $dong["sp_ten"]?></a></h3></div>										
									</div>
								</div>
							</div>
							<?php 
	}
}
							?>
						</div>