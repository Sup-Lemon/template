$(".burger").click(function (event) {
  event.preventDefault();
  $(".burger").toggleClass("active");
  $(".nav-menu").toggleClass("open");
  $("header").toggleClass("active");
});

$(".nav-menu ul li a").click(function () {
  $(".burger").toggleClass("active");
  $(".nav-menu").toggleClass("open");
  $("header").toggleClass("active");
});

document.addEventListener('DOMContentLoaded', function() {
    var header = document.getElementById('masthead');
    var lastScrollY = window.scrollY;
    var tolerance = 5; // Définissez une tolérance pour ignorer les petites variations de défilement
  
    window.addEventListener('scroll', function() {
      const currentScrollY = window.scrollY;
  
      // Ignore les petits déplacements près du haut de la page causés par l'effet élastique
      if (Math.abs(currentScrollY) <= tolerance) {
        return;
      }
  
      if (currentScrollY <= tolerance) {
        header.classList.remove('scroll');
        header.classList.remove('scrolling-up');
      } else if (currentScrollY > lastScrollY) {
        header.classList.add('scroll');
        header.classList.remove('scrolling-up');
      } else if (currentScrollY < lastScrollY) {
        header.classList.remove('scroll');
        header.classList.add('scrolling-up');
      }
  
      lastScrollY = currentScrollY; // Met à jour la dernière position de défilement à la position actuelle
    });
  });

AOS.init({ once: true });
