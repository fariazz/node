<div class="span9 contentBG">
    <h2>Add result</h2>
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
                    <th>Winner</th>
                    <th>Set 1</th>
                    <th>Set 2</th>
                    <th>Set 3</th>
                    <th></th>
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
                                <?php echo $item['user1_name']; ?>
                            </a>
                            <br /><b>VS</b><br />
                            <a href="<?php echo base_url()."showUser/{$item['user_id2']}"; ?>">
                                <?php echo $item['user2_name']; ?>
                            </a>
                            </a>
                        </td>
                        <td><?php echo $item['date']; ?></td>
                        <td><?php echo $item['time_f']; ?></td>
                        <td><?php echo "{$item['location']} {$item['location_other']}"; ?></td>
                        <td>
                            <form method="POST" action="<?php echo base_url()."addResult/{$item['game_id']}"; ?>">
                            <select name="winner_id" class="medium_text">
                                <option <?php echo $item['winner_id'] == $item['user_id1'] ? ' selected ' : ''; ?> value="<?php echo $item['user_id1']; ?>"><?php echo $item['user1_name']; ?></option>
                                <option <?php echo $item['winner_id'] == $item['user_id2'] ? ' selected ' : ''; ?> value="<?php echo $item['user_id2']; ?>"><?php echo $item['user2_name']; ?></option>
                            </select>
                        </td>
                        <td>
                            <select name="set1_p1" class="small_text">
                                <?php for ($i = 0; $i <= 7; $i++) { 
                                    $selected = $item['set1_p1'] == $i ? ' selected ' : ''; ?>
                                    <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <select name="set1_p2" class="small_text">
                                <?php for ($i = 0; $i <= 7; $i++) { 
                                    $selected = $item['set1_p2'] == $i ? ' selected ' : ''; ?>
                                    <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select name="set2_p1" class="small_text">
                                <?php for ($i = 0; $i <= 7; $i++) { 
                                    $selected = $item['set2_p1'] == $i ? ' selected ' : ''; ?>
                                    <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <select name="set2_p2" class="small_text">
                                <?php for ($i = 0; $i <= 7; $i++) { 
                                    $selected = $item['set2_p2'] == $i ? ' selected ' : ''; ?>
                                    <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select name="set3_p1" class="small_text">
                                <?php for ($i = 0; $i <= 7; $i++) { 
                                    $selected = $item['set3_p1'] == $i ? ' selected ' : ''; ?>
                                    <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <select name="set3_p2" class="small_text">
                                <?php for ($i = 0; $i <= 7; $i++) { 
                                    $selected = $item['set3_p2'] == $i ? ' selected ' : ''; ?>
                                    <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input type="hidden" name="game_id" value="<?php echo $item['game_id']; ?>" />
                            <?php if (
                                        (!empty($item['winner_id']) 
                                        || !empty($item['set1_p1']) 
                                        || !empty($item['set1_p1']) 
                                        || !empty($item['set1_p2']) 
                                        || !empty($item['set2_p1']) 
                                        || !empty($item['set2_p2']) 
                                        || !empty($item['set3_p1']) 
                                        || !empty($item['set3_p2'])) 
                                        && ($user['id'] != $item['confirmed_result_user_id'])) { ?>
                            
                                        <input type="submit" value="Edit result" class="btn btn-primary" />
                                        </form>
                                        <br /><br />

                                        <form action="<?php echo base_url()."confirmResult/{$item['game_id']}"; ?>" method="POST" />
                                            <input type="hidden" name="game_id" value="<?php echo $item['game_id']; ?>" />
                                            <input type="submit" value="Confirm result" class="btn btn-primary" />
                                        </form>
                            <?php } elseif (intval($item['confirmed_result_user_id']) > 0 && ($user['id'] == $item['confirmed_result_user_id'])) { ?>
                                Waiting approval
                            <?php } else { ?>
                                <input type="submit" value="Add result" class="btn btn-primary" />
                            <?php } ?>
                        </td>
                    </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>