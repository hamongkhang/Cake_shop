<?php

if (!function_exists('get_data_user')) {
    function get_data_user($type,$field='id')
    {
        return Auth::guard($type)->user() ?  Auth::guard($type)->user()->$field :'';
    }
}