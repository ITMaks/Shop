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
    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

    <script type="text/javascript">
        VK.init({apiId: 4723536, onlyWidgets: true});
    </script>

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
        <img src="img/slider.jpg" class="img-rounded col-lg-12 col-md-12 col-xs-12">
    </div>
    
    <div class="container">
    <h2><?php echo $engine['submit_buy']; ?></h2>
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
    <?php
        $id = (int) $_POST['id'];
        $email = $_POST['email'];

        $selectall = mysql_query("SELECT * FROM `goods` WHERE `id`='$id' and `perm`='can'");
        $mysqlfetcharray = mysql_fetch_array($selectall);
    
        if($mysqlfetcharray['perm'] == "can")
        {
            do {
                    printf('
            <tr>
                <td>%s</td>
                <td class="img-center"><a href="' . $sitedomain . 'view.php?id=%s"><img src="' . $sitedomain . 'img/' . '%s" class="img-rounded" width="50" height="50" alt="%s"></a></td>
                <td><a href="' . $sitedomain . 'view.php?id=%s"><p>%s %s</p></a></td>
                <td>%s</td>
            </tr>',$mysqlfetcharray['id'],$mysqlfetcharray['id'],$mysqlfetcharray['img'],$mysqlfetcharray['name'],$mysqlfetcharray['id'],$mysqlfetcharray['name'],$mysqlfetcharray['warn'],$mysqlfetcharray['cost']);   
                } while($mysqlfetcharray = mysql_fetch_array($selectall));
        }
        else {
            echo '<h1>Товара нету на складе!</h1>';   
        }
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

                $create_ticket = mysql_query("INSERT INTO `buy`(`specid`, `tov`, `sym`, `email`, `stat`) VALUES ('$sicretop','$mysqlfetcharray2[id]','$mysqlfetcharray2[cost]','$email','started')");
                
                printf('
                <input type="hidden" name="ik_pm_no" value="%s" />
                <input type="hidden" name="ik_am" value="%s" />
                <input type="hidden" name="ik_desc" value="%s" />'
                        ,$sicretop,$mysqlfetcharray2['cost'],$mysqlfetcharray2['name']);   
            } while($mysqlfetcharray2 = mysql_fetch_array($selectall2));
            ?>
            <input type="hidden" name="ik_co_id" value="<?php echo $interid; ?>" />
	        <input type="hidden" name="ik_cur" value="RUB" />
            <input type="submit" class="col-lg-12 col-md-12 col-xs-12 col-sm-12 btn btn-success" value="<?php echo $engine['pay']; ?>">
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