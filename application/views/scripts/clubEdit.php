<div class="span9 contentBG">
    <h2>Edit club</h2>
    <br />
    <div class="span8">
        <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>clubEdit" enctype="multipart/form-data">
            <fieldset>
                <div class="control-group">
                    <label for="input01" class="control-label">Name</label>
                    <div class="controls">
                        <input name="name" type="text" id="input01" class="input-xlarge" value="<?php echo $club_data['name']; ?>" /><br /><br />
                    </div><br />
                
                    <label for="input01" class="control-label">Street</label>
                    <div class="controls">
                        <input name="street" type="text" id="input01" class="input-xlarge" value="<?php echo $club_data['street']; ?>" /><br /><br />
                    </div><br />
                
                    <label for="input01" class="control-label">Postal code</label>
                    <div class="controls">
                        <input name="postal_code" type="text" id="input01" class="input-xlarge" value="<?php echo $club_data['postal_code']; ?>" /><br /><br />
                    </div><br />
                
                    <label for="input01" class="control-label">City</label>
                    <div class="controls">
                        <input name="city" type="text" id="input01" class="input-xlarge" value="<?php echo $club_data['city']; ?>" /><br /><br />
                    </div><br />
                
                    <label for="input01" class="control-label">Website</label>
                    <div class="controls">
                        <input name="website" type="text" id="input01" class="input-xlarge" value="<?php echo $club_data['website']; ?>" /><br /><br />
                    </div><br />
                
                    <label for="input01" class="control-label">Country</label>
                    <div class="controls">
                        <select name="country_id" id="select01">
                            <?php foreach ($country_list as $item) { 

                                $selected = $item['id'] == $club_data['country_id'] ? ' selected ' : ''; 
                                ?>
                                <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option> 
                            <?php } ?>
                        </select>
                        <br /><br />
                        
                    </div><br />
                    
                    <label for="input01" class="control-label">Profile image</label>
                    <div class="controls">
                        <?php if (file_exists(CLUB_IMAGE.DIRECTORY_SEPARATOR.$club_data['id'].".png")) { ?>
                            <a target="_blank" href='<?php echo base_url()."www/img/club/{$club_data['id']}.png"; ?>'>
                                <img src='<?php echo base_url()."www/img/club/{$club_data['id']}.png"; ?>' height="200" />
                            </a>
                            <br />
                        <?php } ?>
                        <input class="input-file" id="fileInput" name="profile_image" type="file" />
                    </div><br />
                </div>
                
                
                <div class="form-actions">
                    <input type="hidden" value="<?php echo $club_data['id']; ?>" name="id" />
                    <input type="submit" value="Save changes" class="btn btn-primary" />
                </div>
            </fieldset>
        </form>
    </div>
</div>