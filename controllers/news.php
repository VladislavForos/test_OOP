<?php
    include '../core.php';
    include'../models/newsModel.php';
    sqlInjection($_db);
    SetPosition($countNews, $count_news_on_page, $positionFirstNews);
    $arr = GetNews($positionFirstNews, $count_news_on_page);
    include'../templates/template.php';
?>