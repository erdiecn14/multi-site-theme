(function() {

  if (typeof knockDoorway != "undefined" && knockDoorway != null) {
    let knockScheduleButtons = [].slice.call(document.getElementsByClassName('knock-schedule-loader'));  
    let allPageLinks = [].slice.call(document.getElementsByTagName('A'));

    let onlyScheduleLinksFromPage = function(currentLink) {
      let linkRef = currentLink.getAttribute('href');
      let nonexistant = -1;
      if (linkRef) {
        if (linkRef.split('/').indexOf('knockrentals.com') !== nonexistant) {
          return false;
        }
        if (
          linkRef.split('/').indexOf('schedule-a-tour') !== nonexistant 
          || currentLink.innerHTML.toLowerCase() ===  'schedule a tour'
        ) {
          return true;
        }
      } 
      return false;
    }

    let eventActionConverter = function(action) {
      return function(el) { 
        return el.addEventListener('click', action);
      }
    };

    let convertToKnockSchedulerLoader = eventActionConverter(function(event) { 
      event.preventDefault(); 
      knockDoorway.openScheduling();
    }); 

    // filter to only get schedule links and override the click action to load knock modal 
    allPageLinks.filter(onlyScheduleLinksFromPage,[]).map(convertToKnockSchedulerLoader);

    // override click action for all links with .knock-schedule-loader class to load knock modal
    knockScheduleButtons.map(convertToKnockSchedulerLoader);
  }

})();