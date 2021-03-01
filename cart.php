<?php
session_start();
require_once 'parts/header.php';
?>
<section id="cart" class="cart">
        <div class="container bg_s">
          <div class="title_block text-center">
            <p>Корзина</p>
          </div>
          <div class="row">
          <? if (isset($_SESSION['order'])) : ?>
            <div class="col-md-12">
              <div class="wrapper-last-order">
                <h2 class="cart-title">Ваш заказ под номером <? echo $_SESSION['order'] ?>
                    принят</h2>
                    <br>
                <a href="index.php" class="back">Вернуться на главную</a>                
              </div>  
              <hr>          
            </div>
          <?php endif; ?>

           <? if (count($_SESSION['cart']) == 0) : ?>
            <div class="col-md-12 text-center cart_clear">
                <h2 class="cart-title">Ваша корзина пуста, добавьте товар</h2>
                <br>
                <a href="../index.php" class="back">Вернуться на главную</a>              
            </div>
          <?php endif; ?>            
         <? foreach ($_SESSION['cart'] as $key => $product) : ?>
            <div class="col-md-12 text-center">
              <div class="cart">
                <a href="parts/current_cart.php?id=<?= $product['id']?>">
                    <img src="<?=$product['img'] ?>" alt="Фото>" width="200">
                </a>
                <div class="cart-descr text-center"> 
                    <div class="title">
                      <? echo $product['title'] ?>
                    </div>
                    <div class="count">
                      <? echo $product['quantity'] ?> шт
                    </div>
                    <div class="price">
                     <? echo $product['quantity'] * $product['price'] ?> рублей                     
                    </div>
                </div>
                <form action="parts/delet_cart.php" method="POST">
                    <input type="hidden" name="delete" value="<? echo $key ?>">
                    <input type="submit" value="Удалить" class="delet-key">
                </form>
            </div>             
          </div>
              <?php endforeach; ?>
          </div>
          <?php if (!$_SESSION['cart'] == ''): ?>
            <hr>
            <div class="row order">
            <div class="col-md-12">
              <div class="title-block text-center">
                <p>Оформить заказ</p>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-send">
                 <form action="admin_content/action_order.php" method="POST" class="order">
                    <div class="tota-price">
                      <p><span>Итог:</span><?= $_SESSION['totalPrice'] ?> рублей</p>
                    </div>
                          <textarea name="count" style="display: none;visibility: hidden;z-index: -99999;" cols="30" rows="10">
                          <?php  foreach ($_SESSION['cart'] as $product) : ?>
                            <?=$product['title']?>(<?= $product['quantity']?> шт)                          
                            <?php endforeach; ?>
                            </textarea>
                            <input type="hidden" name="qunt" value="<?= @$_SESSION['totalPrice'] ?> Р.">
                            <p><input type="submit" name="order" class="order_send" value="Заказать"></p>
                </form>                   
                <form action="parts/delet_cart.php" method="POST">
                 <p><input type="submit" name="delete_all" value="Очистить корзину" class="delet-key"></p>                 
                </form>                  
              </div>               
            </div>
          </div>                    
         <?php endif ?>      
        </div>
    </section> 
<?php 
require_once 'parts/footer.php';
