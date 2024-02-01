(($)=>{ $(window).load(()=>{

  if($('.project-carousel-wrapper .project').length < 4){
    $('.project-carousel-wrapper').addClass('no-carousel-init');
  }

  // Initialize carousel
  const options = {
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        }
      },
    ],
    centerMode: true,
    centerPadding: 0,
	  adaptiveHeight: true,
    slide: '.project',
    prevArrow: '.project-carousel-wrapper .project-carousel-nav button.left-chevron',
    nextArrow: '.project-carousel-wrapper .project-carousel-nav button.right-chevron'
  }
  $('.project-carousel-wrapper').slick(options);

})})(jQuery)