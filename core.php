<?php
    include '../lib/mysql.php';
    include '../lib/config.php';

    $_db = new db_mysql(MYSQL_USER, MYSQL_PASSWORD, MYSQL_SERVER, MYSQL_DB);	//создаем новый объект, передавая в качестве аргумента константы

?>