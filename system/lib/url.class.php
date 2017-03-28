<?php

class url
{
    public static function to($page, $params = array())
    {
        $all_params = array_merge($page ? array('page' => $page) : array(), $params); // page + other params

        return '?'.http_build_query($all_params);
    }
}