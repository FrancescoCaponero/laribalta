jQuery(document).ready(function ($) {
  // Hamburger menu & Menu mobile
  $(".navbar-toggler").on("click", function () {
    $(".wrapper-menu-mobile").toggleClass("show");
    $(".navbar-toggler").toggleClass("is-toggled");
  });
  $(window).resize(function () {
    $(".wrapper-menu-mobile").removeClass("show");
    $(".navbar-toggler").removeClass("is-toggled");
  });
  // Dropdown menu
  $(".menu-item--expanded").click(function (e) {
    $(".menu-item--expanded")
      .not(this)
      .children()
      .removeClass("submenu-active");
    $(this).children().toggleClass("submenu-active");
  });
  $(document).on("click", function (e) {
    if ($(e.target).closest(".menu-item--expanded > *").length === 0) {
      $(".menu-item--expanded > .sub-menu").removeClass("submenu-active");
      $(".menu-item--expanded > .nav-link").removeClass("submenu-active");
    }
  });
  // Accordion
  $(".accordion__wrapper__title").on("click", function () {
    $(this).children(".accordion__icon").toggleClass("open");
  });
  const accordionBtns = document.querySelectorAll(".accordion__wrapper__title");
  accordionBtns.forEach((accordion) => {
    accordion.onclick = function () {
      this.classList.toggle("is-open");
      let content = this.nextElementSibling;
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      }
    };
  });
  // swiper
  var cs2Swiper = new Swiper(".swiper-container", {
    loop: true,
    scrollbar: {
      el: ".swiper-scrollbar",
    },
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  document.addEventListener(
    "wpcf7mailsent",
    function (event) {
      setTimeout(() => {
        location = "/grazie/";
      }, 1000);
    },
    false
  );
});
