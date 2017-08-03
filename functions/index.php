<?php
session_start();
include("config.php");
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/popup-script.js"></script>

    <title>m.arketplace - design. develop. distribute.</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
    <div id="account">
        <?php
        if(isset($_SESSION['email'])) {
            $query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $_SESSION['email'] ."'");
            $a = $query->fetch_assoc();
            $getmessages = $connect->query("SELECT * FROM `messages` WHERE `user_id` = '". $a['id'] ."' AND `read` = '0'");
            echo "Welcome <a href=\"/profile/".$a['username']."/\">" . $a['name'] . "</a> - ";
        ?>
        <a href="logout.php">Logout</a>
        <?php
        } else {
        ?>
        <a href="#" class="register">Register</a> - <a href="#" class="login">Login</a>
        <?php
        }
        ?>
    </div>
  <body>
<div id="fade" class="black_overlay"></div>
     <div id="top-masthead">
      <div class="container">
          <div class="top-text">
          £500 worth graphics, mockup, html templates and wordpress themes bundle now only £50 for this month offer.<a id="close">[close]</a>
          </div>
      </div>
    </div> 
    
    <div class="top-header">
        <div class="container">
            <div class="logo-center"></div>
            <div class="row">
                <div class="social"><p>FOLLOW US:
                <i class="fa fa-facebook"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-instagram"></i>
                <i class="fa fa-pinterest"></i>
                </div>
                <div class="register-signup">
                <a href="#" class="register"></a></p>
        <div id="register-popup" class="white_content">
             <a href="#" class="close">X</a>
            
            <div class="logo-center"></div>
            
            <form method="post" action="checkuser.php">
                <div class="login-form">
                <input type="text" name="email" placeholder="Email Address"><br>
                <input type="text" name="fullname" placeholder="Full Name"><br>
                <input type="password" name="password" placeholder="Password">
                </div>
                <a href="#" class="forgot">Forgot your password?</a>
                <input type="submit" value="submit" id="submit" name="login" placeholder="Login">
                <div class="login-text">OR</div>
                <div class="login-facebook text-center">Login with Facebook</div>
                <div class="login-signup-text">Don't have an account yet? SIGN UP ></div>
            </form>
            
           </div>
                </div>
            
                <div class="login-signup">
                <a href="#" class="login"></a></p>
        <div id="login-popup" class="white_content">
             <a href="#" class="close">X</a>
            
            <div class="logo-center"></div>
            
            <form method="post" action="checkuser.php">
                <div class="login-form">
                <input type="text" name="email" placeholder="Email Address"><br>
                <input type="password" name="password" placeholder="Password"><br>
                </div>
                <a href="#" class="forgot">Forgot your password?</a>
                <input type="submit" value="submit" id="submit" name="login" placeholder="Login">
                <div class="login-text">OR</div>
                <div class="login-facebook text-center">Login with Facebook</div>
                <div class="login-signup-text">Don't have an account yet? SIGN UP ></div>
            </form>
            
           </div>
        
                </div>
            </div>
        </div>
    
    </div>
      
        <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">All Products</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">WordPress <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Business</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Corporate</a></li>
                <li><a href="#">Dashboards</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Non Profit</a></li>
                <li><a href="#">Church</a></li>
                <li><a href="#">Resturant</a></li>
              </ul>
            </li>
               <li><a href="#about">HTML5 / CSS</a></li>
            <li><a href="#contact">Branding</a></li>
            <li><a href="#contact">Posters</a></li>
            <li><a href="#contact">Flyers</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#">Basket (3)</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <div class="carousel-main-content">
        ALL TYPES OF PREMIUM GRAPHIC & WEB RESOURCES
        </div>
        <div class="carousel-sub-content">SIGN UP TODAY AND GET 30 DAYS FREE TRIAL.</div>
        <div class="carousel-search">e.g. WordPress Theme<i class="fa fa-search pull-right"></i></div>
        <div class="carousel-bottom-content">The best way to present your business with high quality resources.</div>
      <img src="css/images/slider_bg.png">
        
    </div>
      
      <div class="cta-white">
        <div class="container">
            <div class="row">
            <div class="text-center">
                SIGN UP AND CREATE A <span class="blue"><b>FREE ACCOUNT</b></span> AND USE IT TO ACCESS DEALS FOR 30 DAYS  <div class="btn btn-signup">SIGN UP</div>
                </div>
            </div>
        </div>
      </div>

      <div class="featured-deals">
        <div class="container">
            <div class="featured-header text-center">
            FEATURED DEALS
            </div>
            <div class="featured-timer text-center">
                <span class="orange">14</span>Days
                <span class="orange">2</span>Hours
                <span class="orange">44</span>Mins
                <span class="orange">12</span>Seconds
            </div>
            
            <div class="featured-1">
                <div class="featured-1-cta">20% Off</div>
                <div class="featured-1-img"></div>
                <div class="featured-1-price">£12</div>
                <div class="featured-1-title">Macbook Mockup PSD</div>
                <div class="featured-1-description">High resolution MacBook mock up which includes 4 shots of a workspace.</div>
                <div class="featured-1-date">Ending on: Oct 18, 2015</div>
                <div class="featured-1-category">PSD Mockups</div>
                <div class="featured-1-love">12</div>
                <div class="featured-1-comment">33</div>
            </div>
            <div class="featured-1">
                <div class="featured-1-img"></div>
                <div class="featured-1-price">£12</div>
                <div class="featured-1-title">Macbook Mockup PSD</div>
                <div class="featured-1-description">High resolution MacBook mock up which includes 4 shots of a workspace.</div>
                <div class="featured-1-date">Ending on: Oct 18, 2015</div>
                <div class="featured-1-category">PSD Mockups</div>
                <div class="featured-1-love">12</div>
                <div class="featured-1-comment">33</div>
            </div>
            <div class="featured-3">
                <div class="featured-1-img"></div>
                <div class="featured-1-price">£12</div>
                <div class="featured-1-title">Macbook Mockup PSD</div>
                <div class="featured-1-description">High resolution MacBook mock up which includes 4 shots of a workspace.</div>
                <div class="featured-1-date">Ending on: Oct 18, 2015</div>
                <div class="featured-1-category">PSD Mockups</div>
                <div class="featured-1-love">12</div>
                <div class="featured-1-comment">33</div>
            </div>
            
        </div>  
      </div>
      
      <div class="top-categories">
        <div class="container">
            <div class="categories-header text-center">
            TOP CATEGORIES
            </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-3 text-center">
             <i class="fa fa-wordpress"></i>   
             <div class="categories-text">WORDPRESS THEMES</div>
            </div>
            <div class="col-sm-3 text-center">
            <i class="fa fa-html5"></i>
             <div class="categories-text">HTML5 TEMPLATES</div>
            </div>
            <div class="col-sm-3 text-center">
                <i class="fa fa-paint-brush"></i>
             <div class="categories-text">PSD GRAPHICS</div>
            </div>
               <div class="col-sm-3 text-center">
                <i class="fa fa-tv"></i>
              <div class="categories-text">MOCK UPS</div>
            </div>
          </div>
        <div class="row">
            <div class="col-sm-3 text-center">
             <i class="fa fa-font"></i>   
             <div class="categories-text">FONTS</div>
            </div>
            <div class="col-sm-3 text-center">
            <i class="fa fa-plane"></i>
             <div class="categories-text">ICONS</div>
            </div>
            <div class="col-sm-3 text-center">
                <i class="fa fa-photo"></i>
             <div class="categories-text">STOCK IMAGES</div>
            </div>
               <div class="col-sm-3 text-center">
                <i class="fa fa-mobile"></i>
              <div class="categories-text">MOBILE APPS</div>
            </div>
        </div>
    </div>
        </div>
      </div>
      
      <div class="awesome-features">
          <div class="container">
              <div class="awesome-header text-center">
            AWESOME FEATURES
            </div>
        <div class="row">
            <div class="col-sm-4">
            <div class="money"></div>
                <div class="awesome-head">30 DAYS MONEY BACK<br /> GUARENTEED</div>
                <div class="awesome-text">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</div>
            </div>  
            
             <div class="col-sm-4">
            <div class="briefcase"></div>
                <div class="awesome-head">NEW ITEMS ARE INCLUDED<br /> IN SAME SUBSCRIPTIONS</div>
                <div class="awesome-text">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</div>
            </div>  
            
             <div class="col-sm-4">
            <div class="support"></div>
                <div class="awesome-head">24/7 DEDICATED CUSTOMER<br /> SUPPORT</div>
                <div class="awesome-text">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</div>
            </div>  
        </div>
              
        <div class="row">
            <div class="col-sm-4">
            <div class="quality"></div>
                <div class="awesome-head">WE ARE FOCUSING ONLY<br /> ON QUALITY</div>
                <div class="awesome-text">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</div>
            </div>  
            
             <div class="col-sm-4">
            <div class="trophy"></div>
                <div class="awesome-head">EXCLUSIVE DEALS AND OFFERS<br /> AVAILABLE EVERY MONTH</div>
                <div class="awesome-text">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</div>
            </div>  
            
             <div class="col-sm-4">
            <div class="lock"></div>
                <div class="awesome-head">100% SECURED PAYMENT<br /> GATEWAY</div>
                <div class="awesome-text">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</div>
            </div>  
        </div>
          </div>
      </div>
      
      <div class="deals-by-category">
        <div class="container">
            <div class="awesome-header text-center">
            DEALS BY CATEGORIES
            </div>
          </div>
          
          <div class="container">
          <div class="nav-bg">
              <input type="radio" id="reset" name="color"/>
              <label for="reset">All</label>
              
              <input type="radio" id="blue" name="color" />
              <label for="blue">Mockups</label>
              
              <input type="radio" id="red" name="color"/>
              <label for="red">HTML</label>
              
              <input type="radio" id="green" name="color"/>
              <label for="green">WordPress</label>
              
               <input type="radio" id="green" name="color"/>
              <label for="red">PSD</label>
              
               <input type="radio" id="green" name="color"/>
              <label for="green">Vector</label>
              
               <input type="radio" id="green" name="color"/>
              <label for="blue">Fonts</label>
              
             <input type="radio" id="green" name="color"/>
              <label for="green">Scripts</label>
              
              <input type="radio" id="green" name="color"/>
              <label for="green">Icons</label>
              
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
               <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
            </div>
              <div class="placeholder-1">
                <div class="placeholder-1-cta">20% Off</div>
                <div class="placeholder-1-img"></div>
                <div class="placeholder-1-price">£12</div>
                <div class="placeholder-1-title">Macbook Mockup PSD</div>
                <div class="placeholder-1-date">Ending on: Oct 18, 2015</div>
              </div>
              </div>
              <div class="text-center">
               <ul class="pagination text-center">
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
               </ul>
              </div>
         </div>
          
            <div class="testimonial-bg text-center">
                <div class="container">
                    <div class="testimonial">
                        <div class="quote"></div>
                    Whether you need to create a brand from scratch, including marketing materials and a beautiful and functional website or whether you are looking for a design refresh we are confident you will be pleased with the results.
                        <div class="testimonial-image"></div>
                        <div class="testimonial-name">Holly Trueman</div>
                        <div class="testimonial-link">www.hollytrueman.com</div>
                    </div>
              </div>
          </div>
          
          <div class="cta-blue">
        <div class="container">
            <div class="row">
            <div class="text-center">
                WANT TO BE A CONTRIBUTOR? SIGN UP TODAY HERE, IT'S FREE!<div class="btn btn-signup">SIGN UP</div>
                </div>
            </div>
        </div>
      </div>
          <div class="footer-bg text-center">
          <div class="container">
              <div class="logo-center"></div>
              <ul class="bottom-text">
              <li style="float:none;margin-right:15px;">PRIVACY POLICY</li>
              <li style="float:none;margin-right:15px;">TERMS & CONDITIONS</li>
              <li style="float:none;margin-right:15px;">SECURED PAYMENTS</li>
              <li style="float:none;margin-right:15px;">MY PROFILE</li>
              </ul>
              <div class="line"></div>
              </div>
          </div> 
          
          <div class="bottom-footer">
            <div class="container">
              <div class="copy-text">&copy; <span class="orange">m.arketplace</span> All rights reserved 2015.</div>
              </div>
          </div>
        </div>
      </div>
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
      <script src="js/modernizr.custom.80028.js"></script>
  

</body></html>