<!DOCTYPE html>
<?php
    include 'forall.php';
?>
<html>
  <head>
    <title><?php echo $sitename; ?> | <?php echo $engine['contacts']; ?></title>
    <meta name="description" content="<?php echo $sitedesc; ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <meta name="author" content="Max Dmitriev">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>
  <body>
    <?php 
        include 'menu.php';
      ?>
    
    <?php
        include 'slider.php';
      ?>
    
    <div class="container"> 
       <h1>Контакты</h1>
      <hr />
        <table class="table table-bordered table-hover margin-top10">
        <thead>
          <tr>
            <th class="col-lg-1 col-md-1 col-xs-1"><?php echo $engine['logo_c']; ?></th>
            <th class="col-lg-11 col-md-11 col-xs-11"><?php echo $engine['user']; ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img class="skype" src="<?php echo $sitedomain; ?>img/ico/skype-ico.png" alt="skype"></td>
            <td><p><img class="skype-box" src="<?php echo $sitedomain; ?>img/ico/skype-box.png" alt="skype"><span class="skype-nick"><?php echo $skype; ?></span></p></td>
          </tr>
          <tr>
            <td><img class="vk" src="<?php echo $sitedomain; ?>img/ico/vk-ico.png" alt="vk"></td>
            <td><p><img class="vk-box" src="<?php echo $sitedomain; ?>img/ico/vk-box.png" alt="vk"><a target="_blank" class="vk-nick" href="http://vk.com/<?php echo $vk; ?>"><?php echo $vkname; ?></a></p></td>
          </tr>
          <tr>
            <td><img class="icq" src="<?php echo $sitedomain; ?>img/ico/icq-ico.png" alt="icq"></td>
            <td><p><img class="icq-box" src="<?php echo $sitedomain; ?>img/ico/icq-box.png" alt="icq"><span class="icq-nick"><?php echo $icq; ?></span></p></td>
          </tr>
        </tbody>
        </table>
    </div>
    
    <?php 
        include 'footer.php';
      ?>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>