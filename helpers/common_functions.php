<?php

if( !function_exists('randomNumber') )
{
    function randomNumber($length = 1)
    {
        $chars  =   "1234567890";
        $clen   =   strlen( $chars ) - 1;
        $number =   '';

        for ($i = 0; $i < $length; $i++) {
            $number .= $chars[mt_rand(0, $clen)];
        }

        return ($number);
    }
}