<div class="content-box-header">

    <h3>Client accounts</h3>

    <ul class="content-box-tabs">

        <li><a href="#tab1" class="default-tab">Client accounts</a></li> <!-- href must be unique and match the id of target div -->
        <!--<li><a href="#tab2">Forms</a></li>-->
    </ul>

    <div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

    <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

        <?php //printit($user_list); ?>

        <!--<div class="notification attention png_bg">
                <a href="#" class="close"><img src="<?php echo base_url(); ?>www/img/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                <div>
                    Please enter your new password and one more time your new password to avoid mistake. 
                </div>
        </div>-->

        <table>
            <thead>
                <tr>
                   <th>Customer reference number</th>
                   <th>Username</th>
                   <th>First name</th>
                   <th>Last name</th>
                   <th>Company</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th>Actions</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <td colspan="8">
                            <div class="bulk-actions align-left">
                                <a class="button" href="<?php echo base_url(); ?>newClient">New</a>
                            </div>

                            <div class="clear"></div>
                    </td>
                </tr>
            </tfoot>

            <tbody>
                
                <?php foreach ($user_list as $item) { ?>
                    <tr>
                        <td><?php echo $item['customer_ref_number']; ?></td>
                        <td><?php echo $item['username']; ?></td>
                        <td><?php echo $item['first_name']; ?></td>
                        <td><?php echo $item['last_name']; ?></td>
                        <td><?php //echo $item['company']; ?></td>
                        <td><?php echo $item['email']; ?></td>
                        <td><?php echo $item['phone']; ?></td>
                        <td>
                            <!-- Icons -->
                            <a href="<?php echo base_url()."editClient/{$item['id']}"; ?>" title="Edit"><img src="<?php echo base_url(); ?>www/img/icons/pencil.png" alt="Edit" /></a>
                            <a href="<?php echo base_url()."deleteClient/{$item['id']}"; ?>" title="Delete"><img src="<?php echo base_url(); ?>www/img/icons/cross.png" alt="Delete" onclick="return confirm('Are you sure to delete?'); " /></a> 
                             <!--<a href="#" title="Edit Meta"><img src="<?php echo base_url(); ?>www/img/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>-->
                        </td>
                    </tr>
                <?php } ?>
                
            </tbody>
        </table>
    </div> <!-- End #tab1 -->
</div> <!-- End .content-box-content -->