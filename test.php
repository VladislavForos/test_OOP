<?php
	include ("mysql.php");
	define('MYSQL_SERVER','localhost');
	define('MYSQL_USER','root');
	define('MYSQL_PASSWORD','8913909');
	define('MYSQL_DB','test_base');
	
	$_db = new db_mysql(MYSQL_USER, MYSQL_PASSWORD, MYSQL_SERVER, MYSQL_DB);	//создаем новый объект, передавая в качестве аргумента константы
	$_db->sql("SELECT * FROM news ORDER BY id DESC");	
	$news = $_db->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'
	
	echo "<br><br>Новости дня:<br><br>";
	
	foreach ($news as $value) 
	{
		print_r($value['title']);
		echo("<br>");
		echo("<br>");
		print_r($value['content']);
		echo("<br>");
		echo("<br>");
		echo("<br>");
		echo("<br>");
	} 
	$_db->close();
?>