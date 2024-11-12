(function($) {
  $(function afterReady() {
    console.log('building banner...'); 
    
    if (specialsBannerConfig) {
      /**
       * - set req url
       * - make req
       * - check expiration
       * - populate .specials-content-section
       * - set CSS
       * - populate cta
       * - populate global message 
       */
      
      const buildBanner = function(bannerData) {
        const $specialsBanner = $('#specials-banner');
        console.log('Banner Data: ',bannerData.values);
        if (!bannerData.values) {
          console.log('No banner data');
          $specialsBanner.empty();
          return;
        }
        const teaserCopy = bannerData.values[0][0];
        const headlineCopy = bannerData.values[0][1];
        const buttonCTA = bannerData.values[0][2];
        const buttonLink = bannerData.values[0][3];
        const bannerBg = bannerData.values[0][4] || false;
        const bannerTextColor = bannerData.values[0][5] || false;
        const expires = bannerData.values[0][6];
        let $bannerCopy = '';
        let $bannerCTA = '';
        let timeUntilExpired = 1;
        if (expires) {
          timeUntilExpired = new Date(expires) - Date.now();
        } 
        $specialsBanner.css({
          'background': bannerBg,
          'color' : bannerTextColor
        });
        /* no teaser copy or campaign expired ...  bail out */
        if ((!teaserCopy) || (timeUntilExpired <= 0)) { 
          console.log('Banner offer expired.')
          return true;
        }
        let $teaserCopyElement = $('<p>').addClass('banner-teaser');
        let $specialsContentSection = '';
        if (buttonCTA) {
          $bannerCTA = $('<a>').addClass('button--1').text(buttonCTA).attr('href', buttonLink);
          if (buttonLink === 'knock-schedule' && typeof knockDoorway !== 'undefined') {  
            $bannerCTA.on('click', function(event) {
              event.preventDefault();
              knockDoorway.openScheduling();
            });
          }        
        }
        if (headlineCopy || buttonCTA) {
          $teaserCopyElement = $('<button>')
              .addClass('banner-button')
              .attr({
                'id':'specials-banner-toggle',
                'aria-expanded':'false',
                'aria-controls':'specials-content'
              });
          $teaserCopyElement.on('click', function(e) {
            const $this = $(this);
            const $specialsContent = $('#specials-content');
            let expanded = $this.attr('aria-expanded') == "true"; 
            $(this).attr('aria-expanded',!expanded);
            $specialsContent.prop('hidden',expanded);
          });
          $bannerCopy = $('<p>').addClass('banner-headline').text(headlineCopy).css('color', bannerTextColor);  
          $specialsContentSection = $('<section>')
              .attr('id','specials-content')
              .addClass('specials-content-section stack-1')
              .prop('hidden',true)
              .append($bannerCopy, $bannerCTA);
        }
        const $arrowDecor = $('<span>').addClass('single-arrow').text('>').attr('aria-hidden','true');
        $teaserCopyElement.text(teaserCopy).append($arrowDecor);
        $specialsBanner.append($teaserCopyElement, $specialsContentSection);
      } 
      
      const buildGlobalAnnouncement = function(bannerData, status, err) {
        console.log('ANNOUNCEMENT FROM MANAGEMENT');
      }
      
      const base = 'https://sheets.googleapis.com/v4/spreadsheets/';
      const values = '/values/A2:G2?key=';
      const bannerDataLink = base + specialsBannerConfig.gsheet_id + values + specialsBannerConfig.gsheet_api_key;
      $.ajax({ url: bannerDataLink, dataType: 'json' }) 
        .done(buildBanner)
        .fail(function() { console.log('Error with Google Sheet connection'); })
        .always(buildGlobalAnnouncement); 
    }
    
  });
})(jQuery);