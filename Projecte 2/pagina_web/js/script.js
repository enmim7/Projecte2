//Java :D

//menu
function myFunction() {
    var x = document.getElementById("nav_button");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}

//slider

$(function() {

    $("#slideshow > div:gt(0)").hide();

    setInterval(function() {
        $('#slideshow > div:first')
            .fadeOut(1900)
            .next()
            .fadeIn(1900)
            .end()
            .appendTo('#slideshow');
    }, 10000);

});