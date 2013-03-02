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
            } ?>
            
            <form action="<?php echo base_url(); ?>login" method="POST">
                Login<br />
                <input class="input_long" type="text" name="login" value="<?php echo isset($post['login']) ? $post['login'] : ''; ?>" /><br /><br />
                
                Password<br />
                <input class="input_long" type="password" name="password" value="" /><br /><br />
                
                <a href="<?php echo base_url(); ?>restorepass">
                    Forgot password? 
                </a>
                <br /><br />
                
                <input class="clickme" type="submit" value="Login" />
            </form>
        </td>
    </tr>
</table>