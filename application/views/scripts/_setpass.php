<table border="0" style="width: 800px; ">
    <tr>
        <td>
            <?php echo $menu; ?>
        </td>
    </tr>
    <tr>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            <?php if (!empty($errors)) { 
                
                    errortw('Please check your input data', $errors); 
                } 
                elseif ($hash == 'done') { 
                    
                    infotw('info', "New password saved. You can login now"); 
                }
            ?>

            <div style="display: <?php echo (empty($errors) && $hash == 'done') ? 'none' : 'block'; ?>; ">
                <form action="<?php echo base_url(); ?>setpass/<?php echo $hash; ?>/<?php echo $email_hash; ?>" method="POST">
                    Type your new password<br />
                    <input class="input_long" type="password" name="password" value="" /><br /><br />

                    Retype your new password<br />
                    <input class="input_long" type="password" name="repassword" value="" /><br /><br />

                    <input type="hidden" name="newpass_hash" value="<?php echo $hash; ?>" />
                    <input type="submit" class="clickme" value="Save new password" />
                </form>
            </div>
        </td>
    </tr>
</table>