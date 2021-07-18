<?php
    class Controller{
        public function Model($Model){
            require_once "./mvc/Models/".$Model.".php";
            return new $Model;
        }

        public function View($View, $data=[]){
            require_once "./mvc/Views/".$View.".php";
        }
    }
?>