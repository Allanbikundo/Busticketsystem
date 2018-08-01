var windowSize = $(window).height();

$(window).scroll(function() {
  if ($(window).scrollTop() > windowSize) {
    $('#sidebar').css({
      'position' : 'fixed',
      'top': '0'
    });
    $('#top-header').css({
      'position' : 'fixed',
      'top': '0',
      'width' : '98%',
      'box-shadow' : '0px 0px 10px 0px rgba(0, 0, 0, 0.2)'
    });
    $('#mobile-trigger-open').css({
      'position' : 'fixed',
      'top' : '3.4rem',
      'background' : 'rgba(255, 255, 255, 0.7)',
      'width' : '100%'
    });
  } else {
    $('#sidebar').css({
      'position' : 'absolute',
      'margin-top': '3.2rem'
    });
    $('#top-header').css({
      'position' : 'relative',
      'box-shadow' : 'none'
    });
    $('#mobile-trigger-open').css({
      'position' : 'absolute',
      'top' : 'initial',
      'background' : 'transparent'
    });
  }
});


$('.more, .more-trigger-close, #overlay').hide();

$('.more-trigger').on('click', function() {
  $(this).slideUp(200);
  $(this).next('.more').slideDown();
});


$('#mobile-trigger-open').on('click', function() {
  $('#overlay').show();
  $('#sidebar').show().animate({
    'right' : '0',
    'top' : '0'
  }).css({
    'box-shadow' : '0px 0px 10px 0px rgba(0, 0, 0, 0.6)'
  });
  $('#mobile-trigger-open').hide();
});

$('#overlay, #mobile-trigger-close').on('click', function() {
  $('#sidebar').show().animate({
    'right' : '-80vw'
  }, 300);
  $('#overlay').fadeOut( 300 );
  setTimeout(function() {
    $('#mobile-trigger-open').fadeIn();
  }, 300);
});