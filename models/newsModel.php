<?php
define("firstPage",1);
    class NewsModel
    {
        public $pageNumber;
        public $count_news_on_page = 4;
        private $countNews;
        private $maxPage;
        public $newsArray;
        private $_db;

        function __construct($_db)
        {
            $this->pageNumber = 1;
            $this->_db = $_db;
            $this->_db->sql("SELECT COUNT(*) FROM news");
            $temp =$this->_db->line();
            $this->countNews = $temp['COUNT(*)'];
            $this->maxPage = ceil($this->countNews/$this->count_news_on_page);
            settype($this->maxPage, 'integer');
        }

        function checkNumberPage($digit)
        {
            if (settype($digit,'integer'))
            {
                if ($digit > $this->maxPage)
                {
                    return firstPage;
                }
                else
                {
                    if ($digit < 1)
                    {
                        return $this->maxPage;
                    }
                    else
                    {
                        return $digit;
                    }
                }
            }
            else
            {
                return firstPage;
            }
        }

        function getNews($page)
        {
            $this->pageNumber = $this->checkNumberPage($page);
            $positionFirstNew = ($this->pageNumber-1)*$this->count_news_on_page + 1;
            $this->_db->sql("SELECT * FROM news WHERE id >= ".$positionFirstNew." ORDER BY id ASC LIMIT ".$this->count_news_on_page);
            $news = $this->_db->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'
            return $news;
        }
    }