document.addEventListener("DOMContentLoaded", function(event) {
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

  // initialize ministires carousel
  var elem = document.querySelector(".carousel");
  var flkty = new Flickity(elem, {
    // options
    cellAlign: "left",
    contain: true,
    cellSelector: ".ministry"
  });
});
