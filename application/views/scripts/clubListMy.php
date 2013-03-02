<div class="span9 contentBG">
    <h2>My clubs</h2>
    <br />
    <div class="span8">
        
        <h3>
            <a href="<?php echo base_url(); ?>clubAdd">[ + ] Add club</a><br /><br />
        </h3>

        <table class="table table-striped table-bordered table-condensed">
            <tbody>
                <tr>
                    <th></th>
                    <th>Image</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Street</th>
                    <th>Postal code</th>
                    <th>City</th>
                    <th>Website</th>
                    <th>Country</th>
                    <th></th>
                </tr>
            </tbody>
            <tbody>
                <?php if (!empty($club_list)) { foreach ($club_list as $item) { ?>
                    <tr>
                        <td>
                            <?php if ($user['id'] == $item['club_owner_id']) { ?>
                                <a href="<?php echo base_url()."clubEdit/{$item['id']}"; ?>">edit</a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if (file_exists(CLUB_IMAGE.DIRECTORY_SEPARATOR.$item['id'].".png")) { ?>
                                <a target="_blank" href='<?php echo base_url()."www/img/club/{$item['id']}.png"; ?>'>
                                    <img src='<?php echo base_url()."www/img/club/{$item['id']}.png"; ?>' height="40" />
                                </a>
                                <br />
                            <?php } ?>
                        </td>
                        <td><?php echo $item['id']; ?></td>
                        <td>
                            <a href="<?php echo base_url()."clubShow/{$item['id']}"; ?>">
                                <?php echo $item['name']; ?>
                            </a>
                        </td>
                        <td><?php echo $item['street']; ?></td>
                        <td><?php echo $item['postal_code']; ?></td>
                        <td><?php echo $item['city']; ?></td>
                        <td><?php echo $item['website'] ? "<a target='_blank' href='{$item['website']}'>{$item['website']}</a>" : ''; ?></td>
                        <td><?php echo $country_list[$item['country_id']]['name']; ?></td>
                        <td><a class="delete_link" href="<?php echo base_url()."clubDelete/{$user['id']}/{$item['id']}"; ?>">delete</a></td>
                    </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>