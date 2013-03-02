<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * printit
 * 
 * @desc        dump input data 
 * 
 * @param       mixed $data
 * @param       bool $dump 
 * 
 * @author      Alexander Makhno 
 * @version     1.0 24 February 2011 
 */
function printit($data, $dump = FALSE) {
    
    echo '<pre>';
    $dump ? var_dump($data) : print_r($data);
    echo '</pre>';
}