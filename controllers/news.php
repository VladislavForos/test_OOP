<?php
    include '../core.php';
    include'../models/newsModel.php';
    $countNews = SetCountNews($_db);
    $positionFirstNews = SetPosition($countNews, $count_news_on_page, $_GET['num']);
    $arr = GetNews($positionFirstNews, $count_news_on_page, $_db);
    include'../templates/template.php';
?>