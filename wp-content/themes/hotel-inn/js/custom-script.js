jQuery(document).ready(function () {
  function checkScroll() {
      if (jQuery(window).scrollTop() > 300) {
          jQuery('#back-to-top').fadeIn();
      } else {
          jQuery('#back-to-top').fadeOut();
      }
  };
  checkScroll();
  jQuery(window).scroll(function () {
      checkScroll();
  });
  jQuery('#back-to-top').click(function () {
      jQuery('html, body').animate({ scrollTop: 0 }, 800);
      return false;
  });
});