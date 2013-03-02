<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function txtfile_error($message = 'error', $data) {
    
    $fp = fopen(ERROR_TXTFILE, 'a');
    fwrite($fp, date("Y-m-d H:i:s")." $message\n".print_r($data, TRUE));
    fclose($fp);
}