<?php
    setcookie("show", $_GET['show'], time()+60*60*24*30);
    setcookie("login", $_GET['login'], time()+60*60*24*30);
    setcookie("password", $_GET['password'], time()+60*60*24*30);

    header('Refresh: 0; url=../admin/index.php');
?>
<!DOCTYPE html>
<?php
    include '../connect.php';
    include '../forall.php';
?>
<html>
  <head>
    <title><?php echo $sitename; ?></title>
    <meta name="description" content="<?php echo $sitedesc; ?> | Created by Max Dmitriev">
    <meta name="author" content="Max Dmitriev">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>
  <body>
    <div class="container">
  
   </div>
   
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>