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

  // setup resources page media carousel
  let resourcesMedia = document.querySelectorAll(".resources-media")[0];
  if (resourcesMedia) {
    var flkty = new Flickity(resourcesMedia, {
      // options
      wrapAround: true,
      cellSelector: ".slide",
      freeScroll: false,
      lazyLoad: false
    });

    let resourceSlides = resourcesMedia.querySelectorAll(".slide");
    if (resourceSlides.length) {
      for (let z = 0; z < resourceSlides.length; z++) {
        let media = resourceSlides[z].querySelectorAll(".media__wrapper")[0];
        resourceSlides[z].addEventListener("click", function(evt) {
          evt.preventDefault();
          if (media.classList.contains("link")) {
            let location = media.getAttribute("data-link");
            window.open(location, "_blank");
          } else {
            // do the fancybox stuff to get the teaser
            $.fancybox.open(media);
          }
        });
      }
    }
  }

  // setup map on contact page
  let mapHolder = document.querySelectorAll(".map--pane")[0];
  let map;
  let sweetwater = new google.maps.LatLng(32.472654, -100.406005);
  function initMap() {
    map = new google.maps.Map(mapHolder, {
      center: sweetwater,
      zoom: 17
    });

    var styles = {
      default: null,
      hide: [
        {
          featureType: "poi",
          stylers: [{ visibility: "off" }]
        }
      ]
    };

    map.setOptions({ styles: styles["hide"] });

    var request = {
      placeId: "ChIJpYyPANoPVoYRTGPkkficyFk",
      fields: ["name", "formatted_address", "place_id", "geometry"]
    };

    var infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);

    service.getDetails(request, function(place, status) {
      if (status === google.maps.places.PlacesServiceStatus.OK) {
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });
        google.maps.event.addListener(marker, "click", function() {
          infowindow.setContent(
            "<div><strong>" +
              place.name +
              "</strong><br>" +
              place.formatted_address +
              "</div>"
          );
          infowindow.open(map, this);
        });

        google.maps.event.trigger(marker, "click");
      }
    });
  }
  if (mapHolder) {
    initMap();
  }

  // SET PLACEHOLDERS ON NINJA FORMS
  // setTimeout(function() {
  //   let forms = document.querySelectorAll(".nf-form-layout");

  //   for (let f = 0; f < forms.length; f++) {
  //     let inputs = forms[f].querySelectorAll("input");
  //     let textareas = forms[f].querySelectorAll("textarea");

  //     for (let i = 0; i < inputs.length; i++) {
  //       let parent = inputs[i].parentNode.parentNode.parentNode;
  //       inputs[i].addEventListener("click", function(evt) {
  //         if ($(this) == "focused") {
  //           parent.classList.add("active");
  //         } else {
  //           $(this).focus();
  //           parent.classList.add("active");
  //         }
  //       });
  //       inputs[i].addEventListener("blur", function(evt) {
  //         parent.classList.remove("active");
  //       });
  //     }

  //     for (let i = 0; i < textareas.length; i++) {
  //       let parent = textareas[i].parentNode.parentNode.parentNode;
  //       textareas[i].addEventListener("focus", function(evt) {
  //         parent.classList.add("active");
  //       });
  //       textareas[i].addEventListener("blur", function(evt) {
  //         parent.classList.remove("active");
  //       });
  //     }
  //   }
  // }, 2000);
});
