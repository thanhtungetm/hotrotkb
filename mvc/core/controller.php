<?php
    class Controller{

        public function model($model){
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }
        public function view($view, $data=[]){
            require_once "./mvc/views/".$view.".php";
        }
        public function ctrl($name, $action,$params=[]){
            require_once "./mvc/controllers/".$name.".php";
            $ctr = new $name;
            call_user_func_array([$ctr, $action],$params);
        }
    }
?>