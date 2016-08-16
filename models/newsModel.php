<?php
    class NewsModel
    {
        public $positionFirstNews; //с какой по счету новости начинать вывод на экран
        public $count_news_on_page = 4;
        private $countNews;
        public $newsArray;
        private $_db;

        function __construct($_db)
        {
            $this->positionFirstNews = 0;
            $this->_db = $_db;
            $this->_db->sql("SELECT COUNT(*) FROM news");
            $temp =$this->_db->line();
            $this->countNews = $temp['COUNT(*)'];
        }

        function setPositionFirstNew($get)
        {
            if (isset($get))
            {
                if ($get >= $this->countNews)
                {
                    $this->positionFirstNews = 0;
                }
                else
                {
                    if ($get < 0)
                    {
                        $this->positionFirstNews = $this->countNews - $this->count_news_on_page;
                    }
                    else
                    {
                        $this->positionFirstNews = $get;
                    }
                }
            }
            else
            {
                $this->positionFirstNews = 0;
            }
        }

        function getNews($numberPage)
        {
            $this->_db->sql("SELECT * FROM news WHERE id > ".$this->positionFirstNews." ORDER BY id ASC LIMIT ".$this->count_news_on_page);
            $news = $this->_db->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'
            return $news;
        }

    }