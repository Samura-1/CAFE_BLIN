<?php
require_once $_SERVER['DOCUMENT_ROOT'].'../db/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Source+Sans+Pro:400,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap&subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../img/icon-flat.png">

    <title><?php echo $seting[0]['title_site']; ?></title>
  </head>
<body>
	<header id="header" class="header">
			<nav class="navbar navbar-expand-lg navigation bg fixed-top">
			  <div class="container">
				  <a class="navbar-brand" href="../index.php"><img src="../img/icon/icons8.png" alt="Блинны" width="35"><?php echo $seting[0]['title_site']; ?></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon">Меню</span>
				  </button>
				  <div class="collapse navbar-collapse justify-content-start" id="navbarNavAltMarkup">
					<ul class="navbar-nav">
					  <li class="nav-item"><a class="nav-link menu-link" href="../index.php" data="#main">Главная</a></li>
					  <li class="nav-item"><a class="nav-link menu-link" href="" data="#top_day">Топ дня</a></li>
					  <li class="nav-item"><a class="nav-link" href="../parts/product.php">Меню</a></li>
					  <li class="nav-item"><a class="nav-link menu-link" href="../index.php" data="#we">Сотрудники</a></li>				   
		   		      <li class="nav-item"><a class="nav-link" href="../parts/live.php">Трансляция</a></li>
					  <li class="nav-item"><a class="nav-link menu-link" href="../index.php" data="#blog">Блог</a></li>				  
					  <li class="nav-item"><a class="nav-link menu-link" href="../index.php" data="#footer">Контакты</a></li>
					</ul>
					<?php if (isset($_SESSION['loged'])) : ?>
				    <div class="navbar-nav ml-auto">
				    	<a href="../cart.php" class="add">
				    		<span><? echo $_SESSION['totalQuantity'] ? : 0; ?></span>
				    		<img src="../img/icon/online-store.png" width="25" alt="">
				    	</a>
				      <div class="login-head">
				      	<a class="nav-item nav-link" href="../parts/user.php?id=<?= $_SESSION['loged'][0]['id_user'] ?>"><?= $_SESSION['loged'][0]['login'] ?></a>
				      </div>	
				      <a class="nav-item nav-link" href="../parts/logaout.php">Выход</a>    	
				    </div>						
					<?php else  : ?>
				    <div class="navbar-nav ml-auto">
				      <div class="login-head">
				      	<a class="nav-item nav-link" href="../parts/loged-page.php">Войти</a>
				      </div>
				      <a class="nav-item nav-link" href="../parts/register-page.php">Зарегистрироваться</a>			    	
				    </div>						
				    <?php endif;?>						
				  </div>		  
			 </div>
			</nav>			
	</header>