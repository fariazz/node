<div class="span3 sidebar-nav">
    <?php if (!empty($errors)) { 
                
            errortw('Please check your input data', $errors); 
        } 
        elseif ($done == 'done') { 

            infotw('info', "Please check your email {$post['email']} with link to set a new password"); 
        }
    ?>
    <form class="well" action="<?php echo base_url(); ?>restorePassword" method="POST">
        <label>Restore password</label>
        <input type="text" class="span2" name="email" placeholder="Email" />
        <input type="submit" class="btn btn-primary btn-large" value="Send link to email" />

        <span class="help-block"><a href="<?php echo base_url(); ?>register">Sign up</a></span>
    </form>
</div>