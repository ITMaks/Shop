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

          <h2 class="sub-header">Удаление товара</h2>
            <?php
            $id = $_GET['id'];
            
            mysql_query("DELETE FROM `goods` WHERE `id`='$id'");
            ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4>Успешно удаленно</h4>
      <p>Товар с ID <? echo $id;?> успешно был удалён!</p>
      <p>
        <a href="<?php echo $sitedomain; ?>admin/index.php" type="button" class="btn btn-danger">На главную</a>
      </p>
    </div>
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