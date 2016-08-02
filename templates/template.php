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
                $arr = GetNews($positionFirstNews, $count_news_on_page);
                //вывод новостей на экран
                foreach ($arr as $elem)
                {
                    echo "  <h3> " . @$elem['title'] . " </h3>
                     <p> " . @$elem['content'] . " </p>
                    <br>
                     ";
            }
            ?>
</div>
<div id = "navigation">
    <a href = "index.php?num=<?php
                echo $positionFirstNews - $count_news_on_page;
                ?>">Назад
    </a>

    <a href = "index.php?num=<?php
                echo $positionFirstNews + $count_news_on_page;
                ?>">Далее
    </a>

</div>
</body>
</html>