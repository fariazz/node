<table border="0" style="width: 800px; ">
    <tr>
        <td>
            <?php echo $menu; ?>
        </td>
    </tr>
    <tr>
        <td>
            <br />
            
            <?php if (!empty($errors)) { 
                
                    errortw('Please check your input data', $errors); 
                } 
                elseif ($changed == 'changed') { 
                    
                    infotw('info', "Password changed"); 
                }
            ?>

            <div style="display: <?php echo $changed == 'changed' ? 'none' : 'block'; ?>; ">
                <form action="<?php echo base_url(); ?>user/changepass" method="POST">

                    Type your new password<br />
                    <input class="input_long" type="password" name="password" value="" /><br /><br />

                    Retype your new password<br />
                    <input class="input_long" type="password" name="repassword" value="" /><br /><br />

                    <input type="submit" class="clickme" value="Change password" />
                </form>
            </div>
        </td>
    </tr>
</table>