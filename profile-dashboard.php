<?php
session_start();
include("functions/config.php");
include("functions/sitehead.php");
include("functions/topbar.php");
?>
<?php
$query = $connect->query("SELECT * FROM `users`");
$query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $_SESSION['email'] ."'");
$u = $query->fetch_assoc();
$profile = $connect->query("SELECT * FROM `users.profiles` WHERE `user_id` = '". $u['id'] ."'");
$p = $profile->fetch_assoc();
$query = $connect->query("SELECT * FROM `users.profiles` WHERE `user_id` = '". $p['id'] ."'");
$fu = $query->fetch_assoc();
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
    $country = clean($connect, $_POST['country']);
    $motto = clean($connect, $_POST['motto']);
    $bio = clean($connect, $_POST['bio']);
    $website = clean($connect, $_POST['website']);
    
    $connect->query("UPDATE `users.profiles` SET `website` = '". $website ."',`twitter` = '". $twitter ."', `facebook` = '". $facebook ."',`github` = '". $github ."',`linkedin` = '". $linkedin ."',`youtube` = '". $youtube ."', `country` = '". $country ."' , `motto` = '". $motto ."', `bio` = '". $bio ."' WHERE `user_id` = '". $r['id'] ."'");
}

$query = $connect->query("SELECT * FROM `users.profiles` WHERE `id` = '". $r['id'] ."'");
$p = $query->fetch_assoc();
?>
<body>
 <div class="hero-short">
        <div class="container">
            <div class="profile-name">
                <h4>Hello <?php echo $u ['username']; ?> this is your private dashboard.</h4>
        
            </div>
            
        </div>
    </div>
    <div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="assets/imgs/<?php echo $fu['picture']; ?>" class="image-responsive" style="border-radius:100px; width:100px; height:100px; margin-left: 65px; margin-top:10px;">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $u['username'];?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo $p['motto'];?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<div class="navbar grid_12">
                        <ul class="nav">
						<li class="1" id="profile" data-target=".profile">
							<a href="#">
							Profile </a>
						</li>
						<li class="1" id="product" data-target=".products">
							<a href="#">
							Products </a>
						</li>
                        <li class="1" id="purchased" data-target=".purchased">
							<a href="#">
							Purchased </a>
						</li>
						<li class="1" id="upload" data-target=".upload">
							<a href="#">
							Upload Product </a>
						</li>
						<li class="1" id="earnings" data-target=".earnings">
							<a href="#">
							Earnings </a>
						</li>
                        <li class="1" id="statement" data-target=".statement">
							<a href="#">
							Statement </a>
						</li>
                        <li class="1" id="logout" data-target=".statement">
							<a href="#">
							Logout </a>
						</li>
					</ul>
                    </div>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
                   <div class="content-container">
                <div class="profile content">
                    <div id="uploadcontainer">
        <div id="featuredproduct">
            <div id="fpicturehold"><div id='viewprofimage'></div></div>
            <div id="ftext">
            <form class="uploadform" method="post" enctype="multipart/form-data" action='profilepictureupload.php'>
                Change your profile picture <input type="file" name="imagefile" />
                <input type="submit" class="uploadbut" value="Submit" name="submitbtn" id="submitbtn">
            </form>
            </div>
        </div>
        
        <div id="featuredproduct" style="margin-top: 50px;">
            <div id="fpicturehold"><div id='viewheadimage'></div></div>
            <div id="ftext">
                <form class="uploadform2" method="post" enctype="multipart/form-data" action='headerpictureupload.php'>
                    Change your header picture <input type="file" name="imagefile" />
                    <input class="uploadbut" type="submit" value="Submit" name="submitbtn" id="submitbtn2">
                </form>
            </div>
        </div>
    </div>
                    <?php
    if(isset($_GET['do']) == "submit") {
        echo '<div id="successlabel">Successfully edited your profile</div>';
    }?>
                <div id="infocontainer">
                    
                        <form id="editprofileform" name="editprofile" method="post" action="editprofile.php/?do=submit">
        <input id="formbg" type="text" name="twitter" placeholder="Twitter" value="<?php echo $p['twitter']; ?>">
        <input id="formbg" type="text" name="facebook" placeholder="Facebook" value="<?php echo $p['facebook']; ?>">
        <input id="formbg" type="text" name="github" placeholder="Github" value="<?php echo $p['github']; ?>">
        <input id="formbg" type="text" name="youtube" placeholder="Youtube" value="<?php echo $p['youtube']; ?>">
        <input id="formbg" type="text" name="linkedin" placeholder="Linkedin" value="<?php echo $p['linkedin']; ?>">
        <input id="formbg" type="text" name="website" placeholder="Website" value="<?php echo $p['website']; ?>">
        <input id="formbg" type="text" name="motto" placeholder="Motto" value="<?php echo $p['motto']; ?>"> <br >
        <textarea id="formbgbio" type="text" class="textarea-bg" cols="50" rows="10" name="bio"><?php echo $p['bio']; ?></textarea>
        <input id="formbgsubmit" type="submit" value="Edit" name="submit">
    </form>
                </div>
                    
                </div>
                <div class="products content">
                    Products content
                </div> 
                <div class="upload content">
                    <form>
                        <input type="text" placeholder="Product Name">
                        <textarea cols="20" rows="10"></textarea>
                    </form>
                </div>
                <div class="purchased content">
                    purchased content
                </div>
                <div class="earnings content">
                    Earnings content
                </div>
                <div class="statement content">
                    Statement content
                </div>
            </div>
            </div>
        </div>
	</div>
</div>
    

<script>
$(document).ready(function () {
    var $main = $(".content-container");
    var $section = $(".content").hide();

    $(".navbar li.1").click(function (e) {
        e.preventDefault();
        $section.hide();
        var target = $(this).data('target');
        if(target){
            $section.filter(target).show();
        }
    });

});    
</script>
<br>
<br>
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
</body>