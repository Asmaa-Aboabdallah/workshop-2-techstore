<?php include("inc/header.php"); ?>
<?php

use TeachStore\Classes\Models\Product;

$prod = new Product;
$product = $prod->selectId(11 , "products.name AS prodName , price , img , cats.name AS catName");
//print_r($product);


?>
	
	<!-- Banner -->

	<div class="banner">
		<div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image mr-5 pr-5"><img src="<?= URL; ?>uploads/<?= $product['img'] ?>" height="400" style=" transform: rotate(30deg);" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">new era of <?= $product['catName'] ?></h1>
						<div class="banner_price">$<?= $product['price'] ?></div>
						<div class="banner_product_name"><?= $product['prodName'] ?></div>
						<div class="button banner_button"><a href="<?= URL . "products.php"; ?>">Shop Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include("inc/footer.php"); ?>
