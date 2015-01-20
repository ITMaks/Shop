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
        VK.init({apiId: <?php echo $vkcommentid;?>, onlyWidgets: true});
    </script>

  </head>
  <body>
    <?php 
        include 'menu.php';
      ?>
    
    <?php
        include 'slider.php';
      ?>
    
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
                  <a href="#desc" data-toggle="tab"><?php echo $engine['description']; ?></a>
              </li>
              <li class="">
                  <a href="#buy" data-toggle="tab"><?php echo $engine['buy']; ?></a>
              </li>
              <li class="">
                  <a href="#comments" data-toggle="tab"><?php echo $engine['feedback']; ?></a>
              </li>
           </ul>
           <div id="myTabContent" class="tab-content">
               <div class="tab-pane fade active in" id="desc">
                   <img src="img/full/<?php echo $showinfo['full_img']; ?>" class="col-xs-12 col-sm-12 col-md-8 col-lg-8 padding10 img img-rounded">
                   <h2><? echo $showinfo['name']; ?><? echo $showinfo['warn']; ?></h2>
                   <h3><?php echo $engine['price']; ?>: <? echo $showinfo['cost']; ?> (<?php echo $engine['currency']; ?>)</h3>
                   <p><? echo $showinfo['description']; ?></p>
                   <?php
                    if($showinfo['perm'] == "can")
                    {
                        echo '<a href="#buy" data-toggle="tab" class="btn btn-danger col-xs-12 col-sm-12 col-md-3 col-lg-3">' . $engine['buy'] . '</a><br><br>';
                        echo '<a target="_blank" href="' . $sitedomain . 'help.php#1">' . $engine['how_to_buy'] . '</a>';
                    }
                    else
                    {
                        echo '<a href="#buy" data-toggle="tab" class="btn btn-danger col-xs-12 col-sm-12 col-md-3 col-lg-3" disabled>' . $engine['no_in_stock'] . '</a><br><br>';   
                        echo '<a target="_blank" href="' . $sitedomain . 'help.php#1">' . $engine['how_to_buy'] . '</a>';
                    }
                    ?>
                   <img class="col-xs-12 col-sm-12 col-md-3 col-lg-3 img img-rounded" src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<? echo $sitedomain . 'view.php?id=' . $_GET['id']; ?>">
               </div>
               <div class="tab-pane fade" id="buy">
                  <h2><?php echo $engine['checkout']; ?></h2>
                   <form class="form-horizontal" method="post" action="buy.php">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $engine['email']; ?></label>
    <div class="col-sm-10">
     <?php
                    if($showinfo['perm'] == "can")
                    {
                        echo '<input type="email" name="email" class="form-control" id="inputEmail3" placeholder="' . $engine['email'] . '">';
                    }
                    else
                    {
                        echo '<input type="email" name="email" class="form-control" id="inputEmail3" disabled placeholder="' . $engine['email'] . '">';   
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
            echo '<button type="submit" name="buy" class="btn btn-default">' . $engine['buy'] . '</button>';
        }
        else
        {
            echo '<button type="submit" name="buy" class="btn btn-default" disabled>' . $engine['no_in_stock'] . '</button>';   
        }
    ?>
    </div>
  </div>
</form>
               </div>
               <div class="tab-pane fade" id="comments">
                  <h2><?php echo $engine['leave_feedback']; ?></h2>
                  <a target="_blank" href="<? echo $sitedomain; ?>help.php#2"><? echo $engine['how_to_feedback']; ?></a>
                   <div id="vk_comments<?php echo $id; ?>" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddign-top50"></div>
                        <script type="text/javascript">
                            VK.Widgets.Comments("vk_comments<?php echo $id; ?>", {limit: 10, attach: false});
                        </script>
                    </div>
               </div>
           </div>
        </div>
    </div>
    
    <?php 
        include 'footer.php';
      ?>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>