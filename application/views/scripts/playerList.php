<div class="span9 contentBG">
    <h2>Player list</h2>
    <br />
    <div class="span8">
        
        <form action="<?php echo base_url(); ?>playerList" method="POST">
            
            <span class="title_span">Gender</span>
            <select name="gender">
                <option value=""> --- </option>
                <option value="male" <?php echo isset($post['gender']) && $post['gender'] == 'male' ? ' selected ' : ''; ?>>Male</option>
                <option value="female" <?php echo isset($post['gender']) && $post['gender'] == 'female' ? ' selected ' : ''; ?>>Female</option>
                <option value="undefined" <?php echo isset($post['gender']) && $post['gender'] == 'undefined' ? ' selected ' : ''; ?>>Undefined</option>
            </select>
            <br />
            
            <span class="title_span">Player strength</span>
            <select name="strength">
                <option value=""> --- </option>
                <?php foreach ($player_strength as $item) { 
                    $selected = $item == $post['strength'] ? ' selected ' : ''; 
                    ?>
                    <option <?php echo $selected; ?> value="<?php echo $item; ?>"><?php echo $item; ?></option>
                <?php } ?>
            </select>
            <br />

            <span class="title_span">Country</span>
            <select name="country_id">
                <option value=""> --- </option>
                <?php foreach ($country_list as $key => $value) { 
                    $selected = $key == $post['country_id'] ? ' selected ' : ''; 
                    ?>
                    <option <?php echo $selected; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                <?php } ?>
            </select>
            <br />
            
            <span class="title_span">Ranking</span>
            <select name="ranking">
                <option value=""> --- </option>
                <?php foreach (rankData() as $key => $value) { 
                    $selected = $key == $post['total_ranking_point'] ? ' selected ' : ''; 
                    ?>
                    <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <br />
            
            <br />
            <span class="title_span">&nbsp;</span>
            <input type="submit" value="Apply filter" class="btn btn-primary" />
            <input type="button" id="reset_player_filter" value="Reset filter" class="btn" />
            <br /><br /><br />
        </form>
        
        <?php //printit($user_list); ?>

        <table class="table table-striped table-bordered table-condensed">
            <tbody>
                <tr>
                    <th>Rank</th>
                    <th>User name</th>
                    <th>Match played</th>
                    <th>Match won</th>
                    <th>Match lost</th>
                    <th>Sets won</th>
                    <th>Sets lost</th>
                    <th>Game won</th>
                    <th>Game lost</th>
                    <th>Ranking points</th>
                </tr>
            </tbody>
            <tbody>
                <?php if (!empty($user_list)) { $i = 1; foreach ($user_list as $item) { ?>
                    <tr>
                        <td>
                            <?php echo $i; ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url()."showUser/{$item['user_id']}"; ?>">
                                <?php echo $item['name']; ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $item['match_played']; ?>
                        </td>
                        <td>
                            <?php echo $item['match_won']; ?>
                        </td>
                        <td>
                            <?php echo $item['match_lost']; ?>
                        </td>
                        <td>
                            <?php echo $item['set_won']; ?>
                        </td>
                        <td>
                            <?php echo $item['set_lost']; ?>
                        </td>
                        <td>
                            <?php echo $item['game_won']; ?>
                        </td>
                        <td>
                            <?php echo $item['game_lost']; ?>
                        </td>
                        <td>
                            <?php echo $item['total_ranking_point']; ?>
                        </td>
                    </tr>
                <?php $i++; } } ?>
            </tbody>
        </table>
    </div>
</div>