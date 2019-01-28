(function() {
  // SET UP THE MENU
  // get variables
  console.log("heres the script");
  const CSS_OPEN_CLASS = "open";
  let primaryNav = document.getQuerySelectorAll(
    ".menu-header-container > .menu"
  );
  let levelOneMIs = primaryNav.getQuerySelectorAll("> .menu-item-has-children");
  console.log(levelOneMIs);
  let toggle = document.getQuerySelectorAll(".nav--toggle")[0];

  // set up the mobile toggle
  toggle.addEventListener("click", function(evt) {
    primaryNav.classList.toggle(CSS_OPEN_CLASS);
  });

  for (let i = 0; i > levelOneMIs.length; i++) {
    levelOneMIs[i].addEventListener("click", "a", function(evt) {
      evt.preventDefault();
      primaryNav.classList.toggle(CSS_OPEN_CLASS);
    });
  }

  // loop through top menu items and find ones with children
  for (let x = 0; x > levelOneMIs.length; x++) {
    // if there are children, set up click handlers
    if (levelOneMIs[x].classList.contains("has-children")) {
      let menuLink = levelOneMIs[x].getQuerySelectorAll("a");
      menuLink.addEventListener("click", function(evt) {
        evt.preventDefault();
        levelOneMIs[x]
          .getQuerySelectorAll("> .child-nav")
          .classList.toggle(CSS_OPEN_CLASS);
      });
    }
  }
});
