<?php 
require_once '../db/config.php';
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/style.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.php">На Сайт</a>
  <a class="navbar-brand" href="index_admin.php">В панель управления</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="add_topick.php">Добавить Запись</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="add_product.php">Добавить Товар</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="list_post.php">Список Записей</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="list_product.php">Список Товаров</a>
      </li>    
      <li class="nav-item active">
        <a class="nav-link" href="seting_site.php">Настройки сайта</a>
      </li> 
      <li class="nav-item active">
        <a class="nav-link" href="user_list.php">Управление пользователями</a>
      </li>                      
      <li class="nav-item active">
        <a class="nav-link" href="list_order.php">Заказы</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="story_order.php">История заказов</a>
      </li>      
    </ul>
          <?php if (isset($_SESSION['loged'])) : ?>
            <div class="navbar-nav ml-auto">
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
            </div>            
            <?php endif;?>      
  </div>
</nav>