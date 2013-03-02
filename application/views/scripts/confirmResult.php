<div class="span9 contentBG">
    <h2>Confirm result</h2>
    <br />
    <div class="span8">

        <?php //printit($game_list); ?>

        <form method="POST" action="<?php echo base_url()."confirmResult/{$game['game_id']}"; ?>">
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
                            <?php echo $winner['name']; ?>
                        </td>
                        <td>
                            <?php echo "{$game['set1_p1']}:{$game['set1_p2']}"; ?>
                        </td>
                        <td>
                            <?php echo "{$game['set2_p1']}:{$game['set2_p2']}"; ?>
                        </td>
                        <td>
                            <?php echo "{$game['set3_p1']}:{$game['set3_p2']}"; ?>
                        </td>
                        <td>
                            <input type="hidden" name="game_id" value="<?php echo $game['game_id']; ?>" />
                            <input type="submit" value="Confirm result" class="btn btn-primary" />
                            &nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url()."addResult/{$game['game_id']}"; ?>">Change result</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>