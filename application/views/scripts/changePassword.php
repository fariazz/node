<div class="content-box-header">

        <h3>Change password</h3>

        <ul class="content-box-tabs">

                <li><a href="#tab1" class="default-tab">Change password</a></li> <!-- href must be unique and match the id of target div -->
                <!--<li><a href="#tab2">Forms</a></li>-->
        </ul>

        <div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

        <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

            
            <?php if (!empty($errors)) { 
                
                    errortw('Please check your input data', $errors); 
                } 
                elseif ($changed == 'changed') { 

                    infotw('info', "Your password changed"); 
                }
            ?>
            
            <!--<div class="notification attention png_bg">
                    <a href="#" class="close"><img src="<?php echo base_url(); ?>www/img/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                    <div>
                        Please enter your new password and one more time your new password to avoid mistake. 
                    </div>
            </div>-->

                <table>

                        <thead>
                                <tr>
                                   <th>New password</th>
                                   <th>New password again</th>
                                   <th width="70%"></th>
                                </tr>

                        </thead>

                        <tfoot>
                                <tr>
                                        <td colspan="3">
                                                <div class="bulk-actions align-left">
                                                    <form action="<?php echo base_url(); ?>changePassword" method="POST">
                                                        <input class="button" type="submit" href="#" value="Change password" />
                                                </div>

                                                <div class="clear"></div>
                                        </td>
                                </tr>
                        </tfoot>

                        <tbody>
                            <tr>
                                <td>
                                    <input type="password" name="password" />
                                </td>
                                <td>
                                    <input type="password" name="repassword" />
                                    </form>
                                </td>
                            </tr>
                        </tbody>

                </table>

        </div> <!-- End #tab1 -->