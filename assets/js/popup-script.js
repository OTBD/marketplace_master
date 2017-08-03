var openspeed = 1000;

$(document).ready(function() { 
    $("#register-popup").hide();
    $("#login-popup").hide();
    
    $(".register").click(function() {
        $("#register-popup").fadeIn(openspeed);
        $("#fade").fadeIn(300);
        $("#fade").css("height",$("body").height());

    });
    
    $(".login").click(function() {
        $("#login-popup").fadeIn(openspeed);
        $("#fade").fadeIn(300);
        $("#fade").css("height",$("body").height());

    });
   
    $(".close").click(function() {
        $("#register-popup").fadeOut(openspeed);
        $("#login-popup").fadeOut(openspeed);
        $("#fade").fadeOut(300);

    });
    
    
    
});