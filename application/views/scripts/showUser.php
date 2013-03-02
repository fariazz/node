<div class="span9 contentBG">
    <h2>Player <?php echo $user_data['name']; ?></h2>
    
    <table width="100%" border="0">
        <tr>
           <td style="width: 280px; ">
                <a target="_blank" href='<?php echo base_url()."www/img/profile/{$user_data['id']}.png"; ?>'>
                    
                    <?php 
                        $destination = PROFILE_IMAGE.DIRECTORY_SEPARATOR."{$user_data['id']}.png"; 
                        $picName = file_exists($destination) ? "{$user_data['id']}.png" : 'profile_image.png'; 
                    ?>
                    <img src='<?php echo base_url()."www/img/profile/$picName"; ?>' width="260" />
                </a>
               <br /><br />
            </td> 
            <td> 
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $user_data['name'] ? $user_data['name'] : 'not set yet'; ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><?php echo $user_data['gender'] ? $user_data['gender'] : 'not set yet'; ?></td>
                        </tr>
                        <tr>
                            <td>Strength</td>
                            <td><?php echo $user_data['strength'] ? $user_data['strength'] : 'not set yet'; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $user_data['email'] ? $user_data['email'] : 'not set yet'; ?></td>
                        </tr>
                        <tr>
                            <td>Ranking</td>
                            <td><?php echo $user_data['total_ranking_point'] ? $user_data['total_ranking_point'] : 'not set yet'; ?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><?php echo $user_data['country_id'] > 0 ? $country_list[$user_data['country_id']]['name'] : 'not set yet'; ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?php echo $user_data['city'] ? $user_data['city'] : 'not set yet'; ?></td>
                        </tr>
                        <tr>
                            <td>Street name</td>
                            <td><?php echo $user_data['street_name'] ? $user_data['street_name'] : 'not set yet'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="width: 200px; ">
                <?php if ($user['id'] != $user_data['id']) { ?>
                    <h3>Actions</h3>
                    <br />
                    <a href="<?php echo base_url()."challengeForGame/{$user_data['id']}"; ?>">Challenge for game</a><br /><br />
                    <a href="<?php echo base_url()."challengeForTraining/{$user_data['id']}"; ?>">Challenge for training</a><br />
                <?php } ?>
            </td>
        </tr>
    </table>
</div>