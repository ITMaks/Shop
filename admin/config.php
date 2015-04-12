<!DOCTYPE html>
<?php
    include '../connect.php';
    include '../forall.php';
?>
<?php
    if($_COOKIE['login'] === $login and $_COOKIE['password'] === $password)
    {
?>
   
<html>
  <head>
    <title><?php echo $sitename; ?></title>
    <meta name="description" content="<?php echo $sitedesc; ?> | Created by Max Dmitriev">
    <meta name="author" content="Max Dmitriev">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>

  <body>

    <?php
        include 'nav.php';
      ?>

    <div class="container-fluid">
          <h1 class="page-header">Админ панель</h1>

          <h2 class="sub-header">Настройки</h2>
<?php
    if(isset($_POST['submit']))
    {
        ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              <strong>Успешно!</strong> Изменения внесенны, обновите страницу. <a href="config.php">[ОБНОВИТЬ]</a>
        </div>
        <?php
        
        $sitename = $_POST['sitename'];
        $sitedesc = $_POST['sitedesc'];
        $siteurl = $_POST['siteurl'];
        $sitedomain = $_POST['sitedomain'];
        $idvk = $_POST['idvk'];
        $namevk = $_POST['namevk'];
        $skype = $_POST['skype'];
        $icq = $_POST['icq'];
        $siteheart_enablea = $_POST['siteheart_enable'];
        $siteheart = $_POST['siteheart'];
        $interid = $_POST['interid'];
        $vkapi = $_POST['vkapi'];
        $login_admin = $_POST['login_admin'];
        $password_admin = $_POST['pass_admin'];
        
        file_put_contents("../settings.php",'
<?php
    $sitename = "' . $sitename . '";
    $sitedesc = "' . $sitedesc . '";

    $sitedomain = "' . $siteurl . '";
    $sitedomaincopy = "' . $sitedomain . '";
    $sitecopyyears = "2015";
    $sitecopy = "All rights reserved";

    $systemlang = "ru"; //ru - Russian;

    $interid = "' . $interid . '";

    ## CONTACTS ##
    $skype = "' . $skype . '";
    $vk = "' . $idvk . '";
    $vkname= "' . $namevk . '";
    $icq = "' . $icq . '";
    $siteheart_enable = ' . $siteheart_enablea .';
    $siteheart = ' . $siteheart . '; //ID siteheart
    $vkcommentid = ' . $vkapi . '; //VK.COM COMMENTS APP ID

    ## EMAIL ##
    $suc_title = "Вы успешно приобрели товар на сайте " . $sitedomaincopy;
    $suc_text = "Информация о купленном товаре: ";
    
    ## ADMIN ##
    $login = "' . $login_admin . '";
    $password = "' . $password_admin . '";
?>
');
    } else {
?>
<form action="config.php" method="post">
<div class="form-group">
    <label for="exampleInputEmail1">Название сайта</label>
    <input type="text" name="sitename" class="form-control" id="exampleInputEmail1" placeholder="Мой магазин" value="<? echo $sitename; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Описание сайта</label>
    <input type="text" name="sitedesc" class="form-control" id="exampleInputEmail1" placeholder="Самые дешевые и качественные товары" value="<? echo $sitedesc; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Адресс сайта http://domain.com/</label>
    <input type="text" name="siteurl" class="form-control" id="exampleInputEmail1" placeholder="http://domain.com/" value="<? echo $sitedomain; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Домен сайта domain.com</label>
    <input type="text" name="sitedomain" class="form-control" id="exampleInputEmail1" placeholder="domain.com" value="<? echo $sitedomaincopy; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ID в ВКонтакте</label>
    <input type="text" name="idvk" class="form-control" id="exampleInputEmail1" placeholder="itmakssss" value="<? echo $vk; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Имя в ВКонтакте</label>
    <input type="text" name="namevk" class="form-control" id="exampleInputEmail1" placeholder="Вася Пупкин" value="<? echo $vkname; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Skype</label>
    <input type="text" name="skype" class="form-control" id="exampleInputEmail1" placeholder="qwerty" value="<? echo $skype; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ICQ</label>
    <input type="text" name="icq" class="form-control" id="exampleInputEmail1" placeholder="1111-2222" value="<? echo $icq; ?>">
  </div>
  <div class="radio">
  <label>
    <input type="radio" name="siteheart_enable" id="optionsRadios1" value="false" <?php if($siteheart_enable === false){ echo 'checked'; } ?>>
    Выключить SiteHeart
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="siteheart_enable" id="optionsRadios2" value="true" <?php if($siteheart_enable === true){ echo 'checked'; } ?>>
    Включить SiteHeart
  </label>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Site Heart id</label>
    <input type="text" name="siteheart" class="form-control" id="exampleInputEmail1" placeholder="753408" value="<? echo $siteheart; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ID Interkassa</label>
    <input type="text" name="interid" class="form-control" id="exampleInputEmail1" placeholder="53987dc6bf4eoc541e2fa638" value="<? echo $interid; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">API ID VK.COM (Комментарии)</label>
    <input type="text" name="vkapi" class="form-control" id="exampleInputEmail1" placeholder="4723536" value="<? echo $vkcommentid; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Логин (Для входа в админ панель)</label>
    <input type="text" name="login_admin" class="form-control" id="exampleInputEmail1" placeholder="admin" value="<? echo $login; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Пароль (Для входа в админ панель)</label>
    <input type="text" name="pass_admin" class="form-control" id="exampleInputEmail1" placeholder="qwerty" value="<? echo $password; ?>">
  </div>
  <button type="submit" name="submit" class="btn btn-default">Сохранить</button>
</form>
    <?php
        }
     ?>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php 
        include '../footer.php';
      ?>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
   
<?php
    }
    else
    {
        echo 'Ошибка доступа';   
    }
?>