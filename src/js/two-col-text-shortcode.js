(function($){
    $.fn.twoColumnize = function(options) {
      
      return this.each(function makeColumns(index, element) {
        const $copySection = $(element);
        const $headings = $copySection.find(':header');
        const $groups = $headings.map(function makeGroup(index, heading) {
          const $heading = $(heading);
          const $followingCopy = $(heading).nextUntil(':header');
          const $groupWrapper = $('<div>').addClass('column-group');
          $groupWrapper.append($heading,$followingCopy); 
          return $groupWrapper;
        });
        $groups.each(function addToContainer(index, group) {
          $copySection.append(group);
        })
      });
      
    }
})(jQuery);