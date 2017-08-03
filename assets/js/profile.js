$(document).ready(function() {
    $("#productcont").hide();
    $("#reviewcont").hide();
    
    $(".profiletab").click(function() {
        $("#profilecont").show();
        $("#productcont").hide();
        $("#reviewcont").hide();
    });
    
    $(".producttab").click(function() {
        $("#profilecont").hide();
        $("#productcont").show();
        $("#reviewcont").hide();
    });
    
    $(".reviewtab").click(function() {
        $("#profilecont").hide();
        $("#productcont").hide();
        $("#reviewcont").show();
    });
});