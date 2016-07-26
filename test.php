<?php
	include ("mysql.php");
	define('MYSQL_SERVER','localhost');
	define('MYSQL_USER','root');
	define('MYSQL_PASSWORD','8913909');
	define('MYSQL_DB','test_base');
	
	session_start();

	$_SESSION['page'];
	$positionFirstNews = 0; //с какой по счету новости начинать вывод на экран
	$count_news_on_page = 4; 
	
	//вытягиваем из БД данные
	$_db = new db_mysql(MYSQL_USER, MYSQL_PASSWORD, MYSQL_SERVER, MYSQL_DB);	//создаем новый объект, передавая в качестве аргумента константы
	$_db->sql("SELECT * FROM news ORDER BY id DESC");	
	$news = $_db->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'
	
	$countNews = sizeof($news);
	
	//вывод заглавия
	echo "<html>
			<head>
			<script src='jquery.js'></script>
			<script src='func.js'></script>
			</head>
			<h1> Список новостей: </h1>
		 </html>";
	
	//постраничный вывод новостей
	if(isset($_POST['action'])) 
	{
		
		if ($_POST['action'] == 'next')
		{
			$positionFirstNews += 4;
		} 
		else
		{
			if ($_POST['action'] == 'back')
			{
				$positionFirstNews -= 4;
			}
		}
	}
	
	for ($i = $positionFirstNews; $i < $positionFirstNews + $count_news_on_page; $i++)
	{
		echo "<html>
				<h3> ".$news[$i]['title']." </h3>
				<p> ".$news[$i]['content']." </p>
			 </html>
			 <br>";
	}
	
	 //вывод на экран кнопок Назад и Далее
	 echo "<html>
				<input type = 'button' value = 'Назад' onclick = 'sendBack()'>
				<input type = 'button' value = 'Вперед' onclick = 'sendNext()'>
			  </html>"; 
	 
	 
	 
	 
		/*echo "<html>
				<a name = 'Back' href = 'http://localhost/learning/test.php?b='.($positionFirstNews-4). >Назад</a>
				<a name = 'Next' href = 'http://localhost/learning/test.php?n='.($positionFirstNews+4). >Далее</a>
			  </html>"; 
		 */
		 
		 
		 
		 
		 
	$_db->close();
?>