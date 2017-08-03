<?php
session_start();
include("functions/config.php");
include("functions/sitehead.php");
include("functions/topbar.php");
?>

<body>
    <div id="container">

        <?php
        if(isset($_GET['sent'])) {
            $username = clean($connect, $_POST['username']);
            $subject = clean($connect, $_POST['subject']);
            $message = clean($connect, $_POST['message']);

            if($username != NULL || $subject != NULL || $message != NULL) {
                $getuser = $connect->query("SELECT * FROM `users` WHERE `username` = '". $username ."'");
                $user = $getuser->fetch_assoc();
                if($getuser->num_rows == 0) {
                    echo "No user by that name exists";
                } else {
                    $getsender = $connect->query("SELECT * FROM `users` WHERE `email` = '". $_SESSION['email'] ."'");
                    $sender = $getsender->fetch_assoc();

                    $insert = $connect->query("INSERT INTO `messages` (user_id, sender_id, subject, message) VALUES ('". $user['id'] ."', '". $sender['id'] ."', '". $subject ."', '". $message ."')");
                    
                     echo '<div id="successlabel">Message Sent Successfully</div>';
                }
            } else {
                echo "You left a field empty";
            }
        }
        ?>
        <div id="composecontain">
            <?php
            $user = "";
            if(isset($_GET['user'])) {
                $user = $_GET['user'];
            }
            ?>
        </div>
        
<div>
            <form id="compose2" name="compose" method="post" action="/compose/?sent">
                <div id="msgalertbox">
                    <h3 style="padding:5px;">Please note, for safety. The messaging system is monitored, anyone breaking the code of conduct or violating our services will be banned.</h3>
            </div>
        
                <input id="composeformto" type="text" name="username" value="<?php echo $user; ?>" placeholder="Username">
                <input id="composeformsubject" type="text" name="subject" placeholder="Subject">
                <textarea id="composeformmsg" name="message" cols="40" rows="10" placeholder="Message"></textarea>
                <input id="composeformsubmit" type="submit" id="submit" value="Send" name="submit">
                
            </form>
    
        </div>
            
        <?php include("functions/footer.php"); ?>
    </div>
</body>
</html>