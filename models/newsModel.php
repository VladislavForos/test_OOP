<?php


    $positionFirstNews; //с какой по счету новости начинать вывод на экран
    $count_news_on_page = 4;
    $countNews;

    //вытягиваем из БД данные
    function SetCountNews($_db)
    {
        $a = $_db->sql("SELECT COUNT(*) FROM news");
        $count = @mysql_fetch_array( $a );
        return $count;
    }

    function SetPosition($countNews, $count_news_on_page, $get)
    {
        if (isset($get)) {
            if ($get > $countNews[0]) {
                $positionFirstNews = 0;
            } else {
                if ($get < 0) {
                    $positionFirstNews = $countNews[0] - $count_news_on_page;
                } else {
                    $positionFirstNews = $get;
                }
            }
        } else {
            $positionFirstNews = 0;
        }
        return $positionFirstNews;
    }

    function GetNews($positionFirstNews, $count_news_on_page)
    {
        $_db2 = new db_mysql(MYSQL_USER, MYSQL_PASSWORD, MYSQL_SERVER, MYSQL_DB);
        $_db2->sql("SELECT * FROM news WHERE id > ".$positionFirstNews." ORDER BY id ASC LIMIT ".$count_news_on_page);
        $news = $_db2->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'
        return $news;
    }
?>