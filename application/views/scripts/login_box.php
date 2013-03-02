<div class="span3 sidebar-nav">
    <?php if (!empty($errors)) { 
                
            errortw('Please check input data', $errors); 
        } 
    ?>
    <form class="well" action="<?php echo base_url(); ?>auth" method="POST">
        <label>Login</label>
        <input type="text" class="span2" name="login" placeholder="Email" />
        <input type="password" class="span2" name="password" placeholder="Password" />

        <label class="checkbox">
            <input type="checkbox">Keep me signed in
        </label>
            
        <input type="submit" class="btn btn-primary btn-large" value="Submit" />

        <span class="help-block"><a href="<?php echo base_url(); ?>register">Sign up</a></span>
        <span class="help-block"><a href="<?php echo base_url(); ?>restorePassword">Forgot password?</a></span>
    </form>
    
    <form action="<?php echo $dialog_url; ?>" method="POST">
        <input type="submit" value="Facebook login" />
    </form>
</div>