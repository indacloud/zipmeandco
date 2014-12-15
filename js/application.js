(function() {
  $(document).ready(function() {
    var activeSlide, offsetTop, productSwiper, scrollToSection;
    offsetTop = $('#home').offset().top;
    scrollToSection = function(target) {
      return $('body, html').animate({
        'scrollTop': $(target).offset().top - offsetTop,
        duration: 400,
        easing: 'ease-in-out'
      });
    };
    $('nav.navbar a[data-target]').on('click', function(ev) {
      var target;
      if ($(window).width() <= 768) {
        $('#zmc-collapsible-menu').collapse('hide');
      }
      if ($(this).is('[data-toggle="modal"]')) {
        return;
      }
      ev.preventDefault();
      target = $(this).data('target');
      return scrollToSection(target);
    });
    $('.large-menu a[data-target]').on('click', function(ev) {
      var target;
      if ($(this).is('[data-toggle="modal"]')) {
        return;
      }
      ev.preventDefault();
      target = $(this).data('target');
      return scrollToSection(target);
    });
    $('body').scrollspy({
      target: '.navbar',
      offset: $('#home').offset().top + 10
    });
    productSwiper = $('#product-swiper .swiper-container').swiper({
      loop: true,
      calculateHeight: true
    });
    activeSlide = function() {
      var currentSlide;
      currentSlide = productSwiper.activeSlide().data('slide');
      return $('#product-swiper .navigation a').each(function() {
        if ($(this).data('slide') === parseInt(currentSlide)) {
          return $(this).parent('div').addClass('active');
        } else {
          return $(this).parent('div').removeClass('active');
        }
      });
    };
    productSwiper.wrapperTransitionEnd(function() {
      return activeSlide();
    }, true);
    $('#product-swiper .navigation a').click(function(ev) {
      ev.preventDefault();
      return productSwiper.swipeTo($(this).data('slide'));
    });
    $('#product-switer-buttons a').click(function(ev) {
      ev.preventDefault();
      if ($(this).hasClass('prev')) {
        productSwiper.swipePrev();
      }
      if ($(this).hasClass('next')) {
        return productSwiper.swipeNext();
      }
    });
    activeSlide();
    $('.wpcf7-checkbox input[type="checkbox"], .wpcf7-acceptance').on('change', function(ev) {
      if ($(this).is(':checked')) {
        return $(this).parent().addClass('checked');
      } else {
        return $(this).parent().removeClass('checked');
      }
    });
    return $('.wpcf7-acceptance').each(function() {
      var $label;
      $label = $(this).parent().parent().find('.acceptance-label');
      $label.attr({
        'for': 'acceptance-checkbox'
      });
      $(this).attr({
        'id': 'acceptance-checkbox'
      }).wrap($label);
      return $label.remove();
    });
  });

}).call(this);
