<?php

namespace VuBa\Utilities;

class StringHelper
{
    public static function utf8_converter($input)
    {
        if(is_array($input)) {
            array_walk_recursive($input, function (&$item, $key) {
                if (is_string($item) && !mb_detect_encoding($item, 'utf-8', true)) {
                    $item = utf8_encode($item);
                }
            });
            return $input;
        }
        elseif (is_string($input))
        {
            if (!mb_detect_encoding($input, 'utf-8', true)) {
                return utf8_encode($input);
            }
        }

        return $input;
    }
}