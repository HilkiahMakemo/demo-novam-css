<?php


if(!function_exists('str_read')){
  function str_read($string, $delimiter = ' ')
  {
    $pattern = '/([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/msi';
    $replace = '$1$4 $2$3$5';
    return preg_replace($pattern, $replace, $string);
  }
}
