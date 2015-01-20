<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $sitedomain; ?>"><?php echo $sitename; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $sitedomain; ?>admin/index.php">Главная</a></li>
            <li><a href="<?php echo $sitedomain; ?>admin/add.php">Добавить товар</a></li>
            <li><a href="<?php echo $sitedomain; ?>admin/exit.php">Выйти</a></li>
          </ul>
        </div>
      </div>
    </nav>