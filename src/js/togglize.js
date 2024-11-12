(function ($) {
  $.fn.togglize = function (options) {
    /**
      Individual lists open and close independently
     */
    const toggleAction = function (event) {
      let $target = $(event.target);
      let $expandableWrapper = event.data.expandableTarget;
      const expanded = $target.attr("aria-expanded") === "true" || false;
      $target.attr("aria-expanded", !expanded);
      $expandableWrapper.prop("hidden", expanded);
      const expandableHeight = $expandableWrapper[0].scrollHeight;
      if (expanded === false && event.data.toggleSettings.animate) {
        $expandableWrapper.css({ "max-height": expandableHeight });
      } else if (expanded === true && event.data.toggleSettings.animate) {
        $expandableWrapper.css({ "max-height": "0" });
      }
    };

    /**
      Only one list can be open at a time. Opening a list closes other open lists.
     */
    const accordionAction = function (event) {
      let $target = $(event.target);
      const expanded = $target.attr("aria-expanded") === "true" || false;
      let $expandableWrapper = event.data.expandableTarget;
      if (expanded === false) {
        // console.log("---expandable height : ", $expandableWrapper[0].scrollHeight);
        $expandableWrapper.prop("hidden", false);
        $expandableWrapper.parent(".toggle-section").siblings(".toggle-section").children(".expandable").prop("hidden", true);
        $expandableWrapper.parent(".toggle-section").siblings(".toggle-section").children(":header").find("button").attr("aria-expanded", false);
        $target.attr("aria-expanded", "true");
        const expandableHeight = $expandableWrapper[0].scrollHeight;
        if (event.data.toggleSettings.animate) {
          $expandableWrapper.parent(".toggle-section").siblings(".toggle-section").children(".expandable").css({ "max-height": "0" });
          // console.log("setting wrapper height to: ", expandableHeight);
          $expandableWrapper.css({ "max-height": expandableHeight });
        }
      }
    };

    const makeButtonAndExpandable = function (index, heading) {
      const $heading = $(heading);
      const headingText = $heading.text();
      const uniqueId = headingText.split(" ").join("-").toLowerCase();
      const $toggleRegion = $("<div>").attr("role", "region").addClass("toggle-section").attr("aria-labelledby", uniqueId);
      const $arrowDecor = $("<span>").addClass("single-arrow").text(">").attr("aria-hidden", "true");
      const $headingButton = $('<h2 class="toggle-heading">').attr("id", uniqueId).append($("<button>").attr("aria-expanded", "false").addClass("togglize-button").text(headingText).append($arrowDecor));
      const $nonHeadings = $heading.nextUntil(":header");
      const $nonHeadingClones = $nonHeadings
        .map(function (index, nonHeading) {
          return $(nonHeading).clone();
        })
        .toArray();
      const $expandableWrapper = $("<div>").addClass("expandable").prop("hidden", true);
      if (settings.animate) {
        $expandableWrapper.css({ "max-height": "0", transition: `max-height ease-in-out ${settings.animateSpeed}`, overflow: "hidden" });
      }
      $expandableWrapper.append($nonHeadingClones);
      if (settings.action == "toggle") {
        $headingButton.on("click", "button", { expandableTarget: $expandableWrapper, toggleSettings: settings }, toggleAction);
      }
      if (settings.action == "accordion") {
        $headingButton.on("click", "button", { expandableTarget: $expandableWrapper, toggleSettings: settings }, accordionAction);
      }
      $toggleRegion.append($headingButton, $expandableWrapper);
      return $toggleRegion;
    };

    const setFixedToggleGroupHeight = function ($toggleGroup, $headingButtons) {
      // Need to set a min height so the layout doesn't shift every time you click a toggle
      // all heading/buttons will be visible and one expandable section will be visible at a time
      // The min height of entire block needs to = total of heading heights + height of tallest expanding section
      // NOTE: the headings can't have any top/bottom margin or it will throw off the calculation because margin isn't included in scroll height
      let expandableHeights = $headingButtons.next(".expandable").map((i, e) => e.scrollHeight);
      let tallestExpandableSectionHeight = Math.max.apply(Math, expandableHeights);
      let totalHeadingsHeight = $.makeArray($headingButtons.map((i, e) => e.scrollHeight)).reduce((prev, curr) => prev + curr);
      let minSectionHeight = totalHeadingsHeight + tallestExpandableSectionHeight;
      $toggleGroup.css({ "min-height": minSectionHeight });
    };

    const initToggles = function (index, element) {
      const $copySection = $(element);
      let $headings = $copySection.find(":header");
      const $toggleRegionCollection = $headings.map(makeButtonAndExpandable).toArray();
      $copySection.empty().append($toggleRegionCollection);
      // copy section was emptied and replaced with new markup, need to reindex headings
      $headings = $copySection.children(".toggle-section").children(".toggle-heading");
      if (settings.adaptiveHeight === false && $(this).data("adapt-height") !== true) {
        setFixedToggleGroupHeight($copySection, $headings);
        $(window).on("resize", function () {
          // console.log("resetting toggle group sizes...");
          setFixedToggleGroupHeight($copySection, $headings);
        });
      }
      let hasFirstOpenAttrAndItsTrue = false;
      if ($(this).data("first-open") !== undefined && $(this).data("first-open") == true) {
        hasFirstOpenAttrAndItsTrue = true;
      }
      if ((settings.firstOpen && hasFirstOpenAttrAndItsTrue) || (settings.firstOpen && $(this).data("first-open") == undefined)) {
        let $firstHeading = $copySection.find(":header").first();
        $firstHeading.find("button").attr("aria-expanded", "true");
        $firstHeading.next(".expandable").prop("hidden", false);
        if (settings.animate) {
          const expandedHeight = $firstHeading.next(".expandable")[0].scrollHeight;
          $firstHeading.next(".expandable").css({ "max-height": expandedHeight });
        }
      }
    };

    const settings = $.extend(
      {
        action: "toggle",
        animate: false,
        animateSpeed: "0.2s",
        firstOpen: true,
        adaptiveHeight: false
      },
      options
    );

    return this.each(initToggles);
  };
})(jQuery);
