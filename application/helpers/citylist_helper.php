<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function citylist(array $cityList, $cityId = 0) {

    // build html 
    $html = "<select name='city_id'>"; 
    $html .= "<option value='0'> --- Country wide ---</option>"; 
    foreach ($cityList as $item) {

        $selected = $cityId == $item['id'] ? 'selected' : ''; 
        $html .= "<option $selected value='{$item['id']}'>{$item['name']}</option>"; 
    }
    $html .= "</select>"; 
    
    return $html; 
}