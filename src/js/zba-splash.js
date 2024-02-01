(($)=>{ $(window).load(()=>{

  $('.image-nav-button').click((event) => {
    // Main Image
    const imgSrc = event.target.dataset.src;
    const origEl = $('.splash-wrapper .bg');
    const cloneEl = $('.bg').clone();
    cloneEl.addClass('clone');
    cloneEl.css('background-image', `url(${imgSrc})`);
    $('.splash-wrapper').append(cloneEl);
    origEl.addClass('fade');

    setTimeout(() => {
      origEl.detach();
      cloneEl.removeClass('clone');
    }, 1550);

    // Nav
    $('.image-nav-button.active').removeClass('active');
    $(event.target).addClass('active');
  });

})})(jQuery)