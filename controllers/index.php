<?php
    include '../core.php';
    include'../models/newsModel.php';
    include'../templates/template.php';

    $arr = GetNews($positionFirstNews, $count_news_on_page);
?>

