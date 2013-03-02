<div class="span9 contentBG">
    <h2>Training proposal</h2>
    
    <?php if (!empty($errors)) { errortw('Please check input data', $errors); } ?>
    
    <table width="100%" border="0">
        <tr>
           <td style="width: 280px; ">
                <?php 
                    $destination = PROFILE_IMAGE.DIRECTORY_SEPARATOR."{$user_data1['id']}.png"; 
                    $picName = file_exists($destination) ? "{$user_data1['id']}.png" : 'profile_image.png'; 
                ?>
                <img src='<?php echo base_url()."www/img/profile/$picName"; ?>' width="120" /></a>
               &nbsp;VS&nbsp;
                <?php 
                    $destination = PROFILE_IMAGE.DIRECTORY_SEPARATOR."{$user_data2['id']}.png"; 
                    $picName = file_exists($destination) ? "{$user_data2['id']}.png" : 'profile_image.png'; 
                ?>
                <img src='<?php echo base_url()."www/img/profile/$picName"; ?>' width="120" /> 
               <br /><br />
               <center>
                   <?php if ($training["confirmed_user$viewer_user_id"] == '0') { ?>
                        <form action="<?php echo base_url(); ?>trainingConfirm/<?php echo $training['id']; ?>" method="POST">
                            <input type="hidden" name="confirmed_user<?php echo $viewer_user_id; ?>" value="1" />
                            <input type="submit" value="Agree the training" class="btn btn-primary" />
                        </form>
                   <?php } ?>
               </center>
            </td>
            <td> 
                <form action="<?php echo base_url(); ?>training/<?php echo $training['id']; ?>" method="POST">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Date</td>
                            <td><input type="text" name="date" class="date" value="<?php echo !empty($training['date']) ? $training['date'] : ''; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td><input type="text" name="time" class="time" value="<?php echo !empty($training['time_f']) ? $training['time_f'] : ''; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>
                                <input type="radio" value="home_court" <?php echo $training['location'] == 'home_court' ? ' checked ' : ''; ?> name="location" /> Home court<br />
                                <input type="radio" value="home_court_open" <?php echo $training['location'] == 'home_court_open' ? ' checked ' : ''; ?> name="location" /> Oppenents home court<br />
                                <input class="other_location_radio" type="radio" value="other" <?php echo $training['location'] == 'other' ? ' checked ' : ''; ?> name="location" /> Other<br />
                                <div class="other_location" style="display: <?php echo $training['location'] == 'other' ? ' block' : 'none'; ?>; ">
                                    <textarea name="location_other" cols="2" rows="2"><?php echo !empty($training['location_other']) ? $training['location_other'] : ''; ?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>
                                <textarea <?php echo $training['user_id1'] != $user['id'] ? ' disabled ' : ''; ?> name="message_user1" cols="2" rows="6"><?php echo !empty($training['message_user1']) ? $training['message_user1'] : ''; ?></textarea>
                                <textarea <?php echo $training['user_id2'] != $user['id'] ? ' disabled ' : ''; ?>name="message_user2" cols="2" rows="6"><?php echo !empty($training['message_user2']) ? $training['message_user2'] : ''; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <div class="form-actions">
                                    <input type="hidden" name="current_user" value="<?php echo $viewer_user_id; ?>" />
                                    <input type="submit" value="Save training & challenge again" class="btn btn-primary" />
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