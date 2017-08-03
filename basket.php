<?php
session_start();
include("functions/config.php");
include("functions/sitehead.php");
include("functions/topbar.php");
$query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $_SESSION['email'] ."'");
            $u = $query->fetch_assoc();
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

<body>
      <div class="hero-short">
        <div class="container">
            <div class="profile-name">
                
        
            </div>
            
        </div>
    </div>
    <div id="container">
        <div id="basket">
            <h1>Basket</h1>
            <div id="basketcontain">
                <div id="itemhead"><h3>Item Name</h3></div>
                <div id="qtyhead"><h3>Quantity</h3></div>
                <div id="pricehead"><h3>Price</h3></div>
                <?php
                    $total = "0.00";
                    $query1 = $connect->query("SELECT * FROM `baskets` WHERE `cookieid` = '". $_COOKIE['cartid'] ."'");
                    $r = $query1->fetch_assoc();
                    $query = $connect->query("SELECT * FROM `basketitems` WHERE `basket_id` = '". $r['id'] ."'");
                    while($c = $query->fetch_assoc()) {
                        $product = $connect->query("SELECT * FROM `products` WHERE `id` = '". $c['product_id'] ."'");
                        $p = $product->fetch_assoc();
                ?>
                <div id="itemcon"><a href="/product/<?php echo $p['name']; ?>/"><?php echo $p['name']; ?></a></div>
                <div id="qtycon"><?php echo $c['qty']; ?></div>
                <div id="pricecon">£<?php echo $p['price'] * $c['qty']; ?></div>
                <?php
                        $total = $total + ($p['price'] * $c['qty']);
                    }
                    $stripe = str_replace('.', '', $total);
                ?>
                
                <div id="itemhead" style="border-top: 1px solid black;"></div>
                <div id="qtyhead" style="border-top: 1px solid black;text-align: right;">Total:</div>
                <div id="pricehead" style="border-top: 1px solid black;">£<?php echo $total; ?></div>
                <div style="float: right;">
                <form action="/charge/" method="POST">
                    <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_lVgeLJPEApzSxyFs5HQNtK88"
                    data-image="/img/documentation/checkout/marketplace.png"
                    data-name="Artisan"
                    data-description="2 widgets"
                    data-amount="<?php echo $stripe; ?>"
                    data-locale="auto">
                    </script>
                    <input name="myHiddenAmount" type="hidden" value="<?php echo $stripe; ?>">
                </form>
            </div>
            </div>
        </div>
        <?php include("functions/footer.php"); ?> 
    </div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey("pk_test_lVgeLJPEApzSxyFs5HQNtK88");
    </script>
</body>
</html>
<?php

?>