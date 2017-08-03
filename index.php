<?php
session_start();
include("functions/config.php");
include("functions/sitehead.php");
include("functions/topbar.php");
?>

<div class="hero">
    <div class="row">
        <div class="container">
            <div class="col-lg-2">
                <div class="menu-left left">
                    <nav>
                        <ul>
                            <ul>
                            <li><a href="/search.php?search=Wordpress+Theme">WordPress Themes</a> <span class="count">(1530)</span></li>
                            <li><a href="/search.php?search=HTML+Templates">HTML Templates</a> <span class="count">(2330)</span></li>
                            <li><a href="/search.php?search=Joomla+Templates">Joomla Templates</a> <span class="count">(130)</span></li>
                            <li><a href="/search.php?search=Wix+Templates">Wix Templates</a> <span class="count">(32)</span></li>
                            <li><a href="/search.php?search=PSD">PSD Templates</a> <span class="count">(340)</span></li>
                            <li><a href="/search.php?search=Ai+Templates">Ai Templates</a> <span class="count">(140)</span></li>
                            <li><a href="/search.php?search=Video+Templates">Video Templates</a> <span class="count">(540)</span></li>
                            <li><a href="/search.php?search=Photo+Templates">Photo Templates</a> <span class="count">(540)</span></li>
                            </ul>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="hero-content">
                    <div class="search-background">
                        <div class="search-title">Can't find what you're looking for?</div>
                        <form action="/search.php">
                            <input type="text" name="search" placeholder="Search keywords..">
                        </form>
                        <div class="user-count">
                        <?php $query = $connect->query("SELECT * FROM `users`"); ?>
                            
                            Search 1372 Products from over <?php echo $query->num_rows;?> independent creators
                            
                        </div>
                    </div>
                    <div class="banner">
                        <i>"Use 25OFF at checkout when placing your order to recieve 25% OFF"</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="home-banner">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="deal">
                    <span class="large">Save</span> over <span class="blue large">£129</span> with this months bundle.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="free-products">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                 <div class="header-text">
                    Free Downloads!
                    <div class="sub">Because who doesn't like free downloads right?!</div>
                </div>
            </div>
             
            <div class="col-lg-4">
                <?php
                    $queryfave = $connect->query("SELECT * FROM `free.products`");
                    while($r = $queryfave->fetch_assoc()) {
                        $get = $connect->query("SELECT * FROM `products` WHERE `id` = '". $r['product_id'] ."'");
                        $p = $get->fetch_assoc();
                        $getu = $connect->query("SELECT * FROM `users` WHERE `id` = '". $p['user_id'] ."'");
                        $u = $getu->fetch_assoc();
                        $picture = $connect->query("SELECT * FROM `productpictures` WHERE `product_id` = '". $r['product_id'] ."' LIMIT 1");
                        $pic = $picture->fetch_assoc();
                ?>
                <div class="free">
                    <div class="free-picture"><a href="/product.php?id=<?php echo $p['id']; ?>/"><img src="/assets/images/<?php echo $pic['picture']; ?>" width="75px" height="75px"></a></div>
                    <div class="free-title"><a href="/product.php?id=<?=$p['id']?>"><?php echo $p['name']; ?></a></div>
                    <div class="free-description">This is where the product description will go from the database, two lines should be enough.</div>
                    <div class="free-price">£<?php echo$p['price']?></div>
                    <div class="free-download">Download FREE</div>
                    <div class="free-author-picture"></div>
                    <div class="free-author-name">by <span class="blue"><a href="/profile/<?php echo $u['username']; ?>/"><?php echo $u['username']; ?></a></span></div>
                </div>
               
            </div>
             <?php
                }
                ?>
        </div>
    </div>
</div>
<div class="sponsored-products">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                                <div class="header-text">
                    Hot Products
                    <div class="sub">They wont be here forever so grab them whilst they're hot!</div>
                </div>
                <?php
                    $queryfave = $connect->query("SELECT * FROM `stafffave`");
                    while($r = $queryfave->fetch_assoc()) {
                        $get = $connect->query("SELECT * FROM `products` WHERE `id` = '". $r['product_id'] ."'");
                        $p = $get->fetch_assoc();
                        $getu = $connect->query("SELECT * FROM `users` WHERE `id` = '". $p['user_id'] ."'");
                        $u = $getu->fetch_assoc();
                        $picture = $connect->query("SELECT * FROM `productpictures` WHERE `product_id` = '". $r['product_id'] ."' LIMIT 1");
                        $pic = $picture->fetch_assoc();
                        $query = $connect->query("SELECT * FROM `users.profiles` WHERE `user_id` = '". $r['product_id'] ."'");
                        $fu = $query->fetch_assoc();
                ?>

            </div>
            <div class="col-lg-3">
                
                <div class="product">
                    
                    <div class="product-picture">
                        <a href="/product.php?id=<?php echo $p['id']; ?>/"><img src="assets/images/<?php echo $pic['picture']; ?>" width="241px" height="148px"></a>
                    </div>   
                    
                    <div class="product-price">£<?php echo$p['price']?></div> 
                    <div class="hot">HOT</div>
                    <div class="product-title"><a href="/product.php?id=<?=$p['id']?>"><?php echo $p['name']; ?></a></div>    
                    <div class="product-rating">
                        <img src="assets/images/stars.png">
                    </div>
                    <div class="product-line"></div>

                    <div class="product-author-picture">
                        <img src="assets/images/<?php echo $fu['picture']; ?>" width="35px" height="35px">
                    </div>
                    <div class="product-author-name">
                    <a href="/profile/<?php echo $u['username']; ?>/"><?php echo $u['username']; ?></a>
                    </div>
                    <div class="product-author-category">
                        WordPress Themes
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div> 
    </div>
</div>
<div class="blue-cta">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="sign-up">Subscribe to our free update deals, announcements, freebies offer and More..!</div>
                <form>
                    <input type="text" placeholder="Enter your email..">
                    <input type="submit" placeholder="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="featured-list">
              <div class="container">
              <div class="col-xs-12 col-md-8">
                  <div class="header-text">Staff Picks</div>
                  <div class="dotted"></div>
                  <?php
                    $handle = $connect->query(
                        "SELECT * FROM products JOIN hot ON products.id = hot.product_id JOIN productpictures ON products.id = productpictures.product_id GROUP BY products.id");
                    
                  $results = $handle->fetch_all(MYSQLI_ASSOC);
                  ?>
                  <?php foreach($results as $result): ?>
                  <div class="featured-list-bg">
                      <div class="featured-list-thumbnail"><img src="/assets/images/<?=$result['picture'];?>" width="75px" heigh="75px"></div>
                 <div class="featured-list-header">
                     <a href="/product.php?id=<?=$result['product_id']?>"><?=$result['name']?></a></div>
                 <div class="featured-list-description"><?=$result['description']?></div>
                      
                      
                          <div class="price">$<?=$result['price']?></div>
                      <div class="add-to-cart"><a href="#">add to cart</a></div>
                      <div class="buynow"><a href="#">Buy now</a></div>
                      
                  
                     
                  
                  </div>
                  <?php endforeach;?>
              </div>
                  
              <div class="col-xs-6 col-md-4">
                  <div class="header-text">Sponsored</div>

                  <div class="dotted"></div>
                  <?php
                    $handle = $connect->query(
                        "SELECT * FROM products JOIN sponsored ON products.id = sponsored.product_id JOIN productpictures ON products.id = productpictures.product_id GROUP BY products.id");
                    
                  $results = $handle->fetch_all(MYSQLI_ASSOC);
                  
                   
                  ?>
                  
                  <?php foreach($results as $result): ?>
                  <div class="sponsored-1">
                      <div class="product">
                  <div class="product-picture">
                        <a href="/product.php?id=<?php echo $result['id']; ?>/"><img src="/assets/images/<?php echo $result['picture']; ?>" width="338" height="150px"></a>
                    </div>   
                    
                    <div class="product-price">£<?php echo $result['price']?></div> 
                    <div class="sponsored">SPONSORED</div>
                    <div class="product-title"><a href="/product.php?id=<?=$result['id']?>"><?php echo $result['name']; ?></a></div>    
                    <div class="product-rating">
                        <img src="assets/images/stars.png">
                    </div>
                    <div class="product-line"></div>

                    <div class="product-author-picture">
                        <img src="assets/images/owen.jpg" width="35px">
                    </div>
                    <div class="product-author-name">
                    <a href="/profile/<?php echo $u['username']; ?>/"><?php echo $u['username']; ?></a>
                    </div>
                    <div class="product-author-category">
                        WordPress Themes
                    </div>
                      </div>
                  </div>
                  <?php endforeach;?>
                 
                  </div>
                  
          </div>
          </div>
<!--
<div class="app">
    <div class="row">
        <div class="container">
            
            <div class="col-lg-6">
                <div class="mockup">
                    <img src="assets/images/iphone-app.png">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="description">
                    <div class="text">Our User dashboard app is <br /> coming soon!</div>
                    <div class="speech">
                        
                        <img src="assets/imgs/speech-bubble.png">
                    </div>
                    <div class="app-store">
                        <div class="coming-soon">Coming soon to</div>
                        <img src="assets/imgs/app-store.png">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<?php include 'functions/footer.php' ;?>