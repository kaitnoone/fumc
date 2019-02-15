jQuery(function($) {
  // SET UP THE MENU
  // get variables
  const CSS_OPEN_CLASS = "open";
  let primaryNavCon = document.querySelectorAll("nav.primary")[0];
  let primaryNav = document.querySelectorAll(
    ".menu-header-container > .menu"
  )[0];
  let levelOneMIs = document.querySelectorAll(
    ".menu-header-container > .menu > .menu-item-has-children"
  );
  let toggle = document.querySelectorAll(".nav--toggle")[0];

  // set up the mobile toggle
  toggle.addEventListener("click", function(evt) {
    primaryNavCon.classList.toggle(CSS_OPEN_CLASS);
    toggle.classList.toggle(CSS_OPEN_CLASS);
  });

  for (let i = 0; i < levelOneMIs.length; i++) {
    // create toggle arrow element to append
    let arrow = document.createElement("span");
    arrow.classList.add("arrow");

    // add toggle arrow
    levelOneMIs[i].appendChild(arrow);
    let childArrow = levelOneMIs[i].querySelector("span.arrow");

    // set up click handler
    childArrow.addEventListener("click", function(evt) {
      if (levelOneMIs[i].classList.contains(CSS_OPEN_CLASS)) {
        levelOneMIs.forEach(function(element) {
          element.classList.remove(CSS_OPEN_CLASS);
        });
      } else {
        levelOneMIs.forEach(function(element) {
          element.classList.remove(CSS_OPEN_CLASS);
        });
        levelOneMIs[i].classList.add(CSS_OPEN_CLASS);
      }
    });
  }

  // initialize ministries carousel
  var ministryCarousel = document.querySelectorAll(".ministries-carousel")[0];
  if (ministryCarousel) {
    var flkty = new Flickity(ministryCarousel, {
      // options
      wrapAround: true,
      cellAlign: "center",
      contain: true,
      cellSelector: ".ministry"
    });

    // setup ministry carousel click handler
    let ministryLinks = ministryCarousel.querySelectorAll(".ministry--link");
    if (ministryLinks.length) {
      for (let y = 0; y < ministryLinks.length; y++) {
        let teaser = ministryLinks[y].querySelectorAll(".ministry--teaser")[0];
        ministryLinks[y].addEventListener("click", function(evt) {
          if (ministryLinks[y].classList.contains("popup")) {
            evt.preventDefault();
            // do the fancybox stuff to get the teaser
            $.fancybox.open(teaser);
          }
        });
      }
    }
  }

  // setup ministry page click handler
  let ministryPageLinks = document.querySelectorAll(".ministries--block");
  console.log(ministryPageLinks.length);
  if (ministryPageLinks.length) {
    for (let y = 0; y < ministryPageLinks.length; y++) {
      let teaser = ministryPageLinks[y].querySelectorAll(
        ".ministries--block__teaser"
      )[0];
      let link = ministryPageLinks[y].querySelectorAll(
        ".ministries--block__link"
      )[0];
      link.addEventListener("click", function(evt) {
        if (link.classList.contains("popup")) {
          evt.preventDefault();
          // do the fancybox stuff to get the teaser
          $.fancybox.open(teaser);
        }
      });
    }
  }

  // setup ministry page media carousel
  let ministryMedia = document.querySelectorAll(".ministry-media")[0];
  if (ministryMedia) {
    var flkty = new Flickity(ministryMedia, {
      // options
      wrapAround: true,
      cellSelector: ".slide",
      freeScroll: false,
      lazyLoad: false
    });

    let ministrySlides = ministryMedia.querySelectorAll(".slide");
    if (ministrySlides.length) {
      for (let z = 0; z < ministrySlides.length; z++) {
        let media = ministrySlides[z].querySelectorAll(".media__wrapper")[0];
        ministrySlides[z].addEventListener("click", function(evt) {
          evt.preventDefault();
          // do the fancybox stuff to get the teaser
          $.fancybox.open(media);
        });
      }
    }
  }
});
