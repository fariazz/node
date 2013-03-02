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
                elseif ($done == 'done') { 
                    
                    infotw('info', "Please check your email {$post['email']} with link to set a new password"); 
                }
            ?>

            <div style="display: <?php echo (empty($errors) && $done == 'done') ? 'none' : 'block'; ?>; ">
                <form action="<?php echo base_url(); ?>restorepass/done" method="POST">
                    Your login (email address)<br />
                    <input type="text" class="input_long" name="email" value="<?php echo isset($post['email']) ? $post['email'] : ''; ?>" /><br /><br />

                    <input class="clickme" type="submit" value="Restore password" />
                </form>
            </div>
        </td>
    </tr>
</table>