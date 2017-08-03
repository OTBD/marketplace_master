
<script type="text/javascript" src="../assets/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.leanModal.min.js"></script>
<div id="fade" class="black_overlay"></div>
     <div id="top-masthead">
      <div class="container">
          <div class="top-text-right">
          <?php
              $cookie = "";
        if(isset($_COOKIE['cartid'])) {
            $cookie = $_COOKIE['cartid'];
        } else {
            $cartid = generateRandomString();
            setcookie("cartid", $cartid);
            $cookie = $cartid;
            $cbasket = $connect->query("INSERT INTO `baskets` (`cookieid`) VALUES ('". $cartid ."')");
        }
        $getb = $connect->query("SELECT * FROM `baskets` WHERE `cookieid` = '". $cookie ."'");
        $b = $getb->fetch_assoc();
        $getbasket = $connect->query("SELECT * FROM `basketitems` WHERE `basket_id` = '". $b['id'] ."'");
        $basketamount = "0.00";
        while($ba = $getbasket->fetch_assoc()) {
            $getproduct = $connect->query("SELECT * FROM `products` WHERE `id` = '". $ba['product_id'] ."'");
            $p1 = $getproduct->fetch_assoc();
            $basketamount = $basketamount + ($p1['price'] * $ba['qty']);
        }
        if(isset($_SESSION['email'])) {
            $query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $_SESSION['email'] ."'");
            $a = $query->fetch_assoc();
            $getmessages = $connect->query("SELECT * FROM `messages` WHERE `user_id` = '". $a['id'] ."' AND `read` = '0'");
            echo "Welcome <a href=\"/profile.php?id=".$a['id']."/\">" . $a['name'] . "</a> | ";
        ?>
         <a href="/basket.php">Basket (£<?php echo $basketamount; ?>)</a> | <a href="/messages.php">Messages (<?php echo $getmessages->num_rows; ?>) </a> | <a href="functions/logout.php">Logout</a>
        <?php
        } else { 
        ?>
        <a href="/basket.php">Basket (£<?php echo $basketamount; ?>)</a> | Help | <a href="#modal" id="modal_trigger">Login / Sign Up</a>
        <?php
        }
        ?>
          </div>
          <div class="top-text-left">
          20% off use code 'CYBER MONDAY' at checkout
          </div>
      </div>
    </div> 
    
    <div class="top-header">
        <div class="container">
           <?php
            include("functions/nav.php");
            ?>
            <div class="container">

    <div id="modal" class="popupContainer" style="display:none;margin-top:-50px;">
        <header class="popupHeader">
            <span class="header_title">Login</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>
        
        <section class="popupBody" style="">
            <!-- Social Login -->
            <div class="social_login">
                <div class="">
                    <a href="#" class="social_box fb">
                        <span class="icon"><i class="fa fa-facebook"></i></span>
                        <span class="icon_title">Connect with Facebook</span>
                        
                    </a>

                    <a href="#" class="social_box google">
                        <span class="icon"><i class="fa fa-google-plus"></i></span>
                        <span class="icon_title">Connect with Google</span>
                    </a>
                </div>

                <div class="centeredText">
                    <span>Or use your Email address</span>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                    <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
                </div>
            </div>

            <!-- Username & Password Login form -->
            <div class="user_login">
                <form name="login" method="post" action="functions/checkuser.php">
                    <label>Email / Username</label>
                    <input style="margin-left:-5px;" type="text" name="email" placeholder="Email" required>
                    <br />

                    <label>Password</label>
                    <input style="margin-left:-5px;" type="password" name="password" placeholder="Password" required>
                    <br />

                    <div class="checkbox">
                        <label for="remember">Remember me on this computer</label>
                    </div>

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                        <div class="one_half last"><input type="submit" id="submit" name="submit" value="Login"></div>
                    </div>
                </form>

                <a href="#" class="forgot_password">Forgot password?</a>
            </div>

            <!-- Register Form -->
            <div class="user_register">
                <form action="functions/doregister.php" name="register" method="post">
        <input type="text" name="fname" placeholder="First Name" required>
        <input type="text" name="lname" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="cpassword" placeholder="Confirm Password" required>
        <input type="text" name="username" placeholder="Username" required>
        <div class="one_half" style=""><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
        <input type="submit" id="submit" name="submit" value="Register">
    </form>
            </div>
        </section>
    </div>
</div>
            </div>
        </div>
        <script type="text/javascript">
    $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").hide();
            $(".user_login").show();
            return false;
        });

        // Calling Register Form
        $("#register_form").click(function(){
            $(".social_login").hide();
            $(".user_register").show();
            $(".header_title").text('Register');
            return false;
        });

        // Going back to Social Forms
        $(".back_btn").click(function(){
            $(".user_login").hide();
            $(".user_register").hide();
            $(".social_login").show();
            $(".header_title").text('Login');
            return false;
        });

    })
</script>
  