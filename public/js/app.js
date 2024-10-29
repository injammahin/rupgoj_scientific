
$(document).ready(function() {
  $(".toggle-element").click(function() {
      $(this).next(".element-to-toggle").slideToggle();
  });

  $(".navbar-toggler").click(function() {
      $("#navbarNav").slideToggle();
  });

  $(window).resize(function() {
      if ($(window).width() >= 992) {
          $("#navbarNav").show();
      } else {
          $("#navbarNav").hide();
      }
  });





 
});

// Update the current year dynamically
// document.querySelector('.current-year').textContent = new Date().getFullYear();
