<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $sitename; ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="<?php echo $sitedesc; ?> | Created by Max Dmitriev">
    <meta name="author" content="Max Dmitriev">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>
  <body>
    <div class="container">
        <?php
    if(file_exists("connect.php"))
    {
        die("<h1>Удалите connect.php</h1>");   
    }
    elseif(file_exists("settings.php"))
    {
           die("<h1>Удалите settings.php</h1>");   
    }
    elseif (!isset($_POST['submit']))
    {
        echo '<form action="install.php" method="post">
        <div class="form-group">
    <label for="exampleInputEmail1">Host</label>
    <input type="text" name="host" class="form-control" id="exampleInputEmail1" placeholder="localhost">
  </div>
<div class="form-group">
    <label for="exampleInputEmail1">User</label>
    <input type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="root">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="qwerty">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Databaze</label>
    <input type="text" name="databaze" class="form-control" id="exampleInputEmail1" placeholder="baza">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Название сайта</label>
    <input type="text" name="sitename" class="form-control" id="exampleInputEmail1" placeholder="Мой магазин">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Описание сайта</label>
    <input type="text" name="sitedesc" class="form-control" id="exampleInputEmail1" placeholder="Самые дешевые и качественные товары">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Адресс сайта http://domain.com/</label>
    <input type="text" name="siteurl" class="form-control" id="exampleInputEmail1" placeholder="http://domain.com/">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Домен сайта domain.com</label>
    <input type="text" name="sitedomain" class="form-control" id="exampleInputEmail1" placeholder="domain.com">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ID в ВКонтакте</label>
    <input type="text" name="idvk" class="form-control" id="exampleInputEmail1" placeholder="itmakssss">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Имя в ВКонтакте</label>
    <input type="text" name="namevk" class="form-control" id="exampleInputEmail1" placeholder="Вася Пупкин">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Skype</label>
    <input type="text" name="skype" class="form-control" id="exampleInputEmail1" placeholder="qwerty">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ICQ</label>
    <input type="text" name="icq" class="form-control" id="exampleInputEmail1" placeholder="1111-2222">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Site Heart id</label>
    <input type="text" name="siteheart" class="form-control" id="exampleInputEmail1" placeholder="753408">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ID Interkassa</label>
    <input type="text" name="interid" class="form-control" id="exampleInputEmail1" placeholder="53987dc6bf4eoc541e2fa638">
  </div>
  <button type="submit" name="submit" class="btn btn-default">Submit!</button>
</form>';
      }
    elseif(isset($_POST['submit']))
    {
        $host = $_POST['host'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $databaze = $_POST['databaze'];
        
        $sitename = $_POST['sitename'];
        $sitedesc = $_POST['sitedesc'];
        $siteurl = $_POST['siteurl'];
        $sitedomain = $_POST['sitedomain'];
        $idvk = $_POST['idvk'];
        $namevk = $_POST['namevk'];
        $skype = $_POST['skype'];
        $icq = $_POST['icq'];
        $siteheart = $_POST['siteheart'];
        $interid = $_POST['interid'];
        
        file_put_contents("connect.php",'
<?php
	mysql_connect("' . $host . '","' . $user . '","' . $password . '");
	mysql_select_db("' . $databaze . '");
	mysql_query("SET NAMES UTF8");
	mysql_query("SET CHARACTER SET UTF8");
?>
');
        
        file_put_contents("settings.php",'
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
    $siteheart = ' . $siteheart . '; //ID siteheart

    ## EMAIL ##
    $suc_title = "Вы успешно приобрели товар на сайте " . $sitedomaincopy;
    $suc_text = "Информация о купленном товаре: ";
?>
');
        
       mysql_connect($host,$user,$password);
	   mysql_select_db($databaze);
	   mysql_query("SET NAMES UTF8");
	   mysql_query("SET CHARACTER SET UTF8");
        
        mysql_query("CREATE TABLE IF NOT EXISTS `buy` (
  `specid` text COLLATE utf8_bin NOT NULL,
  `tov` text COLLATE utf8_bin NOT NULL,
  `sym` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `stat` text COLLATE utf8_bin NOT NULL,
  `start_date` text COLLATE utf8_bin NOT NULL,
  `end_date` text COLLATE utf8_bin NOT NULL,
  `via` text COLLATE utf8_bin NOT NULL,
  `payed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;");
        
        mysql_query("CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text COLLATE utf8_bin NOT NULL,
  `full_img` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `warn` text COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `tovar` text COLLATE utf8_bin NOT NULL,
  `perm` text COLLATE utf8_bin COMMENT 'can/cant',
  `unlim` text COLLATE utf8_bin NOT NULL COMMENT 'yes/no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;");
        
       echo '<h1>Успешно! Удалите файл install.php Для завершения установки.</h1>';
    }
    else
    {
        echo 'ERROR';   
    }

      ?>
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>