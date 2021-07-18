<?php 
class Login extends Controller{
    function __construct() {
        session_start();
        if(isset($_SESSION['id'])){
            header("Location: ./");
            die();
        }
        
    }
    public function Show(){
        if(isset($_POST['username'])&& isset($_POST['pass'])){
            $username = $_POST['username'];
            $pass = $_POST['pass'];
           
            $this->xuLyLogin($username, $pass);
        }else{
            $this->view("login/login",[]);
        }
        
    }

    public function xuLyLogin($username, $pass){

        // echo $username;
        // echo $pass;

        $userLuu = $this->model("User")->find($username);
        // var_dump($userLuu);
        if($userLuu==[]){
            echo "Khong dung username";
        }else{
            $pass = md5($pass);
            if($pass==$userLuu[0]['password']){
                // echo "dang nhap thanh cong";

                $_SESSION['id'] = $userLuu[0]['id'];
                header("Location: ./");
                die();
            }else{
                echo "Mat khau khong dung";
            }
        }
    }
}