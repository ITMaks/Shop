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
    <div class="container">
        <h1><?php echo $sitename; ?></h1>
        <div class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#menu-open">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="menu-open">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo $sitedomain; ?>index.php">Главная</a></li>
                        <li><a href="<?php echo $sitedomain; ?>contact.php">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <img src="img/slider.jpg" class="img-rounded col-lg-12 col-md-12 col-xs-12" alt="Слайдер">
    </div>
    
    <div class="container">
        <table class="table table-bordered table-hover margin-top10">
        <thead>
          <tr>
            <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">#</th>
            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Изображение</th>
            <th class="col-xs-7 col-sm-7 col-md-7 col-lg-7">Название</th>
            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Цена (Руб.)</th>
          </tr>
        </thead>
        <tbody>
          <!--<tr>
            <td>1</td>
            <td>Table cell</td>
            <td>Table cell<sup class="new">NEW</sup></td>
            <td>Table cell<sup class="hot">-15%</sup></td>
          </tr>-->
            <?php
                $selectall = mysql_query("SELECT * FROM `goods`");
                $mysqlfetcharray = mysql_fetch_array($selectall);
    
                do {
                    printf('
            <tr>
                <td>%s</td>
                <td><img src="' . $sitedomain . 'img/' . '%s" class="img-rounded" width="25" height="25" alt="%s"></td>
                <td>
                    <a data-toggle="collapse" href="#collapse%s" aria-expanded="false" aria-controls="collapse%s">
                        %s
                    </a> %s
                    <div class="collapse class="col-xs-7 col-sm-7 col-md-7 col-lg-7" id="collapse%s">
                        <div class="well">
                            %s
                        </div>
                    </div>
                </td>
                <td>%s</td>
            </tr>'
                            ,$mysqlfetcharray['id'],$mysqlfetcharray['img'],$mysqlfetcharray['name'],$mysqlfetcharray['id'],$mysqlfetcharray['id'],$mysqlfetcharray['name'],$mysqlfetcharray['warn'],$mysqlfetcharray['id'],$mysqlfetcharray['description'],$mysqlfetcharray['cost']);   
                } while($mysqlfetcharray = mysql_fetch_array($selectall));
            ?>
        </tbody>
      </table>
      <form class="form-inline" role="form" action="buy.php" method="post">
          <div class="form-group">
                <label class="sr-only">Email</label>
                <input type="email" name="email" required class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
                <label class="sr-only">Товар</label>
                <select class="form-control" name="good">
                    <?php
                        $selectall1 = mysql_query("SELECT * FROM `goods`");
                        $mysqlfetcharray1 = mysql_fetch_array($selectall1);

                        do {
                            printf('
                            <option value="%s">%s</option>'
                                    ,$mysqlfetcharray1['id'],$mysqlfetcharray1['name']);   
                        } while($mysqlfetcharray1 = mysql_fetch_array($selectall1));
                    ?>
                </select>
          </div>
          <button type="submit" class="btn btn-default">Купить <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
        </form>
    </div>
    
    <div class="container margin-top50">
        <hr>
        <p class="footer-text"><?php echo $sitedomaincopy; ?> &copy; <?php echo $sitecopyyears; ?> <?php echo $sitecopy; ?> | Created by Max Dmitriev</p>
    </div>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>