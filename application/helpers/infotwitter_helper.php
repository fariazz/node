<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function infotw($msgId, $msgBody) {
    
    echo '<div class="notification attention png_bg">'; 
    echo '<a href="#" class="close"><img src="<?php echo base_url(); ?>www/img/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>'; 
    echo '<div>'; 
    echo $msgBody; 
    echo '</div>'; 
    echo '</div>'; 
}