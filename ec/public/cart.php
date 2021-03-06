<?php

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Cart();

$app->run();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <title>I love Hamilton</title>
</head>
<body>
  <div id="wrapper">
  	<header class="product_header">

  			<div id="header-left">
  			</div>
  			<div id="header-center">
  				<a href="index.php">
  					<h1>I love Hamilton</h1>
  				</a>
  			</div>
  			<div id="header-right">
  				<nav>
  					<ul>
  						<li><a href="login.php"><?= h($app->login_name()); ?></a></li>
  						<li><?= $app->signupOrLogout(); ?></li>
  						<li><a href="cart.php">cart</a></li>
  						<li>
  							<div class="humberger">
  								<span></span>
  								<span></span>
  								<span></span>
  							</div>
  						</li>
  					</ul>
  				</nav>
  			</div>


  		<div class="side_bar">
  			<ul>
  				<li></li>
  				<li></li>
  				<li></li>
  			</ul>
  		</div>

  	</header>


    <div id="hum-hide">
      <ul>
        <li><a href="login.php"><span class="loginName"><?= h($app->login_name()); ?></span></a></li>
        <li><?= $app->signupOrLogout(); ?></li>
        <li><a href="cart.php">cart</a></li>
      </ul>
    </div>

  	<div id="content-wrap">
  		<div class="content">


        <?php if (isset($_SESSION['cart'])) : ?>

          <div class="cart_detail_wrap">
            <?php foreach($app->getDetailForCart() as $detail) : ?>
              <div class="cart_detail">
                <div class="cart_img">
                  <img src="image/<?= h($detail['url']); ?>">
                </div>
                <div class="cart_info">
                  <h1><?= h($detail['collection']); ?></h1>
                  <h2><?= h($detail['name']); ?></h2><h3><?= h($detail['belt']); ?>/<?= h($detail['color']); ?></>
                </div>
                <div class="cart_product_price">
                  <h1>¥<?= h($detail['price']); ?></h1>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="buy">
            <p class="cart_total">TOTAL<span>¥<?= h($app->showTotal()); ?></span></p>
            <form action="bought.php" method="post">
              <button id="buy_button" type="submit">BUY</button>
            </form>
            <a href="empty_cart.php"><p id="empty_button">Clear Cart</p></a>
            <a href="index.php"><p id="to_product">BACK TO PRODUCT PAGE</p></a>
          </div>

        <?php else : ?>
          <div class="empty_cart">
            <p>there is no items in a cart</p>
          </div>
          <div class="buy">
            <p class="cart_total">TOTAL<span>¥<?= h($app->showTotal()); ?></span></p>
            <form action="bought.php" method="post">
              <button id="buy_button" type="submit">BUY</button>
            </form>
            <a href="empty_cart.php"><p id="empty_button">Clear Cart</p></a>
            <a href="index.php"><p id="to_product">BACK TO PRODUCT PAGE</p></a>
          </div>
        <?php endif; ?>

  		</div>
  	</div>

  	<footer>
  		<div id="footer-wrap">
  			<div id="footer-left">
  				<ul class="footer-li">
  					<li><a href="company.php">ご利用規約</a></li>
  					<li><a href="company.php">プライバシーポリシー</a></li>
  					<li><a href="company.php">特定商取引に基づく表記</a></li>
  					<li><a href="company.php">会社概要</a></li>
  				</ul>
  				<ul class="follow-me">
  	  				<li><a href="https://twitter.com"></a></li>
  	  				<li><a href="https://www.facebook.com"></a></li>
  	  				<li><a href="https://plus.google.com"></a></li>
  				</ul>
  			</div>
  			<div id="footer-right">
  				<small><p>I love Hamilton</p>Copyright©️ 2018 I love Hamilton All Rights Reserved.</small>
  			</div>
  		</div>
  	</footer>

  </div>

</body>
</html>
