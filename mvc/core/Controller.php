<?php
class Controller{
    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }// hàm giúp gọi models
    public function view($view, $dataview = []){
        require_once "./mvc/views/".$view.".php";
    }// hàm giúp gọi views
    public function viewadmin($view, $dataview = []){
        require_once "./mvc/views/Admin/".$view.".php";
    }// hàm giúp gọi views admin
    public function viewkythuat($view, $dataview = []){
        require_once "./mvc/views/KyThuat/".$view.".php";
    }// hàm giúp gọi views kỹ thuật
    public function viewtieptan($view, $dataview = []){
        require_once "./mvc/views/TiepTan/".$view.".php";
    }// hàm giúp gọi views tiếp tân
}
?>