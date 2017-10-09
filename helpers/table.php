<?php

if (!function_exists("dt_actions")) {

    function dt_actions($Data) {
        $View = new \WcTable\Views(sprintf("%s/views", dirname(__DIR__)));
        return $View->wcShow($Data, $View->wcLoad("actions"));
    }

}
if (!function_exists("dt_date")) {

    function dt_date($Data) {
        return date("d/m/Y", strtotime($Data));
    }

}

if (!function_exists('dt_file')):

    function dt_file($d) {
        $file = sprintf("%s/uploads/%s", str_replace("/", DIRECTORY_SEPARATOR, dirname(dirname(dirname(dirname(dirname(__FILE__)))))), $d);
        $Image = ($d && file_exists($file) && !is_dir($file) ? sprintf("%s/tim.php?src=uploads/%s&w=100,&h=70", BASE, $d) : "admin/_img/no_image.jpg");
        return sprintf("<img src='%s' style='width=50px'>", $Image);
    }

endif;


if (!function_exists("dt_decode")) {

    function dt_decode($arr) {

        if (isset($arr)):
            foreach ($arr as $key => $value) {
                if (is_string($value)):
                    $arr[$key] = utf8_encode($value);
                endif;
            }
        endif;

        return $arr;
    }

}
