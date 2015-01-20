<?php
    include '../connect.php';
    include '../forall.php';
?>
<?php
    $top_alert = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4>Ошибка</h4>';
    $bottom_alert = '<p>
        <a type="button" href="' . $sitedomain . 'admin/index.php" class="btn btn-danger">Попробывать еще раз</a>
      </p>
    </div>';
    

    if(isset($_POST['enter']))
    {
        if($_POST['login'] != null)
        {
            if($_POST['password'] != null)
            {
                if($_POST['login'] === $login and $_POST['password'] === $password)
                {
                    $display_login = "none";
                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    
                    echo '<div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Вы успешно вошли</h3>
      </div>
      <div class="panel-body">
        <a href="' . $sitedomain . 'admin/login.php?show=' . $display_login . '&login=' . $login . '&password=' . $password . '">Перейти в кабинет</a>
      </div>
    </div>';
                }
                else
                {
                    echo $top_alert;
                    echo '<p>Логин и/или пароль не неверны</p>';   
                    echo $bottom_alert;
                }
            }
            else
            {
                echo $top_alert;
                echo '<p>Вы не заполнили поле Password</p>';   
                echo $bottom_alert;
            }
        }
        else
        {
            echo $top_alert;
            echo '<p>Вы не заполнили поле Login</p>';   
            echo $bottom_alert;
        }
    }
?>
    <?php 
        if(isset($_COOKIE['show']) and $_COOKIE['show'] === "none")
        {
            include 'cp.php';
        }
        else
        {
            ?>
            
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $sitename; ?></title>
    <meta name="description" content="<?php echo $sitedesc; ?> | Created by Max Dmitriev">
    <meta name="author" content="Max Dmitriev">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  </head>

  <body>

    <div class="container">
      
            <form class="form-signin" action="index.php" method="post">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="login" name="login" id="inputEmail" class="form-control" placeholder="Login" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" name="enter" type="submit">Login</button>
              </form>      
              
               </div> <!-- /container -->
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html> 
            <?php
        }
    ?>