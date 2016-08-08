<?php

    $positionFirstNews; //с какой по счету новости начинать вывод на экран
    $count_news_on_page = 4;
    $countNews;

    //вытягиваем из БД данные
    function SetCountNews($_db)
    {
        $_db->sql("SELECT COUNT(*) FROM news");
        $count = $_db->line();
        return $count['COUNT(*)'];
    }

    function SetPosition($countNews, $count_news_on_page, $get)
    {
        if (isset($get)) {
            if ($get > $countNews) {
                $positionFirstNews = 0;
            } else {
                if ($get < 0) {
                    $positionFirstNews = $countNews - $count_news_on_page;
                } else {
                    $positionFirstNews = $get;
                }
            }
        } else {
            $positionFirstNews = 0;
        }
        return $positionFirstNews;
    }

    function GetNews($positionFirstNews, $count_news_on_page, $_db)
    {
        $_db->sql("SELECT * FROM news WHERE id > ".$positionFirstNews." ORDER BY id ASC LIMIT ".$count_news_on_page);
        $news = $_db->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'
        return $news;
    }
?>