<?php 
require 'header.php';
$blog = $connect->prepare("SELECT *FROM `blog` ORDER BY id_topick DESC");
$blog->execute();
$blog = $blog->FETCHALL(PDO::FETCH_ASSOC);
?>
<section id="allnews" class="allnews">
	<div class="container bg_s">
		<div class="row row-30 row-xl-70">
			<?php foreach ($blog as $blog) : ?>
				<div class="col-sm-4 col-md-4">
					<article class="post-minimal">
						<a href="../parts/current_news.php?id=<?= $blog['id_topick']?>" class="post-minimal-media">
							<img src="<?= $blog['imge']?>" alt="" class="post-minimal-image">
						</a>
						<div class="post-minimal-main">
							<h5 class="post-minimal-title">
								<a href="../parts/current_news.php?id=<?= $blog['id_topick']?>"><?= $blog['sub_text']?></a>
							</h5>
							<p>
								<?= $blog['sub_full_text']?>
							</p>
							<div class="time">
								<a href="../parts/current_news.php?id=<?= $blog['id_topick']?>"><?php echo(date('d ',strtotime($blog['date_add'])) .  $monthes[(date('n'))]); ?></a>
								<a href="../parts/user.php?id=<?=$blog['user_id']?>"><?= $blog['user_login']?></a>
							</div>
						</div>
					</article>				
				</div>				
			<?php endforeach; ?>
		</div>
	</div>	
</section>
<?php 
require 'footer.php';
?>