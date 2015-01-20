<!DOCTYPE html>
<?php
    include 'connect.php';
    include 'forall.php';
?>
<html>
  <head>
    <title><?php echo $sitename; ?></title>
    <meta name="description" content="<?php echo $sitedesc; ?> | Created by Max Dmitriev">
    <meta name="author" content="Max Dmitriev">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>
  <body>
    <?php 
        include 'menu.php';
      ?>
    
    <?php
        include 'slider.php';
      ?>
    
    <div class="container">
     <h1><? echo $engine['faq']; ?></h1>
      <hr />
      <h3><? echo $engine['questions'] ?></h3>
       <a href="#1">Как купить товар?</a><br>
       <a href="#2">Как оставить свой отзыв о товаре?</a><br>
       <a href="#3">Как связаться с администратором?</a><br>
       <a href="#4">Какими способами я могу оплатить?</a><br>
       <a href="#5">Что я получу после оплаты?</a><br><br>
       
       <h3><? echo $engine['answers'] ?></h3>
        <div class="panel panel-default" id="1">
          <div class="panel-heading">
            <h3 class="panel-title">Как купить товар?</h3>
          </div><div class="panel-body">1.На главной странице выберете нужный вам товар и нажмите на его название<br> 2.Нажмите кнопку "Купить"<br> 3.Введите свой E-Mail на который вы потом получите купленный товар<br> 4.Нажмите "Купить"<br> 5.На этой странице убедитесь что это точно тот товар который вы хотите купить<br> 6.Нажмите "Оплатить"<br> 7.Оплатите товар любой подходящей системой<br> 8.В случае удачной покупки вас перенаправит на соответствующую страницу<br> 9.Зайдите на E-Mail который вы указывали на шаге №3, там будет сообщение с товаром который вы купили<br><br>
          P.S. Рекомендуем проверить папку "Спам"<br>
          <img src="img/help/pay/1.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding10 img img-rounded">
          <div class="alert alert-success" role="alert">Шаг 1</div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ogran"></div>
          <img src="img/help/pay/2.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding10 img img-rounded">
          <div class="alert alert-success" role="alert">Шаг 2</div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ogran"></div>
          <img src="img/help/pay/3.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding10 img img-rounded">
          <div class="alert alert-success" role="alert">Шаг 3</div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ogran"></div>
          <img src="img/help/pay/4.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding10 img img-rounded">
          <div class="alert alert-success" role="alert">Шаг 4</div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ogran"></div>
          <img src="img/help/pay/5.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding10 img img-rounded">
          <div class="alert alert-success" role="alert">Шаг 5</div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ogran"></div>
          <img src="img/help/pay/6.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding10 img img-rounded">
          <div class="alert alert-success" role="alert">Шаг 6</div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ogran"></div>
          <img src="img/help/pay/7.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding10 img img-rounded">
          <div class="alert alert-success" role="alert">Шаг 7</div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ogran"></div>
          </div>
        </div>
        <div class="panel panel-default" id="2">
          <div class="panel-heading">
            <h3 class="panel-title">Как оставить свой отзыв о товаре?</h3>
          </div><div class="panel-body">Для этого выберите товар нажмите на его название и перейдите во вкладку "Отзывы". Напишите там свой отзыв и нажмите отправить. Комментарий будет опубликован моментально и каждый сможет его просмотреть.
          <img src="img/help/feedback/1.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding10 img img-rounded">
          <div class="alert alert-success" role="alert">Шаг 1</div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ogran"></div>
          <img src="img/help/feedback/2.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding10 img img-rounded">
          <div class="alert alert-success" role="alert">Шаг 2</div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ogran"></div>
          </div>
        </div>
        <div class="panel panel-default" id="3">
          <div class="panel-heading">
            <h3 class="panel-title">Как связаться с администратором?</h3>
          </div><div class="panel-body">Зайдите в раздел контакты и выберете удобный для вас способ связи.</div>
        </div>
        <div class="panel panel-default" id="4">
          <div class="panel-heading">
            <h3 class="panel-title">Какими способами я могу оплатить?</h3>
          </div><div class="panel-body">На нашем сайте вы можете оплатить более чем 50 способами Visa, WebMoney, Qiwi, Яндекс.Деньги и другие. 
          <img src="img/help/payment/1.png" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding10 img img-rounded">
          <div class="alert alert-success" role="alert">Способы оплаты на нашем сайте</div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ogran"></div>
          </div>
        </div>
        <div class="panel panel-default" id="5">
          <div class="panel-heading">
            <h3 class="panel-title">Что я получу после оплаты?</h3>
          </div><div class="panel-body">После оплаты вы получите пиьсмо содержащее купленный вами товар.</div>
        </div>
    </div>
    
    <?php 
        include 'footer.php';
      ?>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>