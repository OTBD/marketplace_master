$(document).ready(function() {    
    var buttonInterval = setInterval(checkClose, 500);
    
    function checkClose() {
        $("#closelogin").click(function() {
            $("#logincontainer").fadeOut(100);
            $("#back").fadeOut(100);
            $("#logincontainer").css("visibility", "hidden");
        }); 
        
        $("#closeregister").click(function() {
            $("#registercontainer").fadeOut(100);
            $("#back").fadeOut(100);
            $("#registercontainer").attr("visibility", "hidden");
        }); 
    }

    $("#loginbutton").click(function() {
        $("#logincontainer").css("visibility", "visible");
        $("#back").css("visibility", "visible");
        $("#back").fadeIn(200);
        $("#logincontainer").fadeIn(200);
        $("#logincontainer").load("/templates/login.php");
    });
    
    $("#registerbutton").click(function() {
        $("#registercontainer").css("visibility", "visible");
        $("#back").css("visibility", "visible");
        $("#back").fadeIn(200);
        $("#registercontainer").fadeIn(200);
        $("#registercontainer").load("/templates/register.php");
    });
    
});