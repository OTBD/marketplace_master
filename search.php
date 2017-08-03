<?php
session_start();
include("functions/config.php");
include("functions/sitehead.php");
include("functions/topbar.php");
$nopeople = false;
if(isset($_GET['search'])) {
?>

<script>
    $(document).ready(function() {
        $("form").submit(function (e) {
            e.preventDefault();
            var input = $("#searchinput").val();
            input = input.replace(/\s+/g, '-').toLowerCase();
            window.location.replace("/search/"+input+"/");
        });
    });
</script>
<div class="search-header">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
 <?php
                $search = $_GET['search'];
                if($search == "all") {
                    $search = "";
                
                ?>
                <?php
    }
?>
                <div class="header">
                    Search Results for " <?php echo $search;?> "
                </div>
                
            </div>
            
        </div>
    </div>
</div>
<div class="background">
<div class="search-results">
    <div class="row">
        <div class="container">
            <div class="col-lg-3">
                <div class="filter">
                    <div class="header">Categories</div>
                    <div class="category"><a href="#">Joomla </a><span class="count">(2910)</span></div>
                    <div class="category"><a href="#">HTML Templates </a><span class="count">(1030)</span></div>
                    <div class="category"><a href="#">WordPress Themes </a><span class="count">(3120)</span></div>
                    <div class="category"><a href="#">PSD Templates </a><span class="count">(134)</span></div>
                    <div class="category"><a href="#">AI Templates </a><span class="count">(3320)</span></div>
                    <div class="category"><a href="#">Stock Photos </a><span class="count">(2301)</span></div>
                </div>
            </div>
            <div class="sponsored-products">
            <div class="col-lg-9">
                <?php
                $query = $connect->query("SELECT * FROM `products` WHERE `tags` LIKE '%". $search ."%'");
                if($query->num_rows != 0) {
                ?>
                <?php
                while($r = $query->fetch_assoc()) {
                    $profile = $connect->query("SELECT * FROM `users` WHERE `id` = '". $r['user_id'] ."'");
                    $p = $profile->fetch_assoc();
                    $picture = $connect->query("SELECT * FROM `productpictures` WHERE `product_id` = '". $r['id'] ."' LIMIT 1");
                    $pic = $picture->fetch_assoc();
                    $profile = $connect->query("SELECT * FROM `users.profiles` WHERE `user_id` = '". $r['id'] ."'");
                            $fu = $profile->fetch_assoc();
                    
                ?>
                <div class="results">
                        <div class="col-lg-4">
                
                <div class="product">
                    <div class="product-picture">
                        <a href="/product.php?id=<?php echo $r['id']; ?>/"><img src="/assets/images/<?php echo $pic['picture']; ?>" width="232px" height="150px"></a>
                    </div>    
                    <div class="product-price">£<?php echo $r['price']?></div>    
                    <div class="product-title"><a href="/product.php?id=<?=$r['id']?>"><?php echo $r['name']; ?></a></div>    
                    <div class="product-rating">
                        <img src="assets/images/stars.png">
                    </div>
                    <div class="product-line"></div>

                    <div class="product-author-picture">
                        <img src="assets/images/<?php echo $fu['picture']; ?>" width="35px" height="35px">
                    </div>
                    <div class="product-author-name">
                   <a href="/profile.php?id=<?php echo $p['id']; ?>"><?php echo $p['username']; ?></a>
                    </div>
                    <div class="product-author-category">
                        WordPress Themes
                    </div>
                </div>
            </div>
                     <?php
                }
                    ?>
                    </div>
                <?php
                }
    ?>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</div>
    
    <div class="user-results">
        <div class="row">
            <div class="container">
                                <?php
                $search = $_GET['search'];
                if($search == "all") {
                    $search = "";
                }
                $search = $_GET['search'];
                if ($search =="bad ass mofo"){
                    $search = "Owen Dawson";
                }

                $query = $connect->query("SELECT * FROM `users` WHERE `username` LIKE '%". $search ."%'");    
                if($query->num_rows != 0) {
            ?>
             <?php
                } else {
                    $nopeople = true;
                }
                if($nopeople == true) {
            ?>
                <?php
                }
                        
                    ?>
               <?php
                        while($r = $query->fetch_assoc()) {
                            $profile = $connect->query("SELECT * FROM `users.profiles` WHERE `user_id` = '". $r['id'] ."'");
                            $p = $profile->fetch_assoc();
                            
                    ?>

                   
                        <div class="user">
                            <div class="profile-pic">
                                <img src="assets/images/<?php echo $p['picture']; ?>" width="50px" height="50px">
                            </div>
                            <div class="profile-name"><a href="/profile.php?id=<?php echo $r['id']; ?>"><?php echo $r['username'];?></a></div>
                            
                        </div>
                        <?php
                        }
                    ?>
                                    
        </div>
            
        </div>
        
    </div>


</div>
</div>
</div>

<?php
    }
?>
<?php include 'functions/footer.php'; ?>
