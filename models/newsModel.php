<?php
define("firstPage",1);
    class NewsModel
    {
        public $pageNumber;
        public $count_news_on_page = 4;
        private $countNews;
        private $maxPage;
        public $newsArray;
        private $db;

        function __construct($_db)
        {
            $this->pageNumber = firstPage;
            $this->db = $_db;
        }

        private function checkNumberPage($digit)
        {
            if (settype($digit,'integer'))
            {
                if ($digit > $this->maxPage)
                {
                    return firstPage;
                }
                else
                {
                    if ($digit < firstPage)
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

        private function setCountNewsMaxPage()
        {
            $this->db->sql("SELECT COUNT(*) FROM news");
            $temp =$this->db->line();
            $this->countNews = $temp['COUNT(*)'];
            $this->maxPage = ceil($this->countNews/$this->count_news_on_page);
            settype($this->maxPage, 'integer');
        }

        function getNews($page)
        {
            $this->setCountNewsMaxPage();
            $this->pageNumber = $this->checkNumberPage($page);
            $positionFirstNew = ($this->pageNumber-1)*$this->count_news_on_page + 1;
            $this->db->sql("SELECT * FROM news WHERE id >= ".$positionFirstNew." ORDER BY id ASC LIMIT ".$this->count_news_on_page);
            $news = $this->db->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'
            return $news;
        }
    }