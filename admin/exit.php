<?php
    setcookie("show", "no", time()+1);
    setcookie("login", "no", time()+1);
    setcookie("password", "no", time()+1);

    header('Refresh: 1; url=../admin/index.php');
?>