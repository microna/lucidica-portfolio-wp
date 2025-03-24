// Custom Scripts
// // // Mobile burger menu
// // function burgerMenu() {
// //   const burger = document.querySelector(".burger");
// //   const menu = document.querySelector(".menu");
// //   const body = document.querySelector("body");
// //   burger.addEventListener("click", () => {
// //     if (!menu.classList.contains("active")) {
// //       menu.classList.add("active");
// //       burger.classList.add("active");
// //       body.classList.add("locked");
// //     } else {
// //       menu.classList.remove("active");
// //       burger.classList.remove("active");
// //       body.classList.remove("locked");
// //     }
// //   });
// //   // Here is the place where we change breakpoint
// //   window.addEventListener("resize", () => {
// //     if (window.innerWidth > 991.98) {
// //       menu.classList.remove("active");
// //       burger.classList.remove("active");
// //       body.classList.remove("locked");
// //     }
// //   });
// // }
// // burgerMenu();

// // Initialize Swiper
// const swiper = new Swiper(".projects__slider .swiper", {
//   autoplay: {
//     delay: 3000,
//     disableOnInteraction: false,
//   },
//   slidesPerView: "auto",
//   spaceBetween: 30,
//   loop: true,
//   scrollbar: {
//     el: ".swiper-scrollbar",
//     draggable: true,
//   },
//   breakpoints: {
//     320: {
//       slidesPerView: 1,
//     },
//     768: {
//       slidesPerView: 2,
//     },
//     1024: {
//       slidesPerView: 3,
//     },
//   },
// });

// console.log(swiper);

// Projects slider
var projectsSwiper = new Swiper(".projects__slider", {
    slidesPerView: "auto",
    spaceBetween: 24,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    centeredSlides: false,
    initialSlide: 1,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 24,
      },
      1024: {
        slidesPerView: 5,
        spaceBetween: 24,
      },
    },
  });
  
  // Portfolio slider
  var portfolioSwiper = new Swiper(".testimonials__slider", {
    slidesPerView: "auto",
    spaceBetween: 24,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    centeredSlides: false,
    initialSlide: 1,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerView: 2.2,
        spaceBetween: 24,
      },
      768: {
        slidesPerView: 2.2,
        spaceBetween: 24,
      },
      1024: {
        slidesPerView: 5,
        spaceBetween: 24,
      },
    },
  });
  
  // Modal
  function bindModal(trigger, modal, close) {
    (trigger = document.querySelector(trigger)),
      (modal = document.querySelector(modal)),
      (close = document.querySelector(close));
  
    const body = document.body;
  
    trigger.addEventListener("click", (e) => {
      console.log("click");
      e.preventDefault();
      modal.style.display = "flex";
      body.classList.add("locked");
    });
    close.addEventListener("click", () => {
      modal.style.display = "none";
      body.classList.remove("locked");
    });
    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.style.display = "none";
        body.classList.remove("locked");
      }
    });
  }
  
  // First argument - btn class which will open window
  // Second argument - modal class
  // Third argument - btn class which will close window
  bindModal(".modal__btn", ".modal__wrapper", ".modal__close");
  
  // 