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
    <?php
        $id = (int) $_GET['id'];

        $getinfo = mysql_query("SELECT * FROM `goods` WHERE `id`='$id'");
        $showinfo = mysql_fetch_array($getinfo);
    ?>
     
      <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="panel">
          <ul id="myTab1" class="nav nav-tabs nav-justified">
              <li class="active">
                  <a href="#desc" data-toggle="tab">Описание</a>
              </li>
              <li class="">
                  <a href="#buy" data-toggle="tab">Купить</a>
              </li>
              <li class="">
                  <a href="#comments" data-toggle="tab">Отзывы</a>
              </li>
           </ul>
           <div id="myTabContent" class="tab-content">
               <div class="tab-pane fade active in" id="desc">
                   <img src="img/full/<?php echo $showinfo['full_img']; ?>" class="col-xs-12 col-sm-12 col-md-8 col-lg-8 padding10 img img-rounded">
                   <h2><? echo $showinfo['name']; ?><? echo $showinfo['warn']; ?></h2>
                   <h3>Цена: <? echo $showinfo['cost']; ?> (руб.)</h3>
                   <p><? echo $showinfo['description']; ?></p>
                   <?php
                    if($showinfo['perm'] == "can")
                    {
                        echo '<a href="#buy" data-toggle="tab" class="btn btn-danger col-xs-12 col-sm-12 col-md-3 col-lg-3">Купить</a>';
                    }
                    else
                    {
                        echo '<a href="#buy" data-toggle="tab" class="btn btn-danger col-xs-12 col-sm-12 col-md-3 col-lg-3" disabled>Нету на складе</a>';   
                    }
                    ?>
                   
               </div>
               <div class="tab-pane fade" id="buy">
                  <h2>Оформление покупки.</h2>
                   <form class="form-horizontal" method="post" action="buy.php">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
     <?php
                    if($showinfo['perm'] == "can")
                    {
                        echo '<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">';
                    }
                    else
                    {
                        echo '<input type="email" name="email" class="form-control" id="inputEmail3" disabled placeholder="Email">';   
                    }
                    ?>
      <input type="text" style="display: none;" name="id" class="form-control" id="inputEmail3" value="<?php echo $id; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
     <?php
                    if($showinfo['perm'] == "can")
                    {
                        echo '<button type="submit" name="buy" class="btn btn-default">Купить</button>';
                    }
                    else
                    {
                        echo '<button type="submit" name="buy" class="btn btn-default" disabled>Нету на складе</button>';   
                    }
                    ?>
    </div>
  </div>
</form>
               </div>
               <div class="tab-pane fade" id="comments">
                  <h2>Оставьте свой отзыв о товаре.</h2>
                   <div id="vk_comments<?php echo $id; ?>" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddign-top50"></div>
                        <script type="text/javascript">
                            VK.Widgets.Comments("vk_comments<?php echo $id; ?>", {limit: 10, attach: false});
                        </script>
                    </div>
               </div>
           </div>
        </div>
    </div>
    
    <div class="container margin-top50">
        <hr>
        <p class="footer-text"><?php echo $sitedomaincopy; ?> &copy; <?php echo $sitecopyyears; ?> <?php echo $sitecopy; ?></p>
    </div>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>