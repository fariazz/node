<div class="span9 contentBG">
    
    <h2>Add Result</h2>
    
    <?php echo !empty($error) ? infotw('error', "Game result is not correct") : ''; ?>
    
    <?php if (!empty($game_list)) { foreach ($game_list as $item) { 
        
        // flag which say do not show Edit button 
        $noEdit = FALSE; 
        
        // here we check if game result was not set yet then we set game result with submitted values 
        if (empty($item['set1_p1'])
                && empty($item['set1_p2'])
                && empty($item['set2_p1'])
                && empty($item['set2_p2'])
                && empty($item['set3_p1'])
                && empty($item['set3_p2'])
            ) {
            
            $item['set1_p1'] = $post['set1_p1']; 
            $item['set1_p2'] = $post['set1_p2']; 
            $item['set2_p1'] = $post['set2_p1']; 
            $item['set2_p2'] = $post['set2_p2']; 
            $item['set3_p1'] = $post['set3_p1']; 
            $item['set3_p2'] = $post['set3_p2']; 
            
            // flag which say do not show Edit button 
            $noEdit = TRUE; 
        }
        ?>

        <form method="POST" action="<?php echo base_url()."addResult/{$item['game_id']}"; ?>">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Match ID</th>
                        <th>Players</th>
                        <th>Set 1</th>
                        <th>Set 2</th>
                        <th>Set 3</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="2">
                            <a href="<?php echo base_url()."game/{$item['game_id']}"; ?>">
                                <?php echo $item['game_id']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo base_url()."showUser/{$item['user_id1']}"; ?>">
                                <?php echo $item['user1_name']; ?>
                            </a>
                        </td>
                        <td>
                            <select class="span1" name="set1_p1">
                                <option> - </option>
                                <option <?php echo $item['set1_p1'] == 0 ? ' selected ' : ''; ?>>0</option>
                                <option <?php echo $item['set1_p1'] == 1 ? ' selected ' : ''; ?>>1</option>
                                <option <?php echo $item['set1_p1'] == 2 ? ' selected ' : ''; ?>>2</option>
                                <option <?php echo $item['set1_p1'] == 3 ? ' selected ' : ''; ?>>3</option>
                                <option <?php echo $item['set1_p1'] == 4 ? ' selected ' : ''; ?>>4</option>
                                <option <?php echo $item['set1_p1'] == 5 ? ' selected ' : ''; ?>>5</option>
                                <option <?php echo $item['set1_p1'] == 6 ? ' selected ' : ''; ?>>6</option>
                                <option <?php echo $item['set1_p1'] == 7 ? ' selected ' : ''; ?>>7</option>
                            </select>
                        </td>
                        <td>
                            <select class="span1" name="set2_p1">
                                <option> - </option>
                                <option <?php echo $item['set2_p1'] == 0 ? ' selected ' : ''; ?>>0</option>
                                <option <?php echo $item['set2_p1'] == 1 ? ' selected ' : ''; ?>>1</option>
                                <option <?php echo $item['set2_p1'] == 2 ? ' selected ' : ''; ?>>2</option>
                                <option <?php echo $item['set2_p1'] == 3 ? ' selected ' : ''; ?>>3</option>
                                <option <?php echo $item['set2_p1'] == 4 ? ' selected ' : ''; ?>>4</option>
                                <option <?php echo $item['set2_p1'] == 5 ? ' selected ' : ''; ?>>5</option>
                                <option <?php echo $item['set2_p1'] == 6 ? ' selected ' : ''; ?>>6</option>
                                <option <?php echo $item['set2_p1'] == 7 ? ' selected ' : ''; ?>>7</option>
                            </select>
                        </td>
                        <td>
                            <select class="span1" name="set3_p1">
                                <option> - </option>
                                <option <?php echo $item['set3_p1'] == 0 ? ' selected ' : ''; ?>>0</option>
                                <option <?php echo $item['set3_p1'] == 1 ? ' selected ' : ''; ?>>1</option>
                                <option <?php echo $item['set3_p1'] == 2 ? ' selected ' : ''; ?>>2</option>
                                <option <?php echo $item['set3_p1'] == 3 ? ' selected ' : ''; ?>>3</option>
                                <option <?php echo $item['set3_p1'] == 4 ? ' selected ' : ''; ?>>4</option>
                                <option <?php echo $item['set3_p1'] == 5 ? ' selected ' : ''; ?>>5</option>
                                <option <?php echo $item['set3_p1'] == 6 ? ' selected ' : ''; ?>>6</option>
                                <option <?php echo $item['set3_p1'] == 7 ? ' selected ' : ''; ?>>7</option>
                            </select>
                        </td>
                        <td rowspan="2">
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
                                        && ($user['id'] != $item['confirmed_result_user_id'])
                                        && !$noEdit) { ?>
                            
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
                    <tr>
                        <td>
                            <a href="<?php echo base_url()."showUser/{$item['user_id2']}"; ?>">
                                <?php echo $item['user2_name']; ?>
                            </a>
                        </td>
                        <td>
                            <select class="span1" name="set1_p2">
                                <option> - </option>
                                <option <?php echo $item['set1_p2'] == 0 ? ' selected ' : ''; ?>>0</option>
                                <option <?php echo $item['set1_p2'] == 1 ? ' selected ' : ''; ?>>1</option>
                                <option <?php echo $item['set1_p2'] == 2 ? ' selected ' : ''; ?>>2</option>
                                <option <?php echo $item['set1_p2'] == 3 ? ' selected ' : ''; ?>>3</option>
                                <option <?php echo $item['set1_p2'] == 4 ? ' selected ' : ''; ?>>4</option>
                                <option <?php echo $item['set1_p2'] == 5 ? ' selected ' : ''; ?>>5</option>
                                <option <?php echo $item['set1_p2'] == 6 ? ' selected ' : ''; ?>>6</option>
                                <option <?php echo $item['set1_p2'] == 7 ? ' selected ' : ''; ?>>7</option>
                            </select>
                        </td>
                        <td>
                            <select class="span1" name="set2_p2">
                                <option> - </option>
                                <option <?php echo $item['set2_p2'] == 0 ? ' selected ' : ''; ?>>0</option>
                                <option <?php echo $item['set2_p2'] == 1 ? ' selected ' : ''; ?>>1</option>
                                <option <?php echo $item['set2_p2'] == 2 ? ' selected ' : ''; ?>>2</option>
                                <option <?php echo $item['set2_p2'] == 3 ? ' selected ' : ''; ?>>3</option>
                                <option <?php echo $item['set2_p2'] == 4 ? ' selected ' : ''; ?>>4</option>
                                <option <?php echo $item['set2_p2'] == 5 ? ' selected ' : ''; ?>>5</option>
                                <option <?php echo $item['set2_p2'] == 6 ? ' selected ' : ''; ?>>6</option>
                                <option <?php echo $item['set2_p2'] == 7 ? ' selected ' : ''; ?>>7</option>
                            </select>
                        </td>
                        <td>
                            <select class="span1" name="set3_p2">
                                <option> - </option>
                                <option <?php echo $item['set3_p2'] == 0 ? ' selected ' : ''; ?>>0</option>
                                <option <?php echo $item['set3_p2'] == 1 ? ' selected ' : ''; ?>>1</option>
                                <option <?php echo $item['set3_p2'] == 2 ? ' selected ' : ''; ?>>2</option>
                                <option <?php echo $item['set3_p2'] == 3 ? ' selected ' : ''; ?>>3</option>
                                <option <?php echo $item['set3_p2'] == 4 ? ' selected ' : ''; ?>>4</option>
                                <option <?php echo $item['set3_p2'] == 5 ? ' selected ' : ''; ?>>5</option>
                                <option <?php echo $item['set3_p2'] == 6 ? ' selected ' : ''; ?>>6</option>
                                <option <?php echo $item['set3_p2'] == 7 ? ' selected ' : ''; ?>>7</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <hr />

    <?php } } ?>

        <!--<div class="pagination">
          <ul>
            <li><a href="#">Prev</a></li>
            <li class="active">
              <a href="#">1</a>
            </li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </div>-->

</div>