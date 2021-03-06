<?php
    class App{

        protected $controller="Home";
        protected $action="Home1"; //protected $action="Home1";
        protected $params=[];

        function __construct()
        {
            $arr=$this->UrlProcess();
            if(isset($arr[0])==null){
                $arr[0]=$this->controller;
                $this->action="Home1";
                if(file_exists("./mvc/Controllers/".$arr[0].".php")){
                    unset($arr[0]);
                }
            }else{
                if(file_exists("./mvc/Controllers/".$arr[0].".php")){
                    $this->controller=$arr[0];
                    unset($arr[0]);
                }
            }  
            require_once "./mvc/Controllers/".$this->controller.".php";
            $this->controller = new $this->controller;
            //Xử lý action
            if(isset($arr[1])){
                if(method_exists($this->controller, $arr[1])){
                    $this->action=$arr[1];
                }
                unset($arr[1]);
            }

            //Xu lý controller
            // if(file_exists("./mvc/Controllers/".$arr[0].".php")){
            //     $this->controller=$arr[0];
            //     unset($arr[0]);
            // }
            // require_once "./mvc/Controllers/".$this->controller.".php";
            // $this->controller = new $this->controller;
            // //Xử lý action
            // if(isset($arr[1])){
            //     if(method_exists($this->controller, $arr[1])){
            //         $this->action=$arr[1];
            //     }
            //     unset($arr[1]);
            // }
            
            //Xử lý param
            $this->params= $arr? array_values($arr) : [];
           
            call_user_func_array([$this->controller, $this->action], $this->params );           
            
        }
        
        function UrlProcess(){
            if(isset($_GET['url'])){
               return explode("/", filter_var(trim($_GET['url'],"/")));
            }
        }
    }
    
?>