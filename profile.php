<?php
session_start();
include("functions/config.php");
include("functions/sitehead.php");
include("functions/topbar.php");
if(isset($_GET['user'])) {
    $username = $_GET['user'];
    $query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $_SESSION['email'] ."'");
    $u = $query->fetch_assoc();
    $query = $connect->query("SELECT * FROM `users` WHERE `username` = '". $username ."'");
    $r = $query->fetch_assoc();
    $profile = $connect->query("SELECT * FROM `users.profiles` WHERE `user_id` = '". $r['id'] ."'");
    $p = $profile->fetch_assoc();
    $follows = $connect->query("SELECT * FROM `users.follows` WHERE `follow_id` = '". $r['id'] ."'");
    $following = $connect->query("SELECT * FROM `users.follows` WHERE `user_id` = '". $u['id'] ."' AND `follow_id` = '". $r['id'] ."'");
?>
<body>
   <div id="container">

        <div id="headpic" style="background-position: center; background-size: contain; background-image: url('/assets/imgs/<?php echo $p['headpicture']; ?>');"></div>
                
       <div id="profilecontain">
            <div id="profilebgcontain">
                <div id="profpic"><img src="/assets/imgs/<?php echo $p['picture']; ?>" width="163px" height="163px"></div>    
                <?php
                    if($r['id'] != $u['id']) {
                        if($following->num_rows == 0) {
                ?>
                <div id="followbar"><a href="/follow.php?id=<?php echo $r['id']; ?>" id="followbutton">Follow</a></div>
                <?php
                        } else {
                ?>
                <div id="followbar"><a href="/unfollow.php?id=<?php echo $r['id']; ?>" id="followbutton">Following</a></div>
                <?php
                        }
                    } else {
                ?>
                <div id="followbar"><a href="/editprofile/">Edit Profile</a></div>
                <?php
                    }
                ?>
                <div id="website">http://www.dawsondesigns.org.uk</div>
                <div id="name"><?php echo $username; ?></div>
                <div id="motto"><?php echo $p['motto']; ?></div>
                <div id="location"><?php echo $r['country']; ?></div>
                <div id="status">Online - Offline</div>
                <div id="profilefooter"></div>
            </div>
                
            <div id="profilesidecontain">
                <div id="profilesidecontentcontain">
                    <div id="contentheadbg">
                        <div id="contenthead">About</div>
                    </div>
                    <div id="text">
                        <?php echo $p['bio']; ?>
                    </div>
                </div>
            </div>
           
            <div id="profilecontentcontain">
                <div id="contentheadbg">
                    <div id="contenthead">Products</div>
                </div>
                <div id="prods">
                    <?php  
                    $query = $connect->query("SELECT * FROM `products` WHERE `user_id` = '". $r['id'] ."'");
                    while($r = $query->fetch_assoc()) {
                        $picture = $connect->query("SELECT * FROM `productpictures` WHERE `product_id` = '". $r['id'] ."' LIMIT 1");
                        $pic = $picture->fetch_assoc();
                    ?>
                    <div id="product1">
                        <a href="/product/<?php echo $r['name']; ?>/"><img src="/assets/imgs/<?php echo $pic['picture']; ?>" width="150px" height="100px"></a>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
           
            <div id="profileside-sm">
                <div id="contenthead">Followers</div>
                <div id="text">
                    <?php echo $follows->num_rows; ?> 
                </div>
            </div>
           
            <div id="profileside-sm">
                <div id="contenthead">Seller Rating</div>
                <div id="text">
                    5 pissing stars
                </div>
            </div> 
           
           <div id="profileside-sm">
                <div id="contenthead">Social Profiles</div>
                <div id="text">
                    <?php
                        if($p['facebook'] != "") {
                    ?>
                    <div id="icon"><a target="_newtab" href="http://www.facebook.com/<?php echo $p['facebook']; ?>"><img src="/assets/imgs/soicalicons/facebook.png" width="32px" height="32px"></a></div>
                    <?php
                        }
                        if($p['twitter'] != "") {
                    ?>
                    <div id="icon"><a target="_newtab" href="http://www.twitter.com/<?php echo $p['twitter']; ?>"><img src="/assets/imgs/soicalicons/twitter.png" width="32px" height="32px"></a></div>
                    <?php
                        }
                        if($p['github'] != "") {
                    ?>
                    <div id="icon"><a target="_newtab" href="http://www.github.com/<?php echo $p['github']; ?>"><img src="/assets/imgs/soicalicons/github.png" width="32px" height="32px"></a></div>
                    <?php
                        }
                        if($p['linkedin'] != "") {
                    ?>
                    <div id="icon"><a target="_newtab" href="http://www.linkedin.com/<?php echo $p['linkedin']; ?>"><img src="/assets/imgs/soicalicons/linkedin.png" width="32px" height="32px"></a></div> 
                    <?php
                        }
                        if($p['youtube'] != "") {
                    ?>
                    <div id="icon"><a target="_newtab" href="http://www.youtube.com/<?php echo $p['youtube']; ?>"><img src="/assets/imgs/soicalicons/youtube.png" width="32px" height="32px"></a></div>  
                    <?php
                        }
                        if($p['website'] != "") {
                    ?>
                    <div id="icon"><a target="_newtab" href="http://<?php echo $p['website']; ?>"><img src="/assets/imgs/soicalicons/youtube.png" width="32px" height="32px"></a></div>  
                    <?php
                        }
                    ?>
                </div>
            </div>            
        </div>  
            
        <?php include("functions/footer.php"); ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $("form").submit(function (e) {
                    e.preventDefault();
                    var input = $("#searchinput").val();
                    input = input.replace(/\s+/g, '-').toLowerCase();
                    window.location.replace("/search/"+input+"/");
                });
            });
        </script>

    </div>
</body>
</html>
<?php
}
?>