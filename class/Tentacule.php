<?php
    class Tentacule{
        private $page;
        public function __construct($url){
            $options = array('http'=>array('method'=>"GET", 'header'=>"User-Agent: HM-Crawler/0.1\n"));

            $context = stream_context_create($options);

            $this -> page = new DomDocument();
            @$this -> page -> loadHTML(file_get_contents($url, false, $context));
        }

        public function obtenirLiens(){
            return $this->page->getElementsByTagName("a");
        }
    }
?>