<?php
    include 'connect.php';
?>
<?php
    include 'forall.php';
    include 'connect.php';
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
                        <li><a href="<?php echo $sitedomain; ?>index.php"><?php echo $engine['home']; ?></a></li>
                        <li><a href="<?php echo $sitedomain; ?>contact.php"><?php echo $engine['contacts']; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <img src="img/slider.jpg" class="img-rounded col-lg-12 col-md-12 col-xs-12">
    </div>
    
    <div class="container">
        <h2><?php echo $engine['succesfull']; ?></h2>
        <p><?php echo $engine['information_will_be_sent_in']; ?></p>
        <?php
            if  ($_POST['ik_inv_st'] == "success")
            {
                $selectall = mysql_query("UPDATE `buy` SET `stat`='succesfull' WHERE `specid`='$_POST[ik_pm_no]'");
                
                $get = mysql_query("SELECT * FROM `buy` WHERE `specid`='$_POST[ik_pm_no]'");
                $mysqlfetcharray = mysql_fetch_array($get);
                
                $tovid = $mysqlfetcharray['tov'];
                
                $mysqlquery = mysql_query("SELECT * FROM `goods` WHERE `id`='$tovid'");
                $mysqlfetar = mysql_fetch_array($mysqlquery);
                
                $suc_textm = $suc_text . $mysqlfetar['tovar'];
                
                mail($mysqlfetcharray['email'], $suc_title, $suc_textm);    
                
                if($mysqlfetar['unlim'] == "no")
                {
                    $update = mysql_query("UPDATE `goods` SET `perm`='cant' WHERE `id`='$tovid'");
                }
            }
            else {
                $selectall2 = mysql_query("UPDATE `buy` SET `stat`='error' WHERE `specid`='$_POST[ik_pm_no]'");
            }
        ?>
    </div>
    
    <div class="container margin-top50">
        <hr>
        <p class="footer-text"><?php echo $sitedomaincopy; ?> &copy; <?php echo $sitecopyyears; ?> <?php echo $sitecopy; ?></p>
    </div>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>