<?php
session_start();
include("config.php");
include("templates/sitehead.php");
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
    <div id="container">
    <?php include("templates/header.php"); 
    if(isset($_GET['do']) == "submit") {
        echo '<div id="successlabel">Successfully edited your profile</div>';
    }
    ?>
    <div id="uploadcontainer">
        <div id="featuredproduct" style="width: 348px; height: auto;">
            <div id="fpicturehold" style="float: left; margin-left:50px; width: 100px; height: 100px;"><div id='viewprofimage'></div></div>
            <div id="ftext" style="float:right">
            <form class="uploadform" method="post" enctype="multipart/form-data" action='/profilepictureupload/'>
                Change your profile picture <input type="file" name="imagefile" />
                <input type="submit" class="uploadbut" value="Submit" name="submitbtn" id="submitbtn">
            </form>
            </div>
        </div>
        
        <div id="featuredproduct" style="width: 348px; height: auto;">
            <div id="fpicturehold" style="float: left; margin-left: 50px; width: 100px; height: 100px;"><div id='viewheadimage'></div></div>
            <div id="ftext" style="float:right">
                <form class="uploadform2" method="post" enctype="multipart/form-data" action='/headerpictureupload/'>
                    Change your header picture <input type="file" name="imagefile" />
                    <input class="uploadbut" type="submit" value="Submit" name="submitbtn" id="submitbtn2">
                </form>
            </div>
        </div>
    </div>

    <form id="editprofileform" name="editprofile" method="post" action="/editprofile/?do=submit">
        <input id="formbg" type="text" name="twitter" placeholder="Twitter" value="<?php echo $p['twitter']; ?>">
        <input id="formbg" type="text" name="facebook" placeholder="Facebook" value="<?php echo $p['facebook']; ?>">
        <input id="formbg" type="text" name="github" placeholder="Github" value="<?php echo $p['github']; ?>">
        <input id="formbg" type="text" name="youtube" placeholder="Youtube" value="<?php echo $p['youtube']; ?>">
        <input id="formbg" type="text" name="linkedin" placeholder="Linkedin" value="<?php echo $p['linkedin']; ?>">
        <input id="formbg" type="text" name="website" placeholder="Website" value="<?php echo $p['website']; ?>">
        <input id="formbg" type="text" name="motto" placeholder="Motto" value="<?php echo $p['motto']; ?>"> <br >
        <textarea id="formbgbio" cols="50" rows="10" name="bio"><?php echo $p['bio']; ?></textarea>
        <input id="formbgsubmit" type="submit" value="Edit" name="submit">
    </form>

        <div id="formbg">
        
            <p>some text will go here</p>
            
        </div>
        
    <script type="text/javascript" >
        $("#viewprofimage").html('<img src="/assets/imgs/<?php echo $p['picture'];?>" width="100px" height="100px">');
        $("#viewheadimage").html('<img src="/assets/imgs/<?php echo $p['headpicture'];?>" width="100px" height="100px">');
        $(document).ready(function() {
            $('#submitbtn').click(function() {
                $("#viewprofimage").html('');
                $("#viewprofimage").html('<img src="/assets/imgs/loading.gif" width="100px" height="100px">');
                $(".uploadform").ajaxForm({
                    target: '#viewprofimage'
                }).submit();
            });
            $('#submitbtn2').click(function() {
                $("#viewheadimage").html('');
                $("#viewheadimage").html('<img src="/assets/imgs/loading.gif" width="100px" height="100px">');
                $(".uploadform2").ajaxForm({
                    target: '#viewheadimage'
                }).submit();
            });
        });
    </script> 
    <?php include("templates/footer.php"); ?>
</body>
</html>