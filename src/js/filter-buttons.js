(function($){
  $(document).ready(function() {
    
    function multiFilterHandler(e) {
      let $target = $(e.target);
      let pressed = $target.attr('aria-pressed') === 'true';
      let $filterableContent = $('.filterable');
      if ( $target.data('filter') === "all" ) {
        $target.attr('aria-pressed','true');
        $target.siblings().attr('aria-pressed','false');
        $filterableContent.prop('hidden',false);
        return this;
      }
      if ( pressed ) {
        // button is being unpressed
        let pressedButtonsCount = $target.siblings('[aria-pressed="true"]').length;
        if ( pressedButtonsCount == 0 ) {
          // no buttons are pressed, press the all button
          $target.siblings('[data-filter="all"]').attr('aria-pressed','true');
          $filterableContent.prop('hidden',false);
          $target.attr('aria-pressed',String(!pressed));
          return this;
        } else {
          // hide the filterable content for the button that was unpressed
          $filterableContent.filter('[data-filter-match="'+$target.data('filter')+'"]').prop('hidden',true);
          $target.attr('aria-pressed',String(!pressed));
          return this;
        } 
      } 
      
      // button is being pressed and it's not all
      // unpress the all button
      $target.siblings('[data-filter="all"]').attr('aria-pressed','false');
      let pressedButtonsCount = $target.siblings('[aria-pressed="true"]').length;
      if (pressedButtonsCount == 0) {
        // it's going to be the the only button pressed
        $filterableContent.prop('hidden',true);
      }
      // unhide filterable content
      $filterableContent.filter('[data-filter-match="'+$target.data('filter')+'"]').prop('hidden',false);
      // change the button state to pressed
      $target.attr('aria-pressed',String(!pressed));
    }
    
    function singleFilterHandler(e) {
      let $target = $(e.target);
      let pressed = $target.attr('aria-pressed') === 'true';
      let $filterableContent = $('.filterable');
      if ( $target.data('filter') === "all" ) {
        // "All" button was pressed
        $target.attr('aria-pressed','true');
        $target.siblings().attr('aria-pressed','false');
        $filterableContent.prop('hidden',false);
        // bail
        return this;
      }
      if ( pressed ) {
        // button is being unpressed
        // now no buttons are pressed, press the all button
        $target.siblings('[data-filter="all"]').attr('aria-pressed','true');
        $filterableContent.prop('hidden',false);
        // toggle pressed state
        $target.attr('aria-pressed',String(!pressed));
        // bail
        return this;
      } 
      
      // ---- button is being pressed and it's not all ----
      // unpress other buttons
      $target.siblings().attr('aria-pressed','false');
      // change the button state to pressed
      $target.attr('aria-pressed',String(!pressed));
      // hide all content 
      $filterableContent.prop('hidden',true);
      // unhide matching filterable content
      $filterableContent.filter('[data-filter-match="'+$target.data('filter')+'"]').prop('hidden',false);
      if ( window.screenSize == 'narrow' ) {
        document.getElementById('filterable-content-section').scrollIntoView(true,{block:'start'});
      }
    } // end single filter handler
    
    $('.filter-button').on('click',singleFilterHandler); // end filter button

    
  });
})(jQuery);