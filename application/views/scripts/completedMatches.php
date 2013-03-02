<div class="span9 contentBG">
    <h2>Completed matches</h2>
    <br />
    <div class="span8">

        <?php //printit($game_list); ?>

        <table class="table table-striped table-bordered table-condensed">
            <tbody>
                <tr>
                    <th>id</th>
                    <th>Match</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Winner</th>
                    <th>Set 1</th>
                    <th>Set 2</th>
                    <th>Set 3</th>
                    <th>Points</th>
                </tr>
            </tbody>
            <tbody>
                <?php //printit($game_list); ?>
                <?php if (!empty($game_list)) { foreach ($game_list as $item) { ?>
                    <tr>
                        <td>
                            <a href="<?php echo base_url()."game/{$item['game_id']}"; ?>">
                                <?php echo $item['game_id']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo base_url()."showUser/{$item['user_id1']}"; ?>">
                                <?php echo $item['user1_name']; ?></a>
                            <b>VS</b> 
                            <a href="<?php echo base_url()."showUser/{$item['user_id2']}"; ?>">
                                <?php echo $item['user2_name']; ?>
                            </a>
                            </a>
                        </td>
                        <td><?php echo $item['date']; ?></td>
                        <td><?php echo $item['time_f']; ?></td>
                        <td><?php echo "{$item['location']} {$item['location_other']}"; ?></td>
                        <td>
                            <?php if ($item['status'] == 'open') { 
                                        if (
                                            empty($item['set1_p1']) 
                                            || empty($item['set1_p1']) 
                                            || empty($item['set1_p2']) 
                                            || empty($item['set2_p1']) 
                                            || empty($item['set2_p2']) 
                                            || empty($item['set3_p1']) 
                                            || empty($item['set3_p2']) 
                                        ) { ?>
                                    
                                <form method="POST" action="<?php echo base_url()."addResultList"; ?>">
                                    <input type="submit" value="Add result" class="btn btn-primary" />
                                </form>
                            <?php } elseif (in_array($user['id'], array($item['user_id1'], $item['user_id2'])) && $user['id'] != $item['confirmed_result_user_id']) { ?>
                                <form method="POST" action="<?php echo base_url()."confirmResult/{$item['game_id']}"; ?>">
                                    <input type="hidden" name="game_id" value="<?php echo $item['game_id']; ?>" />
                                    <input type="submit" value="Confirm result" class="btn btn-primary" />
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo base_url()."addResult/{$item['game_id']}"; ?>">Change</a>
                                </form>
                            <?php } else { echo 'awating confirmation'; } } else { echo $item['status']; } ?>
                        </td>
                        <td>
                            <?php echo $item['winner_name']; ?>
                        </td>
                        <td>
                            <?php echo (($item['set1_p1'] + $item['set1_p2']) > 0) ? "{$item['set1_p1']}:{$item['set1_p2']}" : ''; ?>
                        </td>
                        <td>
                            <?php echo (($item['set2_p1'] + $item['set2_p1']) > 0) ? "{$item['set2_p1']}:{$item['set2_p2']}" : ''; ?>
                        </td>
                        <td>
                            <?php echo (($item['set3_p1'] + $item['set3_p2']) > 0)? "{$item['set3_p1']}:{$item['set3_p2']}" : ''; ?>
                        </td>
                        <td>
                            <?php echo intval($item['current_user_point']); ?>
                        </td>
                    </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>