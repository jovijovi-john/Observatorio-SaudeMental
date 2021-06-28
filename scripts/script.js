function DropdownSobre() {
  document.getElementById("dropdown-sobre").classList.toggle("show-dropdown-sobre");

  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content-sobre");
      var i;
      for (i=0; i<dropdowns.length; i++) {
        var openDropdowns = dropdowns[i];
        if (openDropdowns.classList.contains('show-dropdown-sobre')) {
          openDropdowns.classList.remove('show-dropdown-sobre');
        }
      }
    }
  }
}

function DropdownProdutos() {
  document.getElementById("dropdown-produtos").classList.toggle("show-dropdown-produto");

  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content-produtos");
      var i;
      for (i=0; i<dropdowns.length; i++) {
        var openDropdowns = dropdowns[i];
        if (openDropdowns.classList.contains('show-dropdown-produto')) {
          openDropdowns.classList.remove('show-dropdown-produto');
        }
      }
    }
  }
}

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
  time = setTimeout(showSlides, 4000);
}

/* CITAÇÃO */

function cite(str){
    console.log('chegou aqui')
    // Create new element
   var el = document.createElement('textarea');
   // Set value (string to be copied)
   el.value = str;
   // Set non-editable to avoid focus and move outside of view
   el.setAttribute('readonly', '');
   el.style = {position: 'absolute', left: '-9999px'};
   document.body.appendChild(el);
   // Select text inside element
   el.select();
   // Copy text to clipboard
   document.execCommand('copy');
   // Remove temporary element
   document.body.removeChild(el);
}