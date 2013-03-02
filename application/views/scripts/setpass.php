<div class="span3 sidebar-nav">
    
    <?php if (!empty($errors)) { 

            errortw('Please check your input data', $errors); 
        } 
        elseif ($hash == 'done') { 

            infotw('info', "New password saved. <a href='".base_url()."'>You can login now</a>"); 
        }
    ?>
    
    <?php if ($hash != 'done') { ?>
        <form class="well" action="<?php echo base_url(); ?>setpass/<?php echo $hash; ?>/<?php echo $email_hash; ?>" method="POST">
            <label>Set new password</label>
            <input class="input_long" type="password" name="password" placeholder="Type new password" value="" /><br />
            <input class="input_long" type="password" name="repassword" placeholder="Retype new password" value="" /><br />

            <input type="hidden" name="newpass_hash" value="<?php echo $hash; ?>" />
            <input type="submit" class="btn btn-primary btn-large" value="Save new password" />

            <span class="help-block"><a href="<?php echo base_url(); ?>">Login</a></span>
        </form>
    <?php } ?>
</div>