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
                        <li><a href="<?php echo $sitedomain; ?>index.php"><?php echo $engine['main']; ?></a></li>
                        <li><a href="<?php echo $sitedomain; ?>contact.php"><?php echo $engine['contacts']; ?></a></li>
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
            <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $engine['id']; ?></th>
            <th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $engine['image']; ?></th>
            <th class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><?php echo $engine['name']; ?></th>
            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $engine['price']; ?> (<?php echo $engine['currency']; ?>)</th>
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
                $selectall = mysql_query("SELECT * FROM `goods` WHERE `perm`='can'");
                $mysqlfetcharray = mysql_fetch_array($selectall);
    
                do {
                    printf('
            <tr>
                <td>%s</td>
                <td class="img-center"><a href="' . $sitedomain . 'view.php?id=%s"><img src="' . $sitedomain . 'img/' . '%s" class="img-rounded" width="50" height="50" alt="%s"></a></td>
                <td><a href="' . $sitedomain . 'view.php?id=%s"><p>%s %s</p></a></td>
                <td>%s</td>
            </tr>',$mysqlfetcharray['id'],$mysqlfetcharray['id'],$mysqlfetcharray['img'],$mysqlfetcharray['name'],$mysqlfetcharray['id'],$mysqlfetcharray['name'],$mysqlfetcharray['warn'],$mysqlfetcharray['cost']);   
                } while($mysqlfetcharray = mysql_fetch_array($selectall));
            ?>
        </tbody>
      </table>
    </div>
    
    <div class="container margin-top50">
        <hr>
        <p class="footer-text"><?php echo $sitedomaincopy; ?> &copy; <?php echo $sitecopyyears; ?> <?php echo $sitecopy; ?> | Created by Max Dmitriev</p>
    </div>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>