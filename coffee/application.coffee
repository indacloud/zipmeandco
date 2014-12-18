$(document).ready ->
  offsetTop = $('#home').offset().top

  # Navbar scroll
  scrollToSection = (target)->
    $('body, html').animate
      'scrollTop': $(target).offset().top - offsetTop
      duration: 400
      easing: 'ease-in-out'

  $('nav.navbar a[data-target]').on 'click', (ev)->
    if $(window).width() <= 768
      $('#zmc-collapsible-menu').collapse('hide')

    if $(this).is('[data-toggle="modal"]')
      return
    ev.preventDefault()
    target = $(this).data 'target'

    scrollToSection(target)

  $('.large-menu a[data-target]').on 'click', (ev)->
    if $(this).is('[data-toggle="modal"]')
      return
    ev.preventDefault()
    target = $(this).data 'target'

    scrollToSection(target)

  $('body').scrollspy(
    target: '.navbar'
    offset: $('#home').offset().top + 10
    )

  resizeSections = ->
    sectionHeight = $(window).height() - ($('#main-head').height() + $('#main-foot').height())
    $('section[data-section]').each ->
      $(this).css(
        'min-height': sectionHeight
        )

  $(window).on 'resize', (ev)->
    resizeSections()

  resizeSections()

  productSwiper = $('#product-swiper .swiper-container').swiper(
    loop: true
    calculateHeight: true
    )

  activeSlide = ->
    currentSlide = productSwiper.activeSlide().data 'slide'
    $('#product-swiper .navigation a').each ->
      if $(this).data('slide') == parseInt(currentSlide)
        $(this).parent('div').addClass 'active'
      else
        $(this).parent('div').removeClass 'active'

  productSwiper.wrapperTransitionEnd ->
    activeSlide()
  , true

  $('#product-swiper .navigation a').click (ev)->
    ev.preventDefault()
    productSwiper.swipeTo $(this).data('slide')

  $('#product-switer-buttons a').click (ev)->
    ev.preventDefault()
    if $(this).hasClass 'prev'
      productSwiper.swipePrev()
    if $(this).hasClass 'next'
      productSwiper.swipeNext()

  activeSlide()

  $('.wpcf7-checkbox input[type="checkbox"], .wpcf7-acceptance').on 'change', (ev)->
    if $(this).is(':checked')
      $(this).parent().addClass 'checked'
    else
      $(this).parent().removeClass 'checked'

  $('.wpcf7-acceptance').each ->
    $label = $(this).parent().parent().find('.acceptance-label')
    $label.attr('for': 'acceptance-checkbox')
    $(this).attr('id': 'acceptance-checkbox').wrap($label)
    $label.remove()