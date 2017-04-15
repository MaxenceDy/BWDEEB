$(window).on('load', function (){
    $('.custom-scroll-bar').mCustomScrollbar();
});
// Get the Agrandissement
var Agrandissement = document.getElementById('monAgrandissement');

// Get the image and insert it inside the Agrandissement - use its "alt" text as a caption
var img = document.getElementById('monImg');
var AgrandissementImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    Agrandissement.style.display = "block";
    AgrandissementImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the Agrandissement
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the Agrandissement
span.onclick = function() { 
    Agrandissement.style.display = "none";
}