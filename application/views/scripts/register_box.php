<div class="span3 sidebar-nav">
    <?php if (!empty($errors)) { 
                
            errortw('Please check your input data', $errors); 
        } 
    ?>
    <form class="well" action="<?php echo base_url(); ?>register" method="POST">
        <label>Register</label>
        
        <input type="text" class="span2" name="name" value="<?php echo !empty($post['name']) ? $post['name'] : ''; ?>" placeholder="Username" />
        
        <select class="span2" name="gender">
            <option value=""> --- please select --- </option>
            <option value="male" <?php echo $post['gender'] == 'male' ? ' selected ' : ''; ?>>male</option>
            <option value="female" <?php echo $post['gender'] == 'female' ? ' selected ' : ''; ?>>female</option>
        </select>
        
        <br />
        <select class="medium2" name="day">
            <?php for ($i = 31; $i >= 1; $i--) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
        
        <select class="medium2" name="month">
            <?php for ($i = 12; $i >= 1; $i--) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
        
        <select class="medium3" name="year">
            <?php for ($i = intval(date("Y")); $i >= 1900; $i--) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
        
        <!--<input type="text" class="span2" name="dob" value="<?php echo !empty($post['dob']) ? $post['dob'] : ''; ?>" placeholder="Birthday YYYY-MM-DD" />-->
        <br /><br />
        
        <input type="text" class="span2" name="email" value="<?php echo !empty($post['email']) ? $post['email'] : ''; ?>" placeholder="Email" />
        <input type="password" class="span2" name="pass" placeholder="Password" />
        <input type="password" class="span2" name="pass_retype" placeholder="Password again" />

        <input type="submit" class="btn btn-primary btn-large" value="Sign up" />

        <span class="help-block"><a href="<?php echo base_url(); ?>restorePassword">Forgot password?</a></span>
    </form>
</div>