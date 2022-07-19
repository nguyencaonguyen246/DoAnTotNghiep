<?php
class App{
    // Thực hiện cắt chuỗi đường dẫn 
    protected $controller = "HomeController";
    protected $action = "newHome";
    protected $params = [];

    function __construct(){
        $arr = $this -> UrlProcess();
        // print_r($arr);

        // Xử lý controller
        if(file_exists("./mvc/controllers/".$arr[0].".php")){
            $this ->controller = $arr[0];// file_exists hàm giúp kiểm tra sự tồn tại của file
            unset($arr[0]);
        }
        require_once "./mvc/controllers/".$this->controller.".php";
        $this -> controller =  new $this->controller;

        // Xử lý acction (Function được chạy trong controllers)
        if(isset($arr[1])){
            if(method_exists( $this ->controller, $arr[1])){
                $this->action = $arr[1];// method_exists hàm giúp kiểm tra sự tồn tại của method
            }
            unset($arr[1]);
        }
        
        // Xử lý Params
        $this -> params = $arr? array_values($arr):[];
        call_user_func_array([$this->controller, $this->action],$this->params);
    }

    function UrlProcess(){
        if(isset($_GET["url"])){
            // Hàm trim giúp loại bỏ khoảng trắng.
            // Hàm explode loại bỏ / trong link.
           return explode("/",filter_var(trim($_GET["url"], "/")) ); 
        }
        
    }
}
?>