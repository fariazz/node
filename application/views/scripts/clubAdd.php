<div class="span9 contentBG">
    <h2>New club</h2>
    <br />
    <div class="span8">
        <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>clubAdd" enctype="multipart/form-data">
            <fieldset>
                <div class="control-group">
                    <label for="input01" class="control-label">Name</label>
                    <div class="controls">
                        <input name="name" type="text" id="input01" class="input-xlarge" value="<?php echo !empty($post) ? $post['name'] : $post['name']; ?>" /><br /><br />
                    </div><br />
                
                    <label for="input01" class="control-label">Street</label>
                    <div class="controls">
                        <input name="street" type="text" id="input01" class="input-xlarge" value="<?php echo !empty($post) ? $post['street'] : $post['street']; ?>" /><br /><br />
                    </div><br />
                
                    <label for="input01" class="control-label">Postal code</label>
                    <div class="controls">
                        <input name="postal_code" type="text" id="input01" class="input-xlarge" value="<?php echo !empty($post) ? $post['postal_code'] : $post['postal_code']; ?>" /><br /><br />
                    </div><br />
                
                    <label for="input01" class="control-label">City</label>
                    <div class="controls">
                        <input name="city" type="text" id="input01" class="input-xlarge" value="<?php echo !empty($post) ? $post['city'] : $post['city']; ?>" /><br /><br />
                    </div><br />
                
                    <label for="input01" class="control-label">Website</label>
                    <div class="controls">
                        <input name="website" type="text" id="input01" class="input-xlarge" value="<?php echo !empty($post) ? $post['website'] : $post['website']; ?>" /><br /><br />
                    </div><br />
                
                    <label for="input01" class="control-label">Country</label>
                    <div class="controls">
                        <select name="country_id" id="select01">
                            <?php foreach ($country_list as $item) { 

                                $country_id = !empty($post) ? $post['country_id'] : $user_data['country_id']; 
                                $selected = $item['id'] == $country_id ? ' selected ' : ''; 
                                ?>
                                <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option> 
                            <?php } ?>
                        </select>
                        <br />
                    </div><br />
                    
                    <label for="input01" class="control-label">Profile image</label>
                    <div class="controls">
                        <input class="input-file" id="fileInput" name="profile_image" type="file" />
                    </div>
                </div>
                
                <div class="form-actions">
                    <input type="submit" value="Save changes" class="btn btn-primary" />
                </div>
            </fieldset>
        </form>
    </div>
</div>