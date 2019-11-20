$(function(){

  var header = document.getElementById('header');
  var headroom = new Headroom(header);
  headroom.init();
  // Menu Responsive
  var ancho = $(window).width(),
      enlaces = $("#enlaces"),
      btnMenu = $("#btn-menu"),
      icono = $("#btn-menu .icono");

  if(ancho <= 768) {
    enlaces.hide();
    icono.addClass('fa-bars');
  }

  btnMenu.on('click', function(e){
    enlaces.slideToggle();
    icono.toggleClass('fa-bars');
    icono.toggleClass('fa-times');
  });

  $(window).on('resize', function(){
    if ($(this).width() > 768) {
      enlaces.show();
      btnMenu.hide();
      icono.addClass('fa-times');
      icono.removeClass('fa-bars');
    } else {
      btnMenu.show();
      enlaces.hide();
      icono.addClass('fa-bars');
      icono.removeClass('fa-times');
    }
  })

});
