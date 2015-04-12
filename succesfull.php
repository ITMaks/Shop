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
        <h2><?php echo $engine['successfully']; ?></h2>
        <p><?php echo $engine['you_will_receive_a_message']; ?></p>
        <?php
            if  ($_POST['ik_inv_st'] == "success")
            {
                $time_start = $_POST['ik_inv_crt'];
                $time_end= $_POST['ik_inv_prc'];
                $merchant = $_POST['ik_pw_via'];
                $payed = $_POST['ik_ps_price'];
                
                $selectall = mysql_query("UPDATE `buy` SET `stat`='succesfull',`start_date`='$time_start',`end_date`='$time_end',`via`='$merchant',`payed`='$payed' WHERE `specid`='$_POST[ik_pm_no]'");
                
                $get = mysql_query("SELECT * FROM `buy` WHERE `specid`='$_POST[ik_pm_no]'");
                $mysqlfetcharray = mysql_fetch_array($get);
                
                $tovid = $mysqlfetcharray['tov'];
                
                $mysqlquery = mysql_query("SELECT * FROM `goods` WHERE `id`='$tovid'");
                $mysqlfetar = mysql_fetch_array($mysqlquery);
                
                $suc_textm = $suc_text . $mysqlfetar['tovar'];
                
                if($payed >= $mysqlfetar['cost'])
                {   
                        mail($mysqlfetcharray['email'], $suc_title, $suc_textm); 
                }
                else
                {
                    mail($mysqlfetcharray['email'], "Хакир дитектед", "Напишите администратору сайта.");    
                    $hacker = mysql_query("UPDATE `buy` SET `stat`='hacker' WHERE `specid`='$_POST[ik_pm_no]'");
                }
                
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
    
    <?php 
        include 'footer.php';
      ?>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>