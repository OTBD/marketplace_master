<?php
session_start();
include("functions/config.php");
include("functions/sitehead.php");
include("functions/topbar.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $connect->query("SELECT * FROM `products` WHERE `id` = '". $id . "'");
    $result = $query->fetch_assoc();
    $pictures = $connect->query("SELECT * FROM `productpictures` WHERE `product_id` = '". $result['id'] ."'");
    $picture = $connect->query("SELECT * FROM `productpictures` WHERE `product_id` = '". $result['id'] ."' LIMIT 1");
    $pic = $picture->fetch_assoc();
    $user = $connect->query("SELECT * FROM `users` WHERE `id` = '". $result['user_id'] ."'");
    $u = $user->fetch_assoc();
    $profile = $connect->query("SELECT * FROM `users.profiles` WHERE `user_id` = '". $u['id'] ."'");
    $p = $profile->fetch_assoc();
    $query = $connect->query("SELECT * FROM `users.profiles` WHERE `user_id` = '". $p['id'] ."'");
    $fu = $query->fetch_assoc();
    $viewc = $result['viewcount'] + 1;
    $alterview = $connect->query("UPDATE `products` SET `viewcount` = '". $viewc ."' WHERE `id` = '". $result['id'] ."'");
?>
        </div>
    
<div class="search-header">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="header">
                    <div class="product-name" style="padding-bottom:20px;"><?=$result['name']?>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="main">
        <div class="container">
            <div class="col-xs-12 col-md-8">
                <div class="image-container">
                    <div class="image-placeholder-large">
                    <img src="/assets/images/<?php echo $pic['picture']; ?>" width="100%" height="100%">
                    </div>
                    <div class="image-placeholder-small"></div>
                    <div class="image-placeholder-small"></div>
                    <div class="image-placeholder-small"></div>
                    <div class="image-placeholder-small"></div>
                    <div class="image-placeholder-small"></div>
                    <div class="image-placeholder-small"></div>
                </div>
                <div class="large-holder">
                    <div class="live-demo">LIVE DEMO</div>
                    <div class="buy-now-large">
                         <p><a href="addtocart.php?id=<?php echo $result['id']; ?>"><div id="addtocart">Buy Now</div></a></p>
                    </div>
                </div>
                <div class="product-description">
                <div class="product-header">Product Description</div>
                <div class="product-top-description">
                  <?=$result['description']?>
                </div>
                </div>
                
                <div class="key-features-container">
                <div class="product-header">Key Features:</div>
                    <div class="key-left">
                    <ul style="margin-top:25px;">
                      <li>Dark &amp; Light Version</li>
                      <li>Boxed &amp; Fullwidth Version</li>
                      <li>HTML5 &amp; CSS3 Technology</li>
                      <li>20 + Onepage Design</li>
                      <li>20 + Multipage Design</li>
                      <li>Different Header Layout Styles</li>
                      <li>Different Footer Layout Styles</li>
                      <li>Mega Menu Support</li>
                      <li>Revolution Slider ($15 Value)</li>
                      <li>Bootstrap 3.1</li>
                      <li>120+ Valid HTML5 Page Templates</li>
                      <li>5 + Blog Styles</li>
                      <li>20 + Portfolio Styles</li>
                      <li>Custom Member Pages</li>
                      <li>Custom Contact Pages</li>
                    </ul>    
                    </div>
                    <div class="key-right">
                   <ul style="margin-top:25px;">
                      <li>Dark &amp; Light Version</li>
                      <li>Boxed &amp; Fullwidth Version</li>
                      <li>HTML5 &amp; CSS3 Technology</li>
                      <li>20 + Onepage Design</li>
                      <li>20 + Multipage Design</li>
                      <li>Different Header Layout Styles</li>
                      <li>Different Footer Layout Styles</li>
                      <li>Mega Menu Support</li>
                      <li>Revolution Slider ($15 Value)</li>
                      <li>Bootstrap 3.1</li>
                      <li>120+ Valid HTML5 Page Templates</li>
                      <li>5 + Blog Styles</li>
                      <li>20 + Portfolio Styles</li>
                      <li>Custom Member Pages</li>
                      <li>Custom Contact Pages</li>
                    </ul>    
                    </div>
                     <div class="product-share">
                Share: <i class="fa fa-facebook-official" style="color:#000;"></i>
                          <i class="fa fa-twitter-square" style="color:#000;"></i>
                          <i class="fa fa-instagram" style="color:#000;"></i>
                          <i class="fa fa-dribbble" style="color:#000;"></i>
                          <i class="fa fa-linkedin" style="color:#000;"></i>
                          <i class="fa fa-pinterest" style="color:#000;"></i>
                </div>
                    <div class="product-full-buy">
                    
                    </div>
                </div>
               
                
            </div>
            <div class="col-xs-6 col-md-4">
                <div class="right-bar">
                <div class="licence-container">
                    <div class="licence-header">Type of licence</div>
                    <div class="licence-description">You can use this licence for personal use or commercial projects. You can't resell this product partially or in any form. If you have any questions contact the author.</div>
                </div>
                <div class="buttons-container">
                    <div class="add-to-cart-full">Add to cart</div>
                    <div class="buy-now-full">
                     <p><a href="addtocart.php?id=<?php echo $result['id']; ?>"><div id="addtocart">Buy Now</div></a></p>
            
                    </div>
                    
                </div>
                <div class="author-container">

                    <div class="author-header">About Author</div>
                <img src="assets/images/<?php echo $fu['picture']; ?>" style="border-radius:100px; width:75px; height:75px; margin-left: 120px; margin-top:10px;">
                    <div class="author-name"><?php echo $u['name']?></div>
                    <div class="author-description">We are a small studio that works in nottingham</div>
                    <div class="author-since">Registered Since: August 2015</div>
                    <div class="author-profile"><a href="/profile.php?id=<?=$result['user_id']?>">View Profile</a></div>
                    <div class="author-send">Send Message</div>
                </div>
                <div class="share-container">
                    <div class="share-header">Share This</div>
                    <div class="icons">
                          <i class="fa fa-facebook-official" style="color:#000;"></i>
                          <i class="fa fa-twitter-square" style="color:#000;"></i>
                          <i class="fa fa-instagram" style="color:#000;"></i>
                          <i class="fa fa-dribbble" style="color:#000;"></i>
                          <i class="fa fa-linkedin" style="color:#000;"></i>
                          <i class="fa fa-pinterest" style="color:#000;"></i>
                    </div>
                    <div class="wishlist">
                        <i class="fa fa-heart-o">  Add to wishlist</i><span class="blue">264</span>
                    </div>
                     <div class="reccommend">
                        <i class="fa fa-thumbs-o-up">  99% Reccommended</i>
                    </div>
                </div>
                
                <div class="product-container">
                    <div class="share-header">Product Info</div>
                    <div class="product-left">
                    <ul style="list-style-type:none;">
                      <li>Date</li>
                      <li>Downloads</li>
                      <li>Ratings</li>
                      <li>Views</li>
                      <li>Format</li>
                    </ul>    
                    </div>
                    <div class="product-right">
                    <ul style="list-style-type:none;">
                      <li>- <?php echo $result['date'];?></li>
                      <li>- 76</li>
                      <li>- 8.9/10</li>
                      <li>- <?php echo $result['viewcount'];?></li>
                      <li>- WordPress</li>
                    </ul>    
                    </div>
                    <div class="product-tags">
                    <span class="bold">Tags:</span><?=$result['tags']?>
                    </div>
                </div>
                <div class="technical-info">
                    <div class="share-header">Technical Info</div>
                    <ul style="margin-top: 25px;">
                      <li>Chrome, Safari, Firefox, IE 9+, IOS &amp; Android</li>
                      <li>Woo-commerce integrated</li>
                      <li>WordPress 4.0+</li>
                      <li>Responsive Layout</li>
                      <li>4+ Columns</li>
                      <li>Bootstrap 3.0</li>
                      <li>High Resolution</li>
                    </ul>    
                </div>
            </div>
            </div>
        </div>
        
    </div>
        <?php include("functions/footer.php"); ?>
<?php
    if(isset($_SESSION['email'])) {
        $query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $_SESSION['email'] ."'");
        $a = $query->fetch_assoc();
        $getlike = $connect->query("SELECT * FROM `productlikes` WHERE `user_id` = '". $a['id'] ."' AND `product_id` = '". $result['id'] ."'");
        if($getlike->num_rows != 0) {
            $like = $getlike->fetch_assoc();
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            <?php
            if($like['value'] == 1) {
            ?>
            $("#like").attr("disabled", true);
            <?php
            } else if($like['value'] == -1) {
            ?>
            $("#dislike").attr("disabled", true);
            <?php
            }
            ?>
        });
    </script>
    <?php
        }
    }
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("a").click(function(e) {            
                var s = String(e.currentTarget);
                if(s.indexOf("asset") != -1) {
                    e.preventDefault();
                    $("#mainpicture").html('<img src="'+s+'" width="100%" height="100%">');
                }
            });
            $("#like").click(function (e) {
                e.preventDefault();
                $("#likec").load("/like.php?id=<?php echo $r['id']; ?>");
                $("#like").attr("disabled", true);
                $("#dislike").attr("disabled", false);
            });
            $("#dislike").click(function (e) {
                e.preventDefault();
                $("#likec").load("/dislike.php?id=<?php echo $r['id']; ?>");
                $("#dislike").attr("disabled", true);
                $("#like").attr("disabled", false);
            });
        });
    </script>
</body>
</html>
<?php
}
?>