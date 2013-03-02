<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function errortw($title, array $errors) {
    
    echo '<div class="notification attention png_bg">'; 
    echo '<a href="#" class="close"><img src="<?php echo base_url(); ?>www/img/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>'; 
    echo '<div>'; 
    echo "<ul>"; 
    foreach ($errors as $item) { 
        
        echo "<li>$item</li>"; 
    }
    echo "</ul>"; 
    echo '</div>'; 
    echo '</div>'; 
}