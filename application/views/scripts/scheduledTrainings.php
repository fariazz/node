<div class="span9 contentBG">
    <h2>Scheduled trainings</h2>
    <br />
    <div class="span8">

        <?php //printit($training_list); ?>

        <table class="table table-striped table-bordered table-condensed">
            <tbody>
                <tr>
                    <th>id</th>
                    <th>Training</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Confirmed player #1</th>
                    <th>Confirmed player #2</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </tbody>
            <tbody>
                <?php if (!empty($training_list)) { foreach ($training_list as $item) { ?>
                    <tr>
                        <td>
                            <?php echo $item['training_id']; ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url()."training/{$item['training_id']}"; ?>">
                                <?php echo $item['user1_name']; ?> <b>VS</b> 
                                <?php echo $item['user2_name']; ?>
                            </a>
                        </td>
                        <td><?php echo $item['date']; ?></td>
                        <td><?php echo $item['time_f']; ?></td>
                        <td><?php echo "{$item['location']} {$item['location_other']}"; ?></td>
                        <td>
                            <?php echo $item['confirmed_user1'] > 0 ? 'yes' : 'no'; ?> 
                            <a target="_blank" href="<?php echo base_url()."showUser/{$item['user_id1']}"; ?>">
                                <?php echo $item['user1_name']; ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $item['confirmed_user2'] > 0 ? 'yes' : 'no'; ?> 
                            <a target="_blank" href="<?php echo base_url()."showUser/{$item['user_id2']}"; ?>">
                                <?php echo $item['user2_name']; ?>
                            </a>
                        </td>
                        <td><?php echo $item['status']; ?></td>
                        <td>
                            <?php if ($item['status'] != 'cancelled') { ?>
                                <a class="red" href="<?php echo base_url()."cancelTraining/{$item['training_id']}"; ?>">Cancel</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>