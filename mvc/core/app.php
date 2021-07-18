<?php
    class App{
        protected $controller = "home";
        protected $action = "show";
        protected $params =[];
        
        function __construct(){
            if(isset($_GET['url'])){            //Nếu URL có URI
                $Url = $this->UrlProcess($_GET['url']);
                $this->RedirectController($Url);
                unset($Url[0]);
            }
            else{
                $Url = $this->UrlProcess($this->controller);
                $this->RedirectController($Url);
                unset($Url[0]);
            }
            $this->Action($Url);
            unset($Url[1]);
            $this->params = $Url ? array_values($Url):[];
            // var_dump($this->params);
        }

        function UrlProcess($Url){
            if(isset($Url)){
                return explode("/", filter_var(trim($Url, "/")));
            }
        }

        function RedirectController($Url){              //Chuyển đến Controller
            if(file_exists("./mvc/controllers/".$Url[0].".php")){
                $this->controller = $Url[0];
            }
            require_once "./mvc/controllers/".$this->controller.".php";
        }

        function Action($Url){
            if(isset($Url[1]) && method_exists("$this->controller", $Url[1])){
                $this->action = $Url[1];
            }
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller, $this->action], []);
            
        }
    }
?>