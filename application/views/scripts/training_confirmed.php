<div class="span9 contentBG">
    <h2>Training confirmed</h2>
    
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
            </td>
            <td> 
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Status</td>
                            <td><?php echo !empty($training['status']) ? $training['status']: ''; ?></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><?php echo !empty($training['date']) ? $training['date']: ''; ?></td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td><?php echo !empty($training['time']) ? $training['time']: ''; ?></td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>
                                <?php echo !empty($training['location']) ? $training['location']: ''; ?><br />
                                <?php echo !empty($training['location_other']) ? $training['location_other']: ''; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</div>