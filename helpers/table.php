<?php
if(!function_exists("dt_actions")){
    function dt_actions($Data){
        $View =new \WcTable\Views(sprintf("%s/views", dirname(__DIR__)));
        return $View->wcShow($Data, $View->wcLoad("actions"));
    }
}
if(!function_exists("dt_date")){
    function dt_date($Data){
        return date("D/m/Y", strtotime($Data));
    }
}
