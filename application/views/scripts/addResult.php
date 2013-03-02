<div class="span9 contentBG">
    <h2>Add result</h2>
    
    <?php if (!empty($errors)) { errortw('Please check input data', $errors); } ?>
    
    <div class="span8">

        <?php //printit($game_list); ?>

        <form method="POST" action="<?php echo base_url()."addResult/{$game['game_id']}"; ?>">
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
                    <tr>
                        <td>
                            <a href="<?php echo base_url()."game/{$game['id']}"; ?>">
                                <?php echo $game['id']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo base_url()."showUser/{$game['user_id1']}"; ?>">
                                <?php echo $game['user1_name']; ?></a>
                            <b>VS</b> 
                            <a href="<?php echo base_url()."showUser/{$game['user_id2']}"; ?>">
                                <?php echo $game['user2_name']; ?>
                            </a>
                            </a>
                        </td>
                        <td><?php echo $game['date']; ?></td>
                        <td><?php echo $game['time_f']; ?></td>
                        <td><?php echo "{$game['location']} {$game['location_other']}"; ?></td>
                        <td>
                            <select name="winner_id" class="medium_text">
                                <option value="<?php echo $game['user_id1']; ?>"><?php echo $game['user1_name']; ?></option>
                                <option value="<?php echo $game['user_id2']; ?>"><?php echo $game['user2_name']; ?></option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="set1" value="<?php echo isset($post['set1']) ? $post['set1'] : ''; ?>" class="small_text" />
                        </td>
                        <td>
                            <input type="text" name="set2" value="<?php echo isset($post['set2']) ? $post['set2'] : ''; ?>" class="small_text" />
                        </td>
                        <td>
                            <input type="text" name="set3" value="<?php echo isset($post['set3']) ? $post['set3'] : ''; ?>" class="small_text" />
                        </td>
                        <td>
                            <input type="hidden" name="game_id" value="<?php echo $game['game_id']; ?>" />
                            <input type="submit" value="Save result" class="btn btn-primary" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>