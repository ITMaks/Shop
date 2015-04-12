<!DOCTYPE html>
<?php
    include '../connect.php';
    include '../forall.php';
?>
<?php
    if($_COOKIE['login'] === $login and $_COOKIE['password'] === $password)
    {
?>
   
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

    <?php
        include 'nav.php';
      ?>

    <div class="container-fluid">
        <h1 class="page-header">Админ панель</h1>
        <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
        <div id="chart_div" class="graph" style="width: 900px; height: 500px;"></div>
        
        <script type='text/javascript'>
        //<![CDATA[ 

        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Дата', 'Продажи', 'Заработок'],
                <?php
                    $selectal = mysql_query("SELECT * FROM `buy` WHERE `stat`='succesfull'");
                    $mysqlfetcharray = mysql_fetch_array($selectal);
     
                    do {
                        $date = substr($mysqlfetcharray['end_date'], 0, 10);
                        
                        printf("['%s',%s,%s], \n", $date, 1, $mysqlfetcharray['payed']);
                    } while($mysqlfetcharray = mysql_fetch_array($selectal));
                ?>
            ]);

            var options = {
                title: 'График продаж',
                hAxis: {title: 'Дата',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        //]]>  
        </script>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php 
        include '../footer.php';
      ?>
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
   
<?php
    }
    else
    {
        echo 'Ошибка доступа';   
    }
?>