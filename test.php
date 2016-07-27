<?php
	session_start();
	include ("mysql.php");
	define('MYSQL_SERVER','localhost');
	define('MYSQL_USER','root');
	define('MYSQL_PASSWORD','8913909');
	define('MYSQL_DB','test_base');

	$_SESSION['page'];
	$positionFirstNews; //с какой по счету новости начинать вывод на экран
	$count_news_on_page = 4; 
	
	//вытягиваем из БД данные
	$_db = new db_mysql(MYSQL_USER, MYSQL_PASSWORD, MYSQL_SERVER, MYSQL_DB);	//создаем новый объект, передавая в качестве аргумента константы
	$_db->sql("SELECT * FROM news ORDER BY id ASC");
	$news = $_db->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'
	
	$countNews = sizeof($news);
	
	//постраничный вывод новостей
		if (isset($_GET['back']))
		{
			$_SESSION['page'] -= $count_news_on_page;
			if ($_SESSION['page'] < 0)
			{
				$_SESSION['page'] = $countNews - $count_news_on_page;
			}
		}
		else
		{
			if (isset($_GET['next']))
			{
				$_SESSION['page'] += $count_news_on_page;
				if ($_SESSION['page'] > $countNews-1)
				{
					$_SESSION['page'] = 0;
				}
			}
			else
			{
				$_SESSION['page'] = 0;
			}
		}


	//вывод новостей на экран
	function WriteData($count_news_on_page)
	{
		for ($i = $_SESSION['page']; $i < $_SESSION['page'] + $count_news_on_page; $i++)
		{
			echo "
				<div id = 'news'>
					<h3> ".$news[$i]['title']." </h3>
					<p> ".$news[$i]['content']." </p>
				</div>
			 <br>";
		}
	}


	$_db->close();
?>