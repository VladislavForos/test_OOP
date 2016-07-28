<?php
    include ("config.php");

    $positionFirstNews; //с какой по счету новости начинать вывод на экран
    $count_news_on_page = 4;

    //вытягиваем из БД данные
    $_db = new db_mysql(MYSQL_USER, MYSQL_PASSWORD, MYSQL_SERVER, MYSQL_DB);	//создаем новый объект, передавая в качестве аргумента константы
    $a = $_db->sql("SELECT COUNT(1) FROM news");
    $countNews = @mysql_fetch_array( $a );

    if (isset($_GET['num']))
    {
        if ($_GET['num'] > $countNews[0])
        {
            //$_GET['num'] = 0;
            $positionFirstNews = 0;
        }
        else
        {
            if ($_GET['num'] < 0)
            {
                //$_GET['num'] = $countNews - $count_news_on_page;
                $positionFirstNews = $countNews[0] - $count_news_on_page;
            }
            else
            {
                $positionFirstNews = $_GET['num'];
            }
        }
    }
    else
    {
        $positionFirstNews = 0;
    }

    function PrintNews($positionFirstNews, $count_news_on_page)
    {
        $_db2 = new db_mysql(MYSQL_USER, MYSQL_PASSWORD, MYSQL_SERVER, MYSQL_DB);
        $_db2->sql("SELECT * FROM news ORDER BY id ASC");
        $news = $_db2->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'

        //вывод новостей на экран
        for ($i = $positionFirstNews; $i < $positionFirstNews + $count_news_on_page; $i++) {
            echo "  <h3> " . @$news[$i]['title'] . " </h3>
                                    <p> " . @$news[$i]['content'] . " </p>
                                    <br>
                                 ";
        }
    }

$_db->close();
?>