<div class="content-box-header">

    <?php //printit($client_list); echo "111$client_id 222"; ?>
    <h3>Edit requestor for client <?php echo "{$client_list[$post['client_id']]['first_name']} {$client_list[$post['client_id']]['last_name']}"; ?></h3>

    <ul class="content-box-tabs">

        <li><a href="#tab1" class="default-tab">Edit client</a></li> <!-- href must be unique and match the id of target div -->
        <!--<li><a href="#tab2">Forms</a></li>-->
    </ul>

    <div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

    <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

        <?php //printit($post); ?>

        <div class="notification attention png_bg">
            <a href="#" class="close"><img src="<?php echo base_url(); ?>www/img/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>
                Please enter all required fields. 
            </div>
        </div>
        
        <?php if (!empty($errors)) { 
                
                errortw('Please check your input data', $errors); 
            } 
        ?>

        <form method="POST" action="<?php echo base_url()."editRequestor/{$post['id']}"; ?>">
            
            <p>
                <label>Client (*) </label>
                <?php if (!empty($client_list)) { ?> 
                    <select name="client_id">
                        <option value=""> --- please select --- </option>
                        <?php foreach ($client_list as $item) { 
                            $selected = $item['id'] == $post['client_id'] ? ' selected ' : ''; 
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"><?php echo "{$item['first_name']} {$item['last_name']}"; ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
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
                <input class="button" type="submit" value="Create" />
            </p>
        </form>
                
    </div> <!-- End #tab1 -->
</div> <!-- End .content-box-content -->