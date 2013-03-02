<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function info($msgId, $msgBody) {
    
    echo "<div style='padding: 10px; '>"; 
    echo "<div id='saved' class='$msgId'>$msgBody</div>"; 
    echo "</div>"; 
}