<?php
    class Home extends Controller{
        private $userID;
        function __construct() {
            session_start();
            if(isset($_SESSION['id'])){
                $this->userID = $_SESSION['id'];
                // unset($_SESSION['id']);
            }else{
                header("Location: ./login");
                die();
            }
            
        }
        public function show(){
            $name = $this->model('User')->getName($this->userID);
            $this->view('home', ['name'=>$name]);
        }
    }