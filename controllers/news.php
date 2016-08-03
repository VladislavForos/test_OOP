<?php
    include '../core.php';
    include'../models/newsModel.php';
    $arr = GetNews($positionFirstNews, $count_news_on_page);
    include'../templates/template.php';


?>

