<?php
class App{

    protected $controller="Home";
    // protected $action="";
    protected $params=[];

    function __construct(){
 
        $arr = $this->UrlProcess();
 
        // Controller(file_exitsts: kiem tra file co ton tai hay ko)
        if( isset($arr[0]) && file_exists("./mvc/controllers/".$arr[0].".php") ){
            $this->controller = $arr[0];
            unset($arr[0]);
        }else{
            require_once "./mvc/controllers/". $this->controller .".php";
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        
        $this->controller = new $this->controller;

        // Action(method_exitsts: kiem tra function co ton tai hay ko)

        if (isset($arr[1])){
            $this->params = array_values($arr);
        }else{
            $arr = [];
        }

        // if(isset($arr[1])){ 
        //     if( method_exists( $this->controller , $arr[1]) ){
        //         $this->action = $arr[1];
        //     }
        //     unset($arr[1]);
        // }

        // Params(if(!$arr)){$this->params = array_values($arr)}else{$arr = []}
        // $this->params = $arr?array_values($arr):[];

        // call_user_func_array([$this->controller, $this->action], $this->params );

    }


    //xử lý cắt chuỗi trên thanh url thành mảng
    
    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }

}
?>