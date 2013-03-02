<div class="span9 contentBG">
    <h2>Club <?php echo $club_data['name']; ?> details</h2>
    
    <table width="100%" border="0">
        <tr>
           <td style="width: 280px; ">
                <a target="_blank" href='<?php echo base_url()."www/img/club/{$club_data['id']}.png"; ?>'>
                    <img src='<?php echo base_url()."www/img/club/{$club_data['id']}.png"; ?>' width="260" />
                </a>
            </td> 
            <td> 
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $club_data['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Street</td>
                            <td><?php echo $club_data['street']; ?></td>
                        </tr>
                        <tr>
                            <td>Postal code</td>
                            <td><?php echo $club_data['postal_code']; ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?php echo $club_data['city']; ?></td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td><?php echo $club_data['website'] ? "<a target='_blank' href='{$club_data['website']}'>{$club_data['website']}</a>" : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><?php echo $country_list[$club_data['country_id']]['name']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <?php //printit($player_list); ?>
    <div class="span8">
        <h3> Players of this clubs</h3>
        <table class="table table-striped table-bordered table-condensed">
            <tbody>
                <tr>
                    <th>Rank</th>
                    <th>Profile picture</th>
                    <th>User name</th>
                    <th>Games played</th>
                    <th>Games won</th>
                    <th>Games lost</th>
                    <th>Ranking points</th>
                </tr>
            </tbody>
            <?php if (!empty($player_list)) { foreach ($player_list as $item) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $item['ranking']; ?></td>
                        <td>
                            <a target="_blank" href='<?php echo base_url()."www/img/profile/{$item['id']}.png"; ?>'>
                                <img src='<?php echo base_url()."www/img/profile/{$item['id']}.png"; ?>' height="40" />
                            </a>
                        </td>
                        <td><?php echo $item['name']; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            <?php } } ?>
        </table>
    </div>
</div>