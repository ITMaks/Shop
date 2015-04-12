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
                if(isset($_POST['edit']))
                {
                    ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Успешно!</strong> Товар успешно отредактирован.
                    </div>
                    <?php
                    $id = $_POST['id'];
                }   
                else
                {
                    $id = $_GET['id'];   
                }

                $get = mysql_query("SELECT * FROM `goods` WHERE `id`='$id'");
                $end = mysql_fetch_array($get);
            ?>
            <h2 class="sub-header">Редактирование товара ID: <? echo $id; ?></h2>
            
           <form action="edit.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">ID</label>
                <input type="text" name="id" class="form-control" value="<? echo $_GET['id'] ?>" readonly>
              </div>
             <div class="form-group">
                <label for="exampleInputEmail1">Название</label>
                <input type="text" name="name" class="form-control" placeholder="Тестовая покупка" value="<? echo $end['name']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Большое изображение</label>
                <input type="text" name="full_img" class="form-control" placeholder="nope.png" value="<? echo $end['full_img']; ?>">
              </div>
              <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Подсказка:</strong> Изображение загружать в папку img/full/ а сюда писать только название. Пример: "test.png". Если изображения нету напишите "nope.png".
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Описание</label>
                <textarea class="form-control" rows="6" name="description"><? echo $end['description']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Значок</label>
                <textarea class="form-control" rows="1" name="warn"><? echo $end['warn']; ?></textarea>
              </div>
              <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Пример:</strong>  &lt;sup class="new">NEW&lt;/sup> = <sup class="new">NEW</sup> ; &lt;sup class="hot">-15%&lt;/sup> = <sup class="hot">-15%</sup>.
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Стоимость</label>
                <input type="text" name="cost" class="form-control" placeholder="2" value="<? echo $end['cost']; ?>">
              </div>
              <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Подсказка:</strong> указывать нужно только число.
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Товар</label>
                <input type="text" name="tovar" class="form-control" placeholder="Логин:Пароль" value="<? echo $end['tovar']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Возможность покупать</label>
                <input type="text" name="perm" class="form-control" placeholder="can" value="<? echo $end['perm']; ?>">
              </div>
              <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Подсказка:</strong> can - товар можно купить ; cant - товара нельзя купить.
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Кол-во</label>
                <input type="text" name="unlim" class="form-control" placeholder="yes" value="<? echo $end['unlim']; ?>">
              </div>
              <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Подсказка:</strong> yes - товар бесконечный ; no - товар можно купить только один раз.
                </div>

              <button type="submit" name="edit" class="btn btn-default">Сохранить</button>
            </form>
           
            <?php
                if(isset($_POST['edit']))
                {
                    $first_letter = substr($_POST[name], 0, 1);
                    
                    $do = mysql_query("UPDATE `goods` SET `first_letter`='$first_letter', `full_img`='$_POST[full_img]', `description`='$_POST[description]', `name`='$_POST[name]', `warn`='$_POST[warn]', `cost`='$_POST[cost]',`tovar`='$_POST[tovar]', `perm`='$_POST[perm]', `unlim`='$_POST[unlim]' WHERE `id`='$_POST[id]'");   
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