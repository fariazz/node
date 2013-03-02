<div class="span9 contentBG">
    <h2>Cancel training</h2>
    
    <?php if (!empty($errors)) { errortw('Please check input data', $errors); } ?>
    
    <table width="100%" border="0">
        <tr>
           <td style="width: 280px; ">
                <?php 
                    $destination = PROFILE_IMAGE.DIRECTORY_SEPARATOR."{$user1_data['id']}.png"; 
                    $picName = file_exists($destination) ? "{$user1_data['id']}.png" : 'profile_image.png'; 
                ?>
                <img src='<?php echo base_url()."www/img/profile/$picName"; ?>' width="120" /></a>
               &nbsp;VS&nbsp;
                <?php 
                    $destination = PROFILE_IMAGE.DIRECTORY_SEPARATOR."{$user2_data['id']}.png"; 
                    $picName = file_exists($destination) ? "{$user2_data['id']}.png" : 'profile_image.png'; 
                ?>
                <img src='<?php echo base_url()."www/img/profile/$picName"; ?>' width="120" /> 
               <br /><br />
            </td>
            <td> 
                <form action='<?php echo base_url()."cancelTraining/{$training_info['id']}"; ?>' method="POST">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Training id</td>
                            <td><?php echo !empty($training_info['id']) ? $training_info['id'] : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Player #1</td>
                            <td>
                                <a target="_blank" href='<?php echo base_url()."showUser/{$user1_data['id']}"; ?>'>
                                    <?php echo !empty($user1_data['name']) ? $user1_data['name'] : ''; ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Player #2</td>
                            <td>
                                <a target="_blank" href='<?php echo base_url()."showUser/{$user2_data['id']}"; ?>'>
                                    <?php echo !empty($user2_data['name']) ? $user2_data['name'] : ''; ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>
                                <?php echo !empty($training_info['location']) ? $training_info['location'] : ''; ?>
                                <?php echo !empty($training_info['location_other']) ? " ({$training_info['location_other']})" : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><?php echo !empty($training_info['date']) ? $training_info['date'] : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td><?php echo !empty($training_info['time_f']) ? $training_info['time_f'] : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Reason for canceling</td>
                            <td>
                                <input type="radio" name="reason" value="no_time" /> No time<br />
                                <input type="radio" name="reason" value="too_strong" /> Opponent is too strong<br />
                                <input type="radio" name="reason" value="not_strong" /> Opponent is not strong enough<br />
                                <input type="radio" name="reason" value="other" checked /> Other (please indicate)<br />
                            </td>
                        </tr>
                        <tr>
                            <td>Extra info</td>
                            <td>
                                <textarea name="reason_text" cols="2" rows="6"><?php echo isset($training_info['reason_text']) ? $training_info['reason_text'] : ''; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                <div class="form-actions">
                                    <input type="hidden" name="id" value="<?php echo $training_info['id']; ?>" />
                                    <?php if (isset($hide_submit) && $hide_submit == 1) { ?>
                                        It's late to cancel the training already.<br />
                                        Less then 48 hours left till start. 
                                    <?php } else { ?>
                                        <input type="submit" value="Cancel training" class="btn btn-primary" />
                                    <?php } ?>
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