<?php 
require 'header.php';
	$all_product = $connect->prepare("SELECT * FROM `product` ORDER BY id_product DESC");
	$all_product->execute();
	$all_product = $all_product->FETCHALL(PDO::FETCH_ASSOC);
?>
<section id="product" class="product">
	<div class="container bg_s">
			<div class="row">
		<?php foreach ($all_product as $all_product) :?>				
				<div class="col-sm-4">
					<div class="widget-top_day">
						<div class="widget_imge">
							<a href="../parts/current_cart.php?id=<?=$all_product['id_product']?>" class="link_widget"><div class="widget" style="background-image: url(<?=$all_product['img_product']?>);"></div></a>
						</div>
						<div class="title-widger">
							<a href="../parts/current_cart.php?id=<?=$all_product['id_product']?>"><span class="title-widger"><?=$all_product['name_product']?></span></a>
						</div>
						<div class="widget_price">
							<a href="../parts/current_cart.php?id=<?=$all_product['id_product']?>"><span class="price"><?=$all_product['price']?> Руб</span></a>
						</div>
						<div class="widget_add">
							<a href="../parts/add_sell.php?id=<?=$all_product['id_product']?>"><img src="img/icon/icon-price.png" alt=""><span class="add_text">Добавить в корзину</span></a>
						</div>
					</div>
				</div>	
		<?php endforeach; ?>							
			</div>
	</div>
</section>
<?php 
require 'footer.php';
?>