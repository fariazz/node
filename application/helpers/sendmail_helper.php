<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function sendmail($email, $templateId, $data) {
    
    $CI =& get_instance();
    
    $res = $CI->email_model->getEmailDataById($templateId); 
    
    $data['base_url'] = base_url(); 
    $content = replaceVars($res['body'], $data); 
    
    echo $content; exit(); 
    $res = mail($email, $res['title'], $content); 
    
    return $res; 
}

function replaceVars($content, $data) {
    
    foreach ($data as $key => $value) {
        
        $content = str_replace("{{$key}}", $value, $content); 
    }
    
    return $content; 
}