<?php
    include 'connect.php';
    include 'forall.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $sitename; ?></title>
    <meta name="description" content="<?php echo $sitedesc; ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <meta name="author" content="Max Dmitriev">
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
        <img src="img/slider.jpg" class="img-rounded col-lg-12 col-md-12 col-xs-12">
    </div>
    
    <div class="container">
       <h2>Подтвердите покупку</h2>
        <table class="table table-bordered table-hover margin-top10">
        <thead>
          <tr>
            <th>#</th>
            <th>Изображение</th>
            <th>Название</th>
            <th>Цена</th>
          </tr>
        </thead>
        <tbody>
         <?php
            $id = (int) $_POST['good'];

            $selectall = mysql_query("SELECT * FROM `goods` WHERE `id`='$id' and `perm`='can'");
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
      <form id="payment" name="payment" method="post" action="https://sci.interkassa.com/" enctype="utf-8">
            <?php
            $selectall2 = mysql_query("SELECT * FROM `goods` WHERE `id`='$id'");
            $mysqlfetcharray2 = mysql_fetch_array($selectall2);
    
            do {
                $texttop = $mysqlfetcharray2['name'] . $mysqlfetcharray2['id'] . rand(9999,9999999);
                $sicretop = md5($texttop);

                $create_ticket = mysql_query("INSERT INTO `buy`(`specid`, `tov`, `sym`, `email`, `stat`) VALUES ('$sicretop','$mysqlfetcharray2[id]','$mysqlfetcharray2[cost]','$_POST[email]','started')");
                
                printf('
                <input type="hidden" name="ik_pm_no" value="%s" />
                <input type="hidden" name="ik_am" value="%s" />
                <input type="hidden" name="ik_desc" value="%s" />'
                        ,$sicretop,$mysqlfetcharray2['cost'],$mysqlfetcharray2['name']);   
            } while($mysqlfetcharray2 = mysql_fetch_array($selectall2));
            ?>
            <input type="hidden" name="ik_co_id" value="<?php echo $interid; ?>" />
	        <input type="hidden" name="ik_cur" value="RUB" />
            <input type="submit" class="col-lg-12 col-md-12 col-xs-12 col-sm-12 btn btn-success" value="Оплатить">
      </form>
    </div>
    
    <div class="container margin-top50">
        <hr>
        <p class="footer-text"><?php echo $sitedomaincopy; ?> &copy; <?php echo $sitecopyyears; ?> <?php echo $sitecopy; ?></p>
    </div>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>