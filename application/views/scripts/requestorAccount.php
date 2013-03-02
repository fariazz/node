<div class="content-box-header">

    <h3>Manage requestors for client <?php echo $client_id > 0 ? "{$client_list[$client_id]['first_name']} {$client_list[$client_id]['last_name']}" : "(please select client)"; ?></h3>

    <ul class="content-box-tabs">

        <li><a href="#tab1" class="default-tab">Requestor accounts</a></li> <!-- href must be unique and match the id of target div -->
        <!--<li><a href="#tab2">Forms</a></li>-->
    </ul>

    <div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

    <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

        <?php //printit($requestor_list); ?>

        <!--<div class="notification attention png_bg">
                <a href="#" class="close"><img src="<?php echo base_url(); ?>www/img/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                <div>
                    Please enter your new password and one more time your new password to avoid mistake. 
                </div>
        </div>-->

        <form action="<?php echo base_url()."requestorAccount"; ?>" method="POST">
            <?php //printit($client_list); ?>
            Client 
            <?php if (!empty($client_list)) { ?> 
                <select name="client_id">
                    <option value=""> --- select --- </option>
                    <?php foreach ($client_list as $item) { 
                        $selected = $item['id'] == $client_id ? ' selected ' : ''; 
                        ?>
                        <option <?php echo $selected; ?> value="<?php echo $item['id']; ?>"><?php echo "{$item['first_name']} {$item['last_name']}"; ?></option>
                    <?php } ?>
                </select>
            <?php } ?>

            <input class="button" type="submit" value="Show requestor list" />
        </form>
        <br /><br />
                            
        <table>
            <thead>
                <tr>
                   <th>Username</th>
                   <th>First name</th>
                   <th>Last name</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th>Actions</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="bulk-actions align-left">
                                <a class="button" href="<?php echo base_url(); ?>newRequestor">New requestor</a>
                            </div>

                            <div class="clear"></div>
                    </td>
                </tr>
            </tfoot>

            <tbody>
                
                <?php foreach ($requestor_list as $item) { ?>
                    <tr>
                        <td><?php echo $item['username']; ?></td>
                        <td><?php echo $item['first_name']; ?></td>
                        <td><?php echo $item['last_name']; ?></td>
                        <td><?php echo $item['email']; ?></td>
                        <td><?php echo $item['phone']; ?></td>
                        <td>
                            <!-- Icons -->
                            <a href="<?php echo base_url()."editRequestor/{$item['id']}"; ?>" title="Edit"><img src="<?php echo base_url(); ?>www/img/icons/pencil.png" alt="Edit" /></a>
                            <a href="<?php echo base_url()."deleteRequestor/{$item['id']}"; ?>" title="Delete"><img src="<?php echo base_url(); ?>www/img/icons/cross.png" alt="Delete" onclick="return confirm('Are you sure to delete?'); " /></a> 
                             <!--<a href="#" title="Edit Meta"><img src="<?php echo base_url(); ?>www/img/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>-->
                        </td>
                    </tr>
                <?php } ?>
                
            </tbody>
        </table>
    </div> <!-- End #tab1 -->
</div> <!-- End .content-box-content -->