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
           <?php
                if(isset($_POST['add']))
                {
                    ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Успешно!</strong> Товар успешно добавлен.
                    </div>
                    <?php
                }   
            ?>
            <h2 class="sub-header">Добавление товара</h2>
            
           <form action="add.php" method="post">
             <div class="form-group">
                <label for="exampleInputEmail1">Название*</label>
                <input type="text" name="name" class="form-control" placeholder="Тестовая покупка" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Большое изображение*</label>
                <input type="text" name="full_img" class="form-control" value="nope.png" placeholder="nope.png" required>
              </div>
              <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Подсказка:</strong> Изображение загружать в папку img/full/ а сюда писать только название. Пример: "test.png". Если изображения нету напишите "nope.png".
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Описание*</label>
                <textarea class="form-control" rows="6" name="description" required></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Значок</label>
                <textarea class="form-control" rows="1" name="warn"></textarea>
              </div>
              <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Пример:</strong>  &lt;sup class="new">NEW&lt;/sup> = <sup class="new">NEW</sup> ; &lt;sup class="hot">-15%&lt;/sup> = <sup class="hot">-15%</sup>.
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Стоимость*</label>
                <input type="text" name="cost" class="form-control" placeholder="2" required>
              </div>
              <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Подсказка:</strong> указывать нужно только число.
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Товар*</label>
                <input type="text" name="tovar" class="form-control" placeholder="Логин:Пароль" required>
              </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Параметры*</label>
              <div class="radio">
                  <label>
                    <input type="radio" name="perm" id="optionsRadios1" value="can" checked>
                    Можно купить
                  </label>
              </div>
              <div class="radio">
                  <label>
                    <input type="radio" name="perm" id="optionsRadios1" value="cant">
                    Нельзя купить
                  </label>
              </div>
              </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Кол-во*</label>
              <div class="radio">
                  <label>
                    <input type="radio" name="unlim" id="optionsRadios1" value="no" checked>
                    Товар одноразовый
                  </label>
              </div>
              <div class="radio">
                  <label>
                    <input type="radio" name="unlim" id="optionsRadios1" value="yes">
                    Товар многоразовый
                  </label>
              </div>
              </div>
              
              <button type="submit" name="add" class="btn btn-default">Добавить</button>
            </form>
           
            <?php
                if(isset($_POST['add']))
                {
                    $first_letter = substr($_POST[name], 0, 1);
                    
                    $do = mysql_query("INSERT INTO `goods`(`first_letter`, `full_img`, `description`, `name`, `warn`, `cost`, `tovar`, `perm`, `unlim`) VALUES ('$first_letter','$_POST[full_img]','$_POST[description]','$_POST[name]','$_POST[warn]','$_POST[cost]','$_POST[tovar]','$_POST[perm]','$_POST[unlim]')") or die(mysql_error);   
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