<?php
session_start();
include("functions/config.php");
include("functions/sitehead.php");
include("functions/topbar.php");
$query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $_SESSION['email'] ."'");
            $u = $query->fetch_assoc();
?>

<body>
    <div class="hero-short">
        <div class="container">
            <div class="profile-name">
                
        
            </div>
            
        </div>
    </div>
    <div id="container">
        <div id="messages" style="margin-left:110px;">      
        <div class="col-xs-3 col-md-3">
                
                <div class="messages-left">
                    <div class="messages-title">Recent Messages</div>
                    <div class="messages-recent">
                            <ul>
                                <li>
                                    <div class="messages-image">
                                        <img src="assets/imgs/11b230008fe78c0316e98ad1af3d9647.jpg" style="border-radius:100px; width:50px; height:50px; margin-left: 120px; margin-top:10px;">
                                        <div class="messages-name"><b>Dale Phillips</b></div>
                                        <div class="messages-msg">How's the marketplace going?</div>
                                </li>
                                    
                                <li>
                                    <div class="messages-image">
                                        <img src="assets/imgs/owen.jpg" style="border-radius:100px; width:50px; height:50px; margin-left: 120px; margin-top:10px;">
                                        <div class="messages-name"><b>Owen Dawso</b></div>
                                        <div class="messages-msg">Have you the chat box ye..</div>
                                </li>
            
                            </ul>
                    </div>
                    
                    
                </div>
                
            </div>
        </div>
            
            <div class="col-xs-6 col-md-5">
                
                <div class="messages-center">
                    <div class="messages-title">Active Conversation</div>
                </div>
                
            </div>
            
            <div class="col-xs-3 col-md-3">
                
                <div class="messages-right">
                    <div class="messages-title">Search for user</div>
                </div>
                
            </div>
        </div>
        <div class="container">
       
        </div>
        <?php include("functions/footer.php"); ?> 
    </div>
</body>
</html>