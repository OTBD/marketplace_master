<?php
session_start();
include("functions/config.php");
include("functions/sitehead.php");
include("functions/topbar.php");
$query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $_SESSION['email'] ."'");
$r = $query->fetch_assoc();
$profile = $connect->query("SELECT * FROM `users.profiles` WHERE `user_id` = '". $r['id'] ."'");
$p = $profile->fetch_assoc();

if(isset($_GET['do']) == "submit") {
    $twitter = clean($connect, $_POST['twitter']);
    $facebook = clean($connect, $_POST['facebook']);
    $linkedin = clean($connect, $_POST['linkedin']);
    $github = clean($connect, $_POST['github']);
    $youtube = clean($connect, $_POST['youtube']);
    $motto = clean($connect, $_POST['motto']);
    $bio = clean($connect, $_POST['bio']);
    $website = clean($connect, $_POST['website']);
    
    $connect->query("UPDATE `users.profiles` SET `website` = '". $website ."',`twitter` = '". $twitter ."', `facebook` = '". $facebook ."',`github` = '". $github ."',`linkedin` = '". $linkedin ."',`youtube` = '". $youtube ."', `motto` = '". $motto ."', `bio` = '". $bio ."' WHERE `user_id` = '". $r['id'] ."'");

}

$query = $connect->query("SELECT * FROM `users.profiles` WHERE `id` = '". $r['id'] ."'");
$p = $query->fetch_assoc();
?>
<body>
<div class="search-header">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="header">
                   Edit Profile
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="container">
        
        <div class="col-xs-6 col-md-4">
        <div class="edit-profile">
                 
                    
                    
            <div id="fpicturehold"><div id='viewprofimage'></div></div>
            <div id="ftext" style="margin-left:100px;margin-top:-80px;">
            <form class="uploadform" method="post" enctype="multipart/form-data" action='profilepictureupload.php'>
                Change your profile picture <input type="file" name="imagefile" />
                <input type="submit" class="uploadbut" value="Submit" name="submitbtn" id="submitbtn">
            </form>
            </div>
                
                </div>
            
                <div class="edit-profile-social-bg">
                    <div class="profile-title">
                        Edit Social Media
                    </div>
                     
                </div>
            
        </div>
        
        <div class="col-xs-6 col-md-8">
            <div class="profile-header"
                 
                 style="background-position: center; background-size: contain; background-image: url('/assets/images/<?php echo $p['headpicture']; ?>');"></div>
            
                <div id="ftext" style="float:right; margin-top: -115px;background-color: #fff;padding-top:20px;padding-bottom:20px;">
                <form class="uploadform2" style="padding-left:10px;" method="post" enctype="multipart/form-data" action='/headerpictureupload/'>
                    Change your header picture <input type="file" name="imagefile" />
                    <input class="uploadbut" type="submit" value="Submit" name="submitbtn" id="submitbtn2">
                </form>
            </div>
            </div>
        
        <div class="col-xs-6 col-md-8">
            <div class="profile-about">
                <div class="profile-title">About</div>
                <div class="profile-content">
                 
                    
        <form id="editprofileform" name="editprofile" method="post" action="/edit-profile.php/?do=submit">
                    Twitter: <input id="formbg" class="edit-bg" type="text" name="twitter" placeholder="Twitter" value="<?php echo $p['twitter']; ?>">
                    Facebook: <input id="formbg" class="edit-bg" type="text" name="facebook" placeholder="Facebook" value="<?php echo $p['facebook']; ?>">
                    Github:        <input id="formbg" class="edit-bg" type="text" name="github" placeholder="Github" value="<?php echo $p['github']; ?>">
                    Youtube:        <input id="formbg" class="edit-bg" type="text" name="youtube" placeholder="Youtube" value="<?php echo $p['youtube']; ?>">                   
                    Linkedin:        <input id="formbg" class="edit-bg" type="text" name="linkedin" placeholder="Linkedin" value="<?php echo $p['linkedin']; ?>">
                            Website: <input id="formbg" class="edit-bg" type="text" name="website" placeholder="Website" value="<?php echo $p['website']; ?>">
                          Title:  <input id="formbg" class="edit-bg" type="text" name="motto" placeholder="Motto" value="<?php echo $p['motto']; ?>"> <br >

        <textarea id="formbgbio" type="text" class="textarea-bg" cols="50" rows="10" name="bio"><?php echo $p['bio']; ?></textarea>
        <input id="formbgsubmit" type="submit" value="Edit" name="submit">
    </form>
                </div>
            </div>
        </div>
        
        
          </div>

    </div>
    </div>
     <script type="text/javascript" >
        $("#viewprofimage").html('<img src="/assets/images/<?php echo $p['picture'];?>" width="100px" height="100px">');
        $("#viewheadimage").html('<img src="/assets/images/<?php echo $p['headpicture'];?>" width="100px" height="100px">');
        $(document).ready(function() {
            $('#submitbtn').click(function() {
                $("#viewprofimage").html('');
                $("#viewprofimage").html('<img src="/assets/images/loading.gif" width="100px" height="100px">');
                $(".uploadform").ajaxForm({
                    target: '#viewprofimage'
                }).submit();
            });
            $('#submitbtn2').click(function() {
                $("#viewheadimage").html('');
                $("#viewheadimage").html('<img src="/assets/images/loading.gif" width="100px" height="100px">');
                $(".uploadform2").ajaxForm({
                    target: '#viewheadimage'
                }).submit();
            });
        });
    </script> 
    <?php include("functions/footer.php"); ?>
    </div>
</body>
</html>
<?php

?>