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

          <h2 class="sub-header">Все товары</h2>
          <a class="btn btn-default" href="<?php echo $sitedomain; ?>admin/add.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Добавить товар</a>
          <div class="table-responsive">
            <table class="table table-bordered table-hover margin-top10">
        <thead>
          <tr>
            <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Действия</th>
            <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $engine['id']; ?></th>
            <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $engine['image']; ?></th>
            <th class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?php echo $engine['name']; ?></th>
            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $engine['price']; ?> (<?php echo $engine['currency']; ?>)</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $selectall = mysql_query("SELECT * FROM `goods`");
                $mysqlfetcharray = mysql_fetch_array($selectall);

                $first = "e67e22";
                $second = "e74c3c";
                $third = "3498db";
                $forth = "9b59b6";
                $fivth = "f1c40f";
    
                do {
                    $rand = rand(1,5);
                    
                    if($rand == 1) {
                        $color = $first;
                    }
                    elseif($rand == 2)
                    {
                        $color = $second;
                    }
                    elseif($rand == 3)
                    {
                        $color = $third;
                    }
                    elseif($rand == 4)
                    {
                        $color = $forth;
                    }
                    else
                    {
                        $color = $fivth;
                    }
                    
                    printf('
            <tr>
                <td> <a title="Удалить" href="' . $sitedomain . 'admin/delete.php?id=%s"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> <a title="Редактировать" href="' . $sitedomain . 'admin/edit.php?id=%s"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                <td>%s</td>
                <td class="center"><div style="background-color: #%s" class="shape">%s</div></td>
                <td><a target="_blank" href="' . $sitedomain . 'view.php?id=%s"><p>%s %s</p></a></td>
                <td>%s</td>
            </tr>',$mysqlfetcharray['id'],$mysqlfetcharray['id'],$mysqlfetcharray['id'],$color,$mysqlfetcharray['first_letter'],$mysqlfetcharray['id'],$mysqlfetcharray['name'],$mysqlfetcharray['warn'],$mysqlfetcharray['cost']);   
                } while($mysqlfetcharray = mysql_fetch_array($selectall));
            ?>
        </tbody>
      </table>
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