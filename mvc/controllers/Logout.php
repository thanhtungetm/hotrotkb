<?php
class Logout extends Controller{
    function __construct(){
        session_start();
        unset($_SESSION['id']);
        header("Location: ./");
    }
}