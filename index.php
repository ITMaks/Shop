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
    <? echo $encode_meta; ?>
    <? include 'siteheart.php'; ?>
  </head>
  <body>
    <?php 
        include 'menu.php';
      ?>
    
    <?php
        include 'slider.php';
      ?>
    
    <div class="container">
       <h1>Главная</h1>
      <hr />
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
                $selectall = mysql_query("SELECT * FROM `goods` WHERE `perm`='can'");
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
                <td>%s</td>
                <td class="center"><div style="background-color: #%s" class="shape">%s</div></td>
                <td><a href="' . $sitedomain . 'view.php?id=%s"><p>%s %s</p></a></td>
                <td>%s</td>
            </tr>',$mysqlfetcharray['id'],$color,$mysqlfetcharray['first_letter'],$mysqlfetcharray['id'],$mysqlfetcharray['name'],$mysqlfetcharray['warn'],$mysqlfetcharray['cost']);   
                } while($mysqlfetcharray = mysql_fetch_array($selectall));
            ?>
        </tbody>
      </table>
    </div>
    
    <?php 
        include 'footer.php';
      ?>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>