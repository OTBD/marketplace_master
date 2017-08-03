$(document).ready(function() {
    $("#followbutton").hover(function() {
        if($("#followbutton").html().indexOf("Following") != -1) {
            $("#followbutton").html("Unfollow");
        }
    }, function() {
        if($("#followbutton").html().indexOf("Unfollow") != -1) {
            $("#followbutton").html("Following");
        }
    });
});