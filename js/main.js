$(function() {
  var navToggle = 0;
  $("#nav-toggle").on("click", function() {
    if(!navToggle) {
      $("#mobile-nav").animate({"right": 0});
      $("#main").animate({"margin-right": 200});
      navToggle = 1;
    } else {
      $("#mobile-nav").animate({"right": -200});
      $("#main").animate({"margin-right": 0});
      navToggle = 0;
    }
  });
  
  $(window).on("resize", function() {
    var winWidth = $(this).width();
    if(winWidth > 767) {
      $("#mobile-nav").css({"right": -200});
      $("#main").css({"margin-right": 0});
      navToggle = 0;
    }
  });
  
  var desktopNavHeight = $("#desktop-nav").height();
  $("#mobile-nav a").height(desktopNavHeight );
});