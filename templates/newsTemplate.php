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
                foreach ($data as $elem)
                {
                    echo "  <h3> " . $elem['title'] . " </h3>
                     <p> " . $elem['content'] . " </p>
                    <br>
                     ";
            }
            ?>
</div>

<?php
echo "Страница: ".$pageNumber;
?>
<div id = "navigation">
    <a href = "../controllers/index.php?page_num=<?php
                echo $pageNumber - 1;
                ?>">Назад
    </a>

    <a href = "../controllers/index.php?page_num=<?php
                echo $pageNumber + 1;
                ?>">Далее
    </a>
</div>
</body>
</html>