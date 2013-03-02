<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function baseurl() {
    
    $ci =& get_instance();
    return base_url()."{$ci->current}/"; 
}