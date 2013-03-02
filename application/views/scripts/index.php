<div class="span9 contentBG">
    <h2><?php echo $user['name']; ?> profile</h2>
    
    <table width="100%" border="0">
        <tr>
           <td style="width: 280px; ">
                <a target="_blank" href='<?php echo base_url()."www/img/profile/{$user['id']}.png"; ?>'>
                    
                    <?php 
                        $destination = PROFILE_IMAGE.DIRECTORY_SEPARATOR."{$user['id']}.png"; 
                        $picName = file_exists($destination) ? "{$user['id']}.png" : 'profile_image.png'; 
                    ?>
                    <img src='<?php echo base_url()."www/img/profile/$picName"; ?>' width="260" />
                </a>
            </td> 
            <td> 
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Country</td>
                            <td><?php echo $user['country_id'] > 0 ? $country_list[$user['country_id']]['name'] : 'not yet set'; ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?php echo !empty($user['city']) ? $user['city'] : 'not yet set'; ?></td>
                        </tr>
                        <tr>
                            <td>OT Ranking</td>
                            <td><?php echo !empty($user['ranking']) ? $user['ranking'] : 'no match played'; ?></td>
                        </tr>
                        <tr>
                            <td>Player strength</td>
                            <td><?php echo !empty($user['strength']) ? $user['strength'] : 'not yet set'; ?></td>
                        </tr>
                        <tr>
                            <td>Joined OT</td>
                            <td><?php echo $user['date_created']; ?></td>
                        </tr>
                    </tbody>
                </table>
                
                    <!--<fb:comments></fb:comments>
                    
                    <div id="fb-root"></div>
                    <script>
                        
                        window.fbAsyncInit = function() {
                         FB.init({
                          appId: "108885905824217",
                          xfbml: true,
                          cookie: true,
                          status: true
                         });
                        };
                        (function() {
                         var e = document.createElement('script'); e.async = true;
                         e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                         document.getElementById('fb-root').appendChild(e);
                        }());
                        
                    </script>-->
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                Notifications area
            </td>
        </tr>
    </table>
</div>