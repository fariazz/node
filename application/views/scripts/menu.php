<div class="span3 sidebar-nav">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header">Profile</li>
            <li><a href="<?php echo base_url(); ?>"><i class=" icon-home"></i>Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>profile/<?php echo $user['user_id']; ?>"><i class=" icon-user"></i>User Profile</a></li>
            <li><a href="<?php echo base_url(); ?>changePassword"><i class="icon-pencil"></i>Change password</a></li>
            <li><a href="<?php echo base_url(); ?>notificationList"><i class="icon-pencil"></i>Notifications</a></li>
            
            <li class="nav-header">Matches & Results</li>
            <li><a href="<?php echo base_url(); ?>playerList"><i class="icon-th-list"></i>Players</a></li>
            <li><a href="ranking.html"><i class="icon-th-list"></i>Ranking</a></li>
            <li><a href="<?php echo base_url(); ?>completedMatches"><i class="icon-play-circle"></i>Completed Matches</a></li>
            <li><a href="<?php echo base_url(); ?>scheduledMatches"><i class="icon-calendar"></i>Scheduled Matches</a></li>
            <li><a href="<?php echo base_url(); ?>scheduledTrainings"><i class="icon-calendar"></i>Scheduled Trainings</a></li>
            <li><a href="<?php echo base_url(); ?>addResultList"><i class="icon-plus-sign"></i>Add Result</a></li>
            <li><a href="match_pool.html"><i class=" icon-star"></i>Matchpool</a></li>
            <li><a href="training_pool.html"><i class="icon-star-empty"></i>Trainingpool</a></li>
            
            <li class="nav-header">Clubs</li>
            <li><a href="<?php echo base_url(); ?>clubList"><i class="icon-map-marker"></i>Show clubs</a></li>
            <li><a href="<?php echo base_url(); ?>clubAdd"><i class="icon-plus-sign"></i>Add a club</a></li>
            <li><a href="<?php echo base_url(); ?>clubListMy"><i class="icon-plus-sign"></i>My clubs</a></li>
            
            <br />
            <li><a href="<?php echo base_url(); ?>logout"><i class="icon-map-marker"></i>Logout</a></li>

            <!--<div id="fb-root"></div>
            <button id="fb-auth">Login</button>-->
            
            <script type="text/javascript">
                
               /*var button = document.getElementById('fb-auth'); 
                
                alert(3); 
                window.fbAsyncInit = function() {

                    alert(4); 
                    FB.init({ 

                        appId: <?php echo FACEBOOK_APP_ID; ?>, 
                        status: true, 
                        cookie: true,
                        xfbml: true,
                        oauth: true
                    });
                
                    button.onclick = function() {

                        alert(1); 
                        FB.logout(function(response) {

                            console.log(response); 
                            //logout(response);
                        }); 
                    }; 
                    
                    alert(2); 
                    (function() {

                        var e = document.createElement('script'); e.async = true;
                        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                        document.getElementById('fb-root').appendChild(e);
                    }()); 
                }*/
                
            </script>
        </ul>
    </div>
</div>