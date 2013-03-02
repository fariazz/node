<div class="content-box-header">

    <h3>Edit client</h3>

    <ul class="content-box-tabs">

        <li><a href="#tab1" class="default-tab">Edit client</a></li> <!-- href must be unique and match the id of target div -->
        <!--<li><a href="#tab2">Forms</a></li>-->
    </ul>

    <div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

    <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

        <?php //printit($user_list); ?>

        <div class="notification attention png_bg">
            <a href="#" class="close"><img src="<?php echo base_url(); ?>www/img/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>
                Please enter all required fields. 
            </div>
        </div>
        
        <?php //if (!empty($errors)) { 
                
                //errortw('Please check your input data', $errors); 
            //} 
        ?>

        <form method="POST" action="<?php echo base_url()."editClient/{$post['id']}"; ?>" enctype="multipart/form-data" >
            
            <p>
                <label>Customer reference number (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="text" name="customer_ref_number" 
                       value="<?php echo isset($post['customer_ref_number']) ? $post['customer_ref_number'] : ''; ?>">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            
            <p>
                <label>Username (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="text" name="username"
                    value="<?php echo isset($post['username']) ? $post['username'] : ''; ?>">
            <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>First name (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="text" name="first_name" 
                    value="<?php echo isset($post['first_name']) ? $post['first_name'] : ''; ?>">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>Last name (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="text" name="last_name" 
                    value="<?php echo isset($post['last_name']) ? $post['last_name'] : ''; ?>">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>Company (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="text" name="company" 
                    value="<?php echo isset($post['last_name']) ? $post['last_name'] : ''; ?>">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>Phone number (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="text" name="phone" 
                    value="<?php echo isset($post['phone']) ? $post['phone'] : ''; ?>">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>Email address (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="text" name="email" 
                    value="<?php echo isset($post['email']) ? $post['email'] : ''; ?>">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>Registered address (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="text" name="registered_address" 
                    value="<?php echo isset($post['registered_address']) ? $post['registered_address'] : ''; ?>">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>Billing address (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="text" name="billing_address" 
                    value="<?php echo isset($post['billing_address']) ? $post['billing_address'] : ''; ?>">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>Password (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="password" name="password">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>Password again (*) </label>
                <input id="small-input" maxlength="255" class="text-input small-input" type="password" name="password_again">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>Upload logo </label>
                <input id="small-input" class="text-input small-input" type="file" name="logo">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            <p>
                <label>Color </label>
                <input id="small-input" class="text-input small-input color" type="text" name="customer_color" 
                    value="<?php echo isset($post['color']) ? $post['color'] : ''; ?>">
                <!--<span class="input-notification success png_bg">Successful message</span>-->
                <br />
                <!--<small>A small description of the field</small>-->
            </p>
            
            <p>
                <br /><br /><br /><br /><br /><br />
                <input class="button" type="submit" value="Create" />
            </p>
        </form>
                
    </div> <!-- End #tab1 -->
</div> <!-- End .content-box-content -->