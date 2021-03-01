<?php 
require 'parts/header.php';
$day_product = $connect->prepare("SELECT `id_product`, `name_product`, `img_product`, `price` FROM `product` ORDER BY id_product DESC LIMIT 0,4");
$day_product->execute();
$day_product = $day_product->FETCHALL(PDO::FETCH_ASSOC);

$team = $connect->prepare("SELECT *FROM `team`");
$team->execute();
$team = $team->FETCHALL(PDO::FETCH_ASSOC);

$blog = $connect->prepare("SELECT *FROM `blog` ORDER BY id_topick DESC LIMIT 0,3");
$blog->execute();
$blog = $blog->FETCHALL(PDO::FETCH_ASSOC);
?>
<section id="main" class="main">
	<div class="blin2">
	    <img src="../img/bg/pancake_PNG97.png" alt="">
	</div> 
 	<div class="blin">
 		<img src="../img/bg/pancake_PNG97.png" alt="">
 	</div> 	
     <div class="container">   	
    	<div class="row">
    		<div class="col-md-12 text-center">
    			<div class="hero-text">
    				<h1><?php echo $seting[0]['main_title']; ?></h1>
    				<p><?php echo $seting[0]['main_sub_title']; ?></p>
    				<a  href="parts/product.php" class="btn btn-home-bg">Сделать заказ</a>
    			</div>
    		</div>
    	</div>
    </div>
</section>
<section id="top_day" class="top_day">
	<div class="container-fluid">
		<div class="text-center">
			<h2 class="texet-title">Топ дня</h2>
		</div>
		<div class="container">
			<div class="row wrapper-widger">			
		    <?php foreach ($day_product as $day_product) :?>
				<div class="col-sm-3">
					<div class="widget-top_day">
						<div class="widget_imge">
							<a href="parts/current_cart.php?id=<?=$day_product['id_product']?>" class="link_widget"><div class="widget" style="background-image: url(<?=$day_product['img_product']?>);"></div></a>
						</div>
						<div class="title-widger">
							<a href="parts/current_cart.php?id=<?=$day_product['id_product']?>"><span class="title-widger"><?=$day_product['name_product']?></span></a>
						</div>
						<div class="widget_price">
							<a href="parts/current_cart.php?id=<?=$day_product['id_product']?>"><span class="price"><?=$day_product['price']?> &#8381;</span></a>
						</div>
						<div class="widget_add">
							<a href="parts/add_sell.php?id=<?=$day_product['id_product']?>" class="add_prod" id="add_prod"><img src="img/icon/icon-price.png" alt=""><span class="add_text">Добавить в корзину</span></a>
						</div>
					</div>
				</div>	    	
		    <?php endforeach; ?>
			</div>			    
			<div class="row">
				<div class="butt_all">
					<a href="parts/product.php" class="btn btn_all">Посмотреть всё</a>
				</div>
			</div>		
		</div>
	</div>
</section>
<section id="we" class="we">
	<div class="container-fluid">
		<div class="text-center">
			<h2 class="texet-title">Те кто готовит для вас</h2>
		</div>
		<div class="container">
			<div class="row">
				<?php foreach ($team as $team) :?>
				<div class="col-sm-4">
					<div class="widget_team">
						<div class="photo">
							<img src="../img/team-2-249x249.jpg" alt="">
						</div>
						<div class="title_name">
							<span><?= $team['name_team'] ?></span>
						</div>
						<div class="sub-title">
							<span><?= $team['sub_text'] ?></span>
						</div>
					</div>
				</div>
			   <?php endforeach; ?>			
		</div>
	</div>
</section>
<section id="blog" class="blog">
	<div class="container-fluid">
		<div class="text-center">
			<h2 class="texet-title">Блог</h2>
		</div>	
	</div>
	<div class="container">
		<div class="blin-bg"></div>
		<div class="row row-30 row-xl-70">
			<?php foreach ($blog as $blog) : ?>
				<div class="col-sm-4 col-md-4">
					<article class="post-minimal">
						<a href="parts/current_news.php?id=<?= $blog['id_topick']?>" class="post-minimal-media">
							<img src="<?= $blog['imge']?>" alt="" class="post-minimal-image">
						</a>
						<div class="post-minimal-main">
							<h5 class="post-minimal-title">
								<a href="parts/current_news.php?id=<?= $blog['id_topick']?>"><?= $blog['sub_text']?></a>
							</h5>
							<p>
								<?= $blog['sub_full_text']?>
							</p>
							<div class="time">
								<a href="parts/current_news.php?id=<?= $blog['id_topick']?>"><?php echo(date('d ',strtotime($blog['date_add'])) .  $monthes[(date('n'))]); ?></a>
								<a href="parts/user.php?id=<?=$blog['user_id']?>"><?= $blog['user_login']?></a>
							</div>
						</div>
					</article>				
				</div>				
			<?php endforeach; ?>
		</div>
		<div class="row">
			<div class="butt_all">
				<a href="../parts/allnews.php" class="btn btn_all">Посмотреть всё</a>
			</div>
		</div>			
	</div>
</section>
<section id="coment" class="coment">
	<div class="container-fluid">
		<div class="text-center">
			<h2 class="texet-title">История</h2>
		</div>	
		<div class="container text-center">
			<div class="row">
				<div class="col-sm-7">
					<div class="stores">
						<div class="stores_p">
							<h1>Ру́сские блины́</h1>
							<p>Ру́сские блины́ — традиционное блюдо восточных славян, национальный вариант блинов. Традиционные русские блины готовятся на дрожжевом тесте, иногда завариваются в воде или молоке (заварные блины) перед выпечкой в традиционной русской печи. Раньше для их приготовления часто использовалась гречневая мука. Блины на пресном (бездрожжевом) тесте в дореволюционной литературе назывались блинцами, блинчиками или молочными блинами, и не были распространенным или обрядовым блюдом. Некоторые исследователи русской кухни считают тонкие блинчики из пресного теста поздним, заимствованным блюдом.</p>
							<p>Возникновение блинов уходит своими корнями в дохристианскую эпоху. Есть сведения, датированные V веком до нашей эры, о рецептах кислых лепешек, прародителей блинов, в Египте.Первые сведения о появлении блинов в рационе русичей относятся к 1005 году нашей эры. Тогда русичи баловали себя блинами, приготовленными при помощи дрожжей.Существует множество преданий возникновения блинов на Руси. Одно из них рассказывает, что первый блин – это результат выпаривания и поджаривания овсяного киселя, забытого хозяйкой в русской печи. Спохватившаяся хозяйка подала на стол подрумянившийся блин из овсяного киселя, который пришелся всем по вкусу. Как гласит легенда, благодаря случайности русичи стали обладателями вкусного лакомства под названием «блины».Крупнейший знаток русской кулинарии Вильям Похлебкин установил происхождение слова «блин». Это разновидность от «молоть», «млын» указывающее на приготовление блинов из перемолотых в муку злаков.Так сложилось с древних пор, что в блинное тесто использовались только высококачественные продукты. Ведь блины вместе с кутьей были «жертвенными» блюдами и подавались на поминки и праздники, приуроченные к дням усопших. Для этих целей пекли много блинов, которые раздавали бедному люду, чтобы те ели и поминали покойников.По одной из версий, в 11 веке блины стали главным символом Масленицы колоритного русского праздника, связанного с проводами зимы. Другая версия доказывает: золотой цвет блинов и их круглая форма имеют сходство с весенним солнцем и поэтому символизируют главное языческое божество Ярило, которому поклонялись славяне до принятия христианства.</p>
						</div>
					</div>
				</div>	
				<div class="col-sm-5 align-self-center">
					<div class="photo">
						<img src="../img/bg/VvT94-Eg1Gg.jpg" alt="" class="img-thumbnail">
					</div>
				</div>
		    </div>
	</div>	
</section>
<footer id="footer" class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-lg-4">
				<div class="footer-item">
					<div class="contact-info">
						<h3 class="text-center h3-form">Контакты</h3>
					</div>
					<div class="wrapper-contact">
						<div class="info-contact">
							<div class="phone info-contact_item"><span>Наш Телефон</span><a href="tel+:">894214214214</a></div>
							<div class="adrees info-contact_item"><span>Наш Адресс</span><a href="">Улица 34 уцй2</a></div>
							<div class="email info-contact_item"><span>Наш Емаил</span><a href="">blinu@mail.ru</a></div>
						</div>						
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-lg-4">
				<div class="footer-item">
				</div>
			</div>
			<div class="col-sm-4 col-lg-4">
				<h3 class="text-center h3-form">Напишите нам</h3>
				<div class="footer-item">
					<div class="contact-form">
						<form action="">
							<div class="txtb">
								<input type="text" name="" value="">
								<span data-placeholder="Ваше имя"></span>
							</div>

							<div class="txtb">
								<input type="email" name="" value="">
								<span data-placeholder="Ваша почта"></span>
							</div>

							<div class="txtb">
								<textarea name="" id="" cols="30" rows="10"></textarea>
							</div>									

							<div class="btn-div">
								<input type="submit" value="Отправить" class="btn-submit">	
							</div>					
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php  
require 'parts/footer.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
	 $(".menu-link").on("click", function (event) {
	    event.preventDefault();
	    var id  = $(this).attr('data'),
	      top = $(id).offset().top - 70;
	    $('body,html').animate({scrollTop: top}, 900);
	  });
	});	
	$(document).ready(function($){
    $('.sidebar-toggle').click(function (){
        $('.side-bar').toggleClass('toggled');
    });
    });
	$(document).ready(function(){
	  $('body').append('<button class="btn_up"/>');

	 $('.btn_up').click(function(){
	  $('body').animate({'scrollTop': 0}, 1000);
	  $('html').animate({'scrollTop': 0}, 1000);
	 });
	 
	 $(window).scroll(function(){
	  if($(window).scrollTop() > 20){
	   $('.btn_up').addClass('active');
	  }
	  else{
	   $('.btn_up').removeClass('active');
	  }
	 }); 
	});﻿

</script>