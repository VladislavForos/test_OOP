<?php


    $positionFirstNews; //с какой по счету новости начинать вывод на экран
    $count_news_on_page = 4;
    $countNews;

    //вытягиваем из БД данные
    function sqlInjection($_db, &$countNews)
    {
        $a = $_db->sql("SELECT COUNT(1) FROM news");
        $countNews = @mysql_fetch_array( $a );
    }


    function SetPosition($countNews, $count_news_on_page, &$positionFirstNews)
    {
        if (isset($_GET['num'])) {
            if ($_GET['num'] > $countNews[0]) {
                $positionFirstNews = 0;
            } else {
                if ($_GET['num'] < 0) {
                    $positionFirstNews = $countNews[0] - $count_news_on_page;
                } else {
                    $positionFirstNews = $_GET['num'];
                }
            }
        } else {
            $positionFirstNews = 0;
        }
    }

    function GetNews($positionFirstNews, $count_news_on_page)
    {
        $_db2 = new db_mysql(MYSQL_USER, MYSQL_PASSWORD, MYSQL_SERVER, MYSQL_DB);
        $_db2->sql("SELECT * FROM news WHERE id > ".$positionFirstNews." ORDER BY id ASC LIMIT ".$count_news_on_page);
        $news = $_db2->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'
        return $news;
    }
    

$_db->close();
?>