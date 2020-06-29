// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    document.getElementById("btop").style.display = "block";
  } else {
    document.getElementById("btop").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
  // $('html, body').animate({scrollTop:0}, '200');
  // document.body.animate({scrollTop:0}, '200');
  // document.documentElement.animate({scrollTop:0}, '200');
}
