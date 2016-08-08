<?php
    class Model
    {
        private $positionFirstNews; //с какой по счету новости начинать вывод на экран
        private $count_news_on_page = 4;
        private $countNews;
        public $newsArray;
        private $_db;
        private $a;

        function __construct()
        {
            $this->positionFirstNews = 0;
            $this->_db = new db_mysql(MYSQL_USER, MYSQL_PASSWORD, MYSQL_SERVER, MYSQL_DB);
            $this->a = $this->_db->sql("SELECT COUNT(1) FROM news");
            $this->countNews = @mysql_fetch_array( $this->a );

        }

        function SetPositionFirstNew()
        {
            if (isset($_GET['num']))
            {
                if ($_GET['num'] > $this->countNews[0])
                {
                    $this->positionFirstNews = 0;
                }
                else
                {
                    if ($_GET['num'] < 0)
                    {
                        $this->positionFirstNews = $this->countNews[0] - $this->count_news_on_page;
                    }
                    else
                    {
                        $this->positionFirstNews = $_GET['num'];
                    }
                }
            }
            else
            {
                $this->positionFirstNews = 0;
            }
        }

        function GetNews()
        {

            $this->_db->sql("SELECT * FROM news WHERE id > ".$this->positionFirstNews." ORDER BY id ASC LIMIT ".$this->count_news_on_page);
            $news = $this->_db->matr();	//записываем в ассоциативный массив все записи из таблицы 'news'
            return $news;
        }

    }
?>