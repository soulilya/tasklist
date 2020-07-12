<?php
    abstract class Controller
    {
        protected $data = array();
        protected $view = "";
        protected $head = array('title' => '', 'description' => '');
        
        abstract function process($params);
        
        public function renderView()
        {
            if ($this->view)
            {
                extract($this->data);
                require("views/" . $this->view . '.php');
            }
        }
        
        public function redirect($url)
        {
            header('Location: ' . $url);
            header("Connection: close");
            exit();
        }
        
        public function isLogged()
        {
            return isset($_SESSION["auth"]) && $_SESSION["auth"] == true;
        }
    }
?>
