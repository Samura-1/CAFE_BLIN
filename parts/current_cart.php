<?php 
require 'header.php';
if (isset($_GET['id'])) {
	$curent_cart = $connect->prepare("SELECT * FROM `product` WHERE id_product = :id");
	$curent_cart->bindParam(':id',$_GET['id']);
	$curent_cart->execute();
	$curent_cart = $curent_cart->FETCHALL(PDO::FETCH_ASSOC);
}
	$more_product = $connect->prepare("SELECT `id_product`, `name_product`, `img_product`, `price` FROM `product` ORDER BY RAND() LIMIT 0,4");
	$more_product->execute();
	$more_product = $more_product->FETCHALL(PDO::FETCH_ASSOC);
?>
<section id="curent-card">
	<div class="container bg">
		<?php foreach ( $curent_cart as $view) : ?>
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<div class="product-img">
					<img src="<?= $view['img_product'] ?>" alt="">
				</div>
			</div>
			<div class="col-sm-6 col-md-6">
				<div class="info-product">
					<div class="title-product">
						<p class="title"><?= $view['name_product'] ?></p>
                        <p class="price"><?= $view['price'] ?> p.</p>	
						<p><?= $view['sub'] ?>.</p>                        					
					</div>
					<div class="add-product">
						<form action="add_sell.php" method="GET">
							<div class="inpadd">
								<br>
								<br>
								<p><input type="hidden" name="id" value="<?= $_GET['id']?>"></p>
							</div>
							<div class="btn-add-product">
								<input type="submit" value="Добавить в корзину">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>		
	    <?php endforeach; ?>
		<hr>
		<div class="row">
			<div class="col-sm-12 col-md-12 more">
				<p><a href="" class="moreinfo">Дополнительная информация</a></p>
				<div class="more-info-cart">
					<p class="more_text"><?= $view['more_info'] ?></p>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
			   <div class="title-more-cart ">
				<p class="text-center">Другие товары</p>
			   </div>
			</div>
			<?php foreach ($more_product as $more_product) : ?>
				<div class="col-sm-3 col-md-3">
					<div class="cart-more">
						<div class="head-cart">
							<a href="../parts/current_cart.php?id=<?=$more_product['id_product']?>"><img src="<?= $more_product['img_product'] ?>" alt=""></a>
						</div>
						<div class="body-cart-more">
							<a href="../parts/current_cart.php?id=<?=$more_product['id_product']?>"><h1><?= $more_product['name_product'] ?></h1></a>
							<p class="price"><?= $more_product['price'] ?> р.</p>
							<p><a href="../parts/add_sell.php?id=<?=$more_product['id_product']?>"><img src="../img/icon/icon-price.png" width="24" alt="">Добавить в корзину</a></p>
						</div>
					</div>
				</div>				
			<?php endforeach; ?>			
		</div>
	</div>
</section>
<?php 
require 'footer.php';