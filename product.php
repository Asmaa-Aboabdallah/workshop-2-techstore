<?php
include("inc/header.php"); 
?>
<?php

use TeachStore\Classes\Cart;
use TeachStore\Classes\Models\Product; 
if($request->getHas('id')){
	$id = $request->get('id');
}else{
	$id = 1;
}

$pr = new Product;
$prod = $pr->selectId($id, "products.id AS prodId , products.name AS prodName, `desc` ,  price, img , cats.name AS catName ");
?>

	<!-- Single Product -->

	<?php if(! empty($prod)) : ?>
	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<!-- <div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="images/single_4.jpg"><img src="<?= URL; ?>assets/images/single_4.jpg" alt=""></li>
						<li data-image="images/single_2.jpg"><img src="<?= URL; ?>assets/images/single_2.jpg" alt=""></li>
						<li data-image="images/single_3.jpg"><img src="<?= URL; ?>assets/images/single_3.jpg" alt=""></li>
					</ul>
				</div> -->

				<!-- Selected Image -->
				<div class="col-lg-6 order-lg-2 order-1">
					<div class="image_selected"><img src="<?= URL . "uploads/" . $prod['img']; ?>" height="400px" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-6 order-3">
					<div class="product_description">
						<div class="product_category"><?=$prod['catName'];?></div>
						<div class="product_name"><?=$prod['prodName'];?></div>
						<div class="product_text"><p><?=$prod['desc'];?></p></div>
						<div class="order_info d-flex flex-row">
							<form method="POST" action="<?= URL;?>handlers/add-cart.php">
								<div class="clearfix" style="z-index: 1000;">

								    <input type="hidden" name="id" value="<?= $prod['prodId']; ?>">
								    <input type="hidden" name="name" value="<?= $prod['prodName']; ?>">
									<input type="hidden" name="price" value="<?= $prod['price']; ?>">
									<input type="hidden" name="img" value="<?= $prod['img']; ?>">
									

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" name="qty" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

                                    <div class="product_price">$<?=$prod['price'];?></div>

								</div>

								<?php if(! $cart->has($prod['prodId'])): ?>
									<div class="button_container">
										<button type="submit" name="submit" class="button cart_button">Add to Cart</button>
									</div>
								<?php endif; ?>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?php else:?>
		<div class="product_name text-center mt-5 pt-5" style="height: 200px;">
			No data Found
		</div>
	<?php endif;?>

<?php include("inc/footer.php"); ?>
