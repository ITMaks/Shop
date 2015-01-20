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
                        <li><a href="<?php echo $sitedomain; ?>index.php"><?php echo $engine['main']; ?></a></li>
                        <li><a href="<?php echo $sitedomain; ?>contact.php"><?php echo $engine['contacts']; ?></a></li>
                        <li><a href="<?php echo $sitedomain; ?>help.php"><?php echo $engine['faq']; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>