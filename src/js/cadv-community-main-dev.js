import "./navigation";
// import 'SLICK/slick.min.js';
import "../third-party/accessible-slick/slick";
import "../third-party/magnific-popup/jquery.magnific-popup.min";
// import '/jquery.magnific-popup.js';
import "./filter-buttons";
import "./two-col-text-shortcode";
import "./specials-banner";
import "./togglize";
import "./knock-modal-links";
import "./lyst_knock_api";
// import "../third-party/sal-master/dist/sal"
// import { sal } from "../third-party/sal-master";
import sal from "sal.js";
import "../js-email-campaign/email-campaign";

window.noMotion = false;

/**
 * Flag Prefers Reduced Motion
 */
const reducedMotionMediaQuery = window.matchMedia("(prefers-reduced-motion: reduce)");
if (!reducedMotionMediaQuery || reducedMotionMediaQuery.matches) {
  window.noMotion = true;
}

sal({
  disabled: window.noMotion ? true : false,
  threshold: 0.1
});

(function ($) {
  $(function documentIsReady() {
    // make sure document fully loaded

    function reduceAllMotion() {
      console.log("reducing motion...");
      $("video").prop("autoplay", false).trigger("pause").siblings(".video-control-button-container").find(".video-control-button").attr("aria-label", "play");
      window.noMotion = true;
    }

    if (window.noMotion) {
      reduceAllMotion();
    }

    $("#prospect-button").click(function () {
      // console.log("click click");
      $("#prospect-form-reveal").show();
    });

    $("#jump-to-renew").click(function () {
      console.log("CLick clack");
      $("html, body").animate(
        {
          scrollTop: $("#renewal-form").offset().top - 150
        },
        500
      );
    });

    /**
     * Fix role of list of category filter checkboxes on google map
     */
    $("ul.wpgmza_cat_checkbox_item_holder").attr({
      role: "group",
      "aria-label": "Map pin category  filters"
    });

    /**
     * add role presentation to pattern images
     * this isn't actually required but silly audit tools report errors if alt is empty
     */
    $(".background-pattern-right").children("img").attr("aria-hidden", "true");
    $(".background-pattern-left").children("img").attr("aria-hidden", "true");

    // $(".call-out-text").each(function (index, element) {
    //   let $callOut = $(element);
    //   if (!$callOut.is(":header")) {
    //     let $associatedHeading = $(element).parents("section").first().find(":header").first();
    //     if ($associatedHeading.length > 0) {
    //       console.log("has assoc heading: ", $associatedHeading);
    //       $callOut.attr("aria-labelledby", $associatedHeading.text().split(" ").join("-"));
    //       $associatedHeading.attr("id", $associatedHeading.text().split(" ").join("-"));
    //     } else {
    //       $callOut.replaceWith($("<h1>").addClass("call-out-text").html($callOut.html()));
    //     }
    //   }
    // });

    $(".featured-fp-card").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      rows: 0,
      lazyLoad: "ondemand",
      arrows: true,
      dots: true,
      cssEase: window.noMotion ? "unset" : "ease",
      regionLabel: "featured floor plan carousel",
      lazyLoad: 'ondemand',
      responsive: [
        {
          breakpoint: 980,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            rows: 0,
            lazyLoad: "ondemand",
            arrows: false,
            dots: true
          }
        }
      ]
    });

    $(".grid-gallery").each(function (e) {
      $(this).magnificPopup({
        delegate: "a",
        type: "image",
        image: {
          titleSrc: function (item) {
            // lightbox images are not setup with the title attribute
            // so this will return nothing, which is what we want for now
            return item.el.find("img").attr("title");
          }
        },
        closeMarkup: '<button title="%title%" type="button" class="mfp-close"><span aria-hidden="true">&#215;</span></button>',
        tClose: "Close Lightbox (Esc)",
        closeOnContentClick: true,
        gallery: {
          enabled: true
        }
      });
    });

    $(".cadv-lightbox-image").magnificPopup({
      type: "image",
      image: {
        titleSrc: function (item) {
          // lightbox images are not setup with the title attribute
          // so this will return nothing, which is what we want for now
          return item.el.find("img").attr("title");
        }
      },
      closeMarkup: '<button title="%title%" type="button" class="mfp-close"><span aria-hidden="true">&#215;</span></button>',
      tClose: "Close Lightbox (Esc)",
      closeOnContentClick: true
    });

    let $toggles = $(".togglize-me").togglize({
      action: "toggle",
      animate: window.noMotion ? false : true,
      animateSpeed: "1s",
      firstOpen: false
    });
    let $accordions = $(".accordionize-me").togglize({
      action: "accordion",
      animate: window.noMotion ? false : true,
      animateSpeed: "0.75s"
    });

    let twoCols = $(".two-col-content").twoColumnize();

    $(".video-control-button").on("click", function (e) {
      let $this = $(this);
      let label = $this.attr("aria-label");
      if (label === "play") {
        $this.attr("aria-label", "pause");
        $this.parent().siblings("video").trigger("play");
      } else {
        $this.attr("aria-label", "play");
        $this.parent().siblings("video").trigger("pause");
      }
      // console.log("video: ", $this.parent().siblings("video"));
    });

    const $siteNav = $("#site-navigation");
    const $primaryNavToggle = $("#primary-nav-toggle");

    $primaryNavToggle.on("click", function (e) {
      let $button = $(this);
      let expanded = $button.attr("aria-expanded") == "true";
    });

    let closeMenu = function ($toggleButton, focusButton = false) {
      $toggleButton.attr("aria-expanded", false);
      $siteNav.removeClass("toggled");
      if (focusButton) {
        $toggleButton.focus();
      }
      return this;
    };

    $siteNav.on("keyup", function (e) {
      const ESC = 27;
      let expanded = $primaryNavToggle.attr("aria-expanded") == "true";
      if (!expanded) {
        return;
      }

      if (e.keyCode == ESC) {
        closeMenu($primaryNavToggle, true);
      }
    });

    $siteNav.find("#primary-menu").on("focusout", function (e) {
      let $navButton = $siteNav.find("#primary-nav-toggle");
      if ($navButton.attr("aria-expanded") == "false") {
        return;
      }
      if ($(e.relatedTarget).parent().hasClass("menu-item") == false) {
        closeMenu($navButton, false);
      }
    });

    $(".tour-launcher").click(function () {
      let toursrc = $(this).data("tour-src");
      console.log(toursrc);
      $.magnificPopup.open({
        items: {
          src: "<iframe width=853 height=480 frameborder=0 allowfullscreen=allowfullscreen src=" + toursrc + "></iframe>", // can be a HTML string, jQuery object, or CSS selector
          type: "inline"
        }
      });
    });

    /**
     * Remove erroneous `for=` attribute on captcha field label
     * it doesn't reference the ID of a legit form input
     */
    $(".ginput_recaptcha").siblings("label").removeAttr("for");

    /**
     * Fix Instagram links that open in new tab
     */
    let instagramPhotoLinks = $("#sb_instagram").find("a.sbi_photo");
    instagramPhotoLinks.each(function (index, element) {
      let $element = $(element);
      if ($element.attr("target") == "_blank") {
        $element.attr("title", "external link opens photo on Instagram page in new tab");
      }
    });

    // This block removes .menu-open from body
    // when click happens outside of the open menu
    // This block has an issue: you cannot click menu items as is
    // $(document).click(function (e) {
    //   // Check if click was triggered on or within #site-navigation
    //   if ($(e.target).closest("#site-navigation").length > 0) {
    //     return false;
    //   }

    //   // Otherwise
    //   // trigger your click function
    //   $("body:not(menu-item)").removeClass("menu-open");
    // });
  }); // Document Fully Loaded
})(jQuery);
