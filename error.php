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
        <?php
            if  ($_POST['ik_inv_st'] == "error")
            {
                echo '<h2>' . $engine["error"] . '</h2>
                    <p>' . $engine["contact_us"] . ' <a href="contact.php">' . $engine["contacts"] . '</a>.</p>';
            }
            else
            {
                echo '<h2>' . $engine["error"] . ' <a href="index.php">' . $engine["main"] . '</a></h2>';
            }
        ?>
    </div>
    
    <?php 
        include 'footer.php';
      ?>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>