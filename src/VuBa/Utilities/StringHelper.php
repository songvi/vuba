<?php

namespace VuBa\Utilities;

class StringHelper
{
    public static function utf8_converter($array)
    {
        array_walk_recursive($array, function(&$item, $key){
            if(is_string($item) && !mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
            }
        });
        return $array;
    }
}