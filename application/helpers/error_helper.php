<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function error($title, array $errors) {
    
    echo "<div style='padding: 10px; '>"; 
    echo "<div class='show_error'>"; 
    echo "$title<br />"; 
    echo "<ul>"; 
    foreach ($errors as $item) { 
        
        echo "<li>$item</li>"; 
    }
    echo "</ul>"; 
    echo "</div></div>"; 
}