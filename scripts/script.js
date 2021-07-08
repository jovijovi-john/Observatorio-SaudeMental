function openMenu() {
  document.getElementById("nav-bar").style.height = "100%";
}

function closeMenu() {
  document.getElementById("nav-bar").style.height = "0";
} 

var time;
var slideIndex = 0;
showSlides();

function clearTime() {
  clearTimeout(time);
}

function plusSlides() {
  showSlides(slideIndex);
  clearTime();
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slider-item");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  time = setTimeout(showSlides, 7000);
}

