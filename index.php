<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    </head>
    <body>
        <div id = "title">
            <h1> Список новостей: </h1>
        </div>
        <div id = "content">
            <?php
                include ("handler.php");
                /*if (isset($_GET['num']))
                {
                    $positionFirstNews = $_GET['num'];
                }
                else
                {
                    $positionFirstNews = 0;
            }*/
                PrintNews($positionFirstNews, $count_news_on_page);
            ?>
        </div>
        <div id = "navigation">
            <a href = "http://localhost/learning/index.php?num=<?php $positionFirstNews -= $count_news_on_page; ?>">Назад</a>
            <a href = "http://localhost/learning/index.php?num=<?php $positionFirstNews += $count_news_on_page; ?> ">Далее</a>
        </div>
    </body>
</html>