<div class="span9 contentBG">
    <h2>Edit Profile</h2>
    <?php if ($saved == 'saved') { infotw('info', 'Profile updated'); } ?>
    
    <?php if (!empty($errors)) { errortw('Please check input data', $errors); } ?>
    
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>profile/<?php echo $user_data['user_id']; ?>" enctype="multipart/form-data">
        <div class="control-group">
            <label class="control-label" for="select01">Player strength</label>
            <div class="controls">
                <select id="select01" name="strength">
                    <?php foreach ($player_strength as $item) { 
                        
                        $strength = !empty($post) ? $post['strength'] : $user_data['strength']; 
                        $selected = $item == $strength ? ' selected ' : ''; 
                        ?>
                        <option <?php echo $selected; ?> value="<?php echo $item; ?>"><?php echo $item; ?></option>
                    <?php } ?>
                </select>
                <a id="show_more_info" href="#" class="btn btn-danger" rel="popover" data-content="" data-original-title="">
                    More info
                </a>
                <div id="more_info" style="display: none; padding: 10px; width: 60%; ">
                    An attribute is a piece of data (a "statistic") that describes to what extent a fictional character in a role-playing game possesses a specific natural, in-born characteristic common to all characters in the game. That piece of data is usually an abstract number or, in some cases, a set of dice. Some games use different terms to refer to an attribute, such as statistic, (primary) characteristic or ability.
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="fileInput">Profile image</label>
            <div class="controls">
                <?php if (file_exists(PROFILE_IMAGE.DIRECTORY_SEPARATOR.$user['id'].".png")) { ?>
                    <a target="_blank" href='<?php echo base_url()."www/img/profile/{$user['id']}.png"; ?>'>
                        <img src='<?php echo base_url()."www/img/profile/{$user['id']}.png"; ?>' height="200" />
                    </a>
                    <br />
                <?php } ?>
                <input class="input-file" id="fileInput" name="profile_image" type="file" />
            </div>
        </div>

        <fieldset>
            <div class="control-group">
                <label class="control-label" for="select01">Country</label>
                <div class="controls">
                    <select name="country_id" id="select01">
                        <?php foreach ($country_list as $item) { 
                            
                            $country_id = !empty($post) ? $post['country_id'] : $user_data['country_id']; 
                            $selected = $item['id'] == $country_id ? ' selected ' : ''; 
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option> 
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="input01">Birthday</label>
                <div class="controls">
                    <input type="text" name="dob" class="input-xlarge" id="input01" value="<?php echo !empty($post) ? $post['dob'] : $user_data['dob']; ?>" />
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="input01">City</label>
                <div class="controls">
                    <input name="city" type="text" class="input-xlarge" id="input01" value="<?php echo !empty($post) ? $post['city'] : $user_data['city']; ?>"/>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="multiSelect">Club</label>
                <div class="controls">
                    <select name="club[]" multiple="multiple" id="multiSelect">
                        <?php foreach ($club_list as $item) { 
                            
                            $selected = in_array($item['id'], array_keys($club_list_user)) ? ' selected ' : ''; 
                            ?>
                            <option <?php echo $selected; ?>value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option> 
                        <?php } ?>
                    </select>
                </div>
            </div>
            <hr />

            <div class="control-group">
                <label class="control-label" for="input01">E-Mail</label>
                <div class="controls">
                    <input type="text" name="email" class="input-xlarge" id="input01" value="<?php echo !empty($post) ? $post['email'] : $user_data['email']; ?>" />
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <a href="<?php echo base_url(); ?>changePassword">Change password</a>
                </div>
            </div>

            <div class="form-actions">
                <input type="submit" value="Save changes" class="btn btn-primary" />
                <input type="button" value="Cancel" class="btn" />
            </div>
        </fieldset>
    </form>
</div>