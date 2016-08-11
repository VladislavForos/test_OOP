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
                //вывод новостей на экран
                foreach (@$arr as $elem)
                {
                    echo "  <h3> " . @$elem['title'] . " </h3>
                     <p> " . @$elem['content'] . " </p>
                    <br>
                     ";
            }
            ?>
</div>
<div id = "navigation">
    <a href = "http://localhost/testing/controllers/index.php?num=<?php
                echo $positionFirstNews - $count_news_on_page;
                ?>">Назад
    </a>

    <a href = "http://localhost/testing/controllers/index.php?num=<?php
                echo $positionFirstNews + $count_news_on_page;
                ?>">Далее
    </a>
    //не знаю, как добраться до тех переменных...."Undefined variable: model in C:\Apache24\htdocs\testing\templates\newsTemplate.php on line 33"
    <?php
        echo $model->positionFirstNews - $model->count_news_on_page;
    ?>
</div>
</body>
</html>