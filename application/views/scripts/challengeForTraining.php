<div class="span9 contentBG">
    <h2>Challenge for training player: <?php echo $user_data['name']; ?></h2>
    
    <?php if (!empty($errors)) { errortw('Please check input data', $errors); } ?>
    
    <table width="100%" border="0">
        <tr>
           <td style="width: 280px; ">
                <?php 
                    $destination = PROFILE_IMAGE.DIRECTORY_SEPARATOR."{$user['id']}.png"; 
                    $picName = file_exists($destination) ? "{$user['id']}.png" : 'profile_image.png'; 
                ?>
                <img src='<?php echo base_url()."www/img/profile/$picName"; ?>' width="120" /></a>
               &nbsp;VS&nbsp;
                <?php 
                    $destination = PROFILE_IMAGE.DIRECTORY_SEPARATOR."{$user_data['id']}.png"; 
                    $picName = file_exists($destination) ? "{$user_data['id']}.png" : 'profile_image.png'; 
                ?>
                <img src='<?php echo base_url()."www/img/profile/$picName"; ?>' width="120" /> 
               <br /><br />
            </td>
            <td> 
                <form action="<?php echo base_url(); ?>challengeForTraining/<?php echo $user_data['id']; ?>" method="POST">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Date</td>
                            <td><input type="text" name="date" class="date" value="<?php echo !empty($post['date']) ? $post['date'] : ''; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td><input type="text" name="time" class="time" value="<?php echo !empty($post['time']) ? $post['time'] : ''; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>
                                <input type="radio" value="home_court" name="location" <?php echo !isset($post['location']) ? ' checked ' : ''; ?> <?php echo isset($post['location']) && $post['location'] == 'home_court' ? ' checked ' : ''; ?> /> Home court<br />
                                <input type="radio" value="home_court_open" name="location" <?php echo isset($post['location']) && $post['location'] == 'home_court_open' ? ' checked ' : ''; ?>/> Oppenents home court<br />
                                <input type="radio" value="other" name="location" class="other_location_radio" <?php echo isset($post['location']) && $post['location'] == 'other' ? ' checked ' : ''; ?>/> Other<br />
                                <div class="other_location" style="display: <?php echo isset($post['location']) && $post['location'] == 'other' ? ' block ' : ' none '; ?>; ">
                                    <textarea name="location_other" cols="2" rows="2"><?php echo isset($post['location_other']) ? $post['location_other'] : ''; ?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>
                                <div class="other_location">
                                    <textarea name="message_user1" cols="2" rows="6"><?php echo isset($post['message_user1']) ? $post['message_user1'] : ''; ?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <div class="form-actions">
                                    <input type="hidden" name="user_id1" value="<?php echo $user['id']; ?>">
                                    <input type="hidden" name="user_id2" value="<?php echo $user_data['id']; ?>">
                                    <input type="submit" value="Challenge for training" class="btn btn-primary" />
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
            </td>
        </tr>
    </table>
</div>