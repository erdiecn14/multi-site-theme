<?php

/**
 * FLOOR PLANS PAGE 
 * Template Name: Floor Plans
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CADV_Student_Community
 */

get_header();

$fp_categories = get_field('fp_categories','option');
$fp_gsheet = get_field('fp_gsheet_data', 'option');
$fp_disclaimer = get_field('fp_disclaimer', 'option');

$application_portal = get_field('application_portal', 'option');
$app_link_target = $application_portal['target'] ? $application_portal['target'] : '_self';
$app_rel_attr = $app_link_target == '_blank' ? 'rel="noopener"' : '';

$fp_js_data = 'const fp_sheet = ' . json_encode( array(
    'sheet_id'=> $fp_gsheet['sheet_id'],
    'sheet_range' => $fp_gsheet['range'],
    'sheet_key' => $fp_gsheet['api_key']
) ) . ';';



?>


<main id="primary" class="site-main">

<?php while (have_posts()) : the_post();
  get_template_part( 'template-parts/content', 'page' ); 		
?>

  <section class="floorplan-page">

    <?php foreach($fp_categories as $fp_categories) : ?>

      <?php if ( $fp_categories['individual_category']['category_title'] == true ) : ?>
        <h2 class="category_title">
          <?php echo $fp_categories['individual_category']['category_title']; ?>
        </h2>
      <?php endif; ?>

      <div class="card-fp">    
        
        <?php foreach($fp_categories['individual_category']['floor_plans'] as $floor_plans) : ?>

          <div class="fp-cards floor-plan" id="<?php echo $floor_plans['fp_unique_id']; ?>">

            <div class="floor-plan__status-banner">
            </div>
            <div class="fp-image">
              <a 
                class="cadv-lightbox-image" 
                href="<?php echo wp_get_attachment_url($floor_plans['fp_image']); ?>"
                aria-haspopup="true"
                title="open image in a lightbox"
              >
                <?php echo wp_get_attachment_image( $floor_plans['fp_image'], 'full'); ?>
              </a>
            </div>

            <div class="fp-info">
              <div class="fp-title">
                <h3><?php echo $floor_plans['fp_title']; ?></h3>
              </div> 
              <div class="fp-bedroom-bathroom">
                <p><?php echo $floor_plans['fp_bedroom_bathroom']; ?></p>
              </div>
              <div class="fp-rates">
              </div>

              <?php if (false === empty($floor_plans['fp_square_footage'])) : ?>

                <div class="fp-square-footage">
                  <p><?php echo $floor_plans['fp_square_footage']; ?></p>
                </div>  

              <?php endif; ?>

              <?php if($floor_plans['misc_text']) : ?>
                
                <div class="misc-text" >
                  <p><?php echo $floor_plans['misc_text']['misc_text_area']; ?></p>
                </div>
              <?php endif; ?>  

              <?php 
                $link_one = $floor_plans['custom_links']['link_one'];
                $link_two = $floor_plans['custom_links']['link_two'];
                $link_one_target = $link_one['target'] ? $link_one['target'] : '_self' ?? null;
                $link_rel_attr = $link_one_target == '_blank' ? 'rel="noopener"' : '';
                $link_two_target = '_self';
                if(!empty($link_two)) {
                  $link_two_target = $link_two['target'] ? $link_two['target'] : '_self';
                  $link_two_rel_attr = $link_two_target == '_blank' ? 'rel="noopener"' : '';
                }
              ?>

              <?php
              // only ONE custom cta link
              if (
                true == $floor_plans['custom_links']['custom_link_toggle'] && 
                !empty($link_one['url']) && 
                empty($link_two['url'])
              ) : 
              ?>

                <div class="fp-card-apply-button bg-1">
                  <a 
                    href="<?= $link_one['url']; ?>" 
                    target="<?php echo esc_attr($link_rel_attr); ?>"
                    <?php if (false == empty($left_text_area['accessibility_text'])) : ?>
                    aria-label="<?php echo $left_text_area['accessibility_text']; ?>"
                    <?php endif; ?>
                    <?php if ($link_one_target == '_blank') : ?>
                    title="external link opens in a new tab"
                    <?php endif; ?>
                  >
                    <?php echo $link_one['title']; ?>
                  </a>
                </div>

              <?php 
              // TWO custom cta links
              elseif (
                true == $floor_plans['custom_links']['custom_link_toggle'] && 
                !empty($link_one['url']) &&
                !empty($link_two['url'])
              ) : 
              ?>

                <div class="dual-ctas">
                  <a 
                    href="<?= $link_one['url']; ?>" 
                    class="fp-card-apply-button bg-1" 
                    <?php if (false == empty($left_text_area['accessibility_text'])) : ?>
                    aria-label="<?php echo $left_text_area['accessibility_text']; ?>"
                    <?php endif; ?>
                    target="<?php echo esc_attr($link_rel_attr); ?>"
                    <?php if ($link_one_target == '_blank') : ?>
                    title="external link opens in a new tab"
                    <?php endif; ?>
                  >
                    <?php echo $link_one['title']; ?>
                  </a>
                  <a 
                    href="<?= $link_two['url']; ?>" 
                    class="fp-card-apply-button bg-1" 
                    <?php if (false == empty($left_text_area['accessibility_text'])) : ?>
                    aria-label="<?php echo $left_text_area['accessibility_text']; ?>"
                    <?php endif; ?>
                    target="<?php echo esc_attr($link_two_rel_attr); ?>"
                    <?php if ($link_two_target == '_blank') : ?>
                    title="external link opens in a new tab"
                    <?php endif; ?>
                  >
                    <?php echo $link_two['title']; ?>
                  </a>
                </div>

              <?php else : // NO custom cta link ?>

                <div class="fp-card-apply-button bg-1">
                  <a 
                    href="<?php echo $application_portal['url']; ?>" 
                    target="<?php echo esc_attr($app_link_target); ?>"
                    <?php if (false == empty($left_text_area['accessibility_text'])) : ?>
                    aria-label="<?php echo $left_text_area['accessibility_text']; ?>"
                    <?php endif; ?>
                    <?php if ($app_link_target == '_blank') : ?>
                    title="external link opens in a new tab"
                    <?php endif; ?>
                  >
                    Apply Now
                  </a>
                </div> 

              <?php endif; ?>

            </div> <!-- .fp-info -->  
          </div> <!-- .fp-cards -->  
            
        <?php endforeach; // floor plans loop ?>  

      </div> <!-- .card-fp --> 

    <?php endforeach; // categories loop ?>
            
    <?php 
    $aside_content = get_the_content();
    if(!empty($aside_content)) : ?>
    <div class="aside-announcement">
      <?php the_content(); ?> 
    </div>
    <?php endif; ?>     
            
    <div class="rate-detail-text">
      <p class="small-text-sc">
        <?php echo $fp_disclaimer ?>
      </p>
      <p class="small-text-sc">
        *Rates/installments do not represent a monthly rental amount, but rather the total base rent due for the lease term divided by the number of installments. Rates/installments, fees, caps, promotions, deadlines, amenities, and utilities are subject to change without notice. Contact the office for details.
      </p>
      <p class="small-text-sc">
        *Renderings are an artist's conception and are intended only as a general reference. Features, materials, finishes, and layout of subject unit may be different than shown.
      </p>
    </div>

    <section class="insurance">
      <div style="padding: 3em calc(1em + 2%); text-align: center;">
        <p style="text-align: center; max-width: none;">
          <a title="external link opens in a new tab" style="text-decoration: underline; color: black;" href="https://campusadvantage.confirminsurance.com" target="_blank" rel="noopener">Campus Advantage Insurance Waiver Program Information</a><br />If you would like to provide your own liability insurance, please 
          <a title="external link opens in a new tab" style="text-decoration: underline; color: black;" href="https://campusadvantage.confirminsurance.com/opt-out" target="_blank" rel="noopener">click here to opt out of the Insurance Waiver Program</a>.
        </p>
      </div>
    </section>

  </section> <!-- .floorplan-page -->

  <?php endwhile; // End of the loop. ?>

</main><!-- #main -->
      
<script>

<?php echo $fp_js_data; ?>

(function($) {
  $(document).ready(function() { 
    let googleSheetId = fp_sheet['sheet_id'];
    let apiKey = fp_sheet['sheet_key'];
    let cellRange = fp_sheet['sheet_range'];
    let googleRatesSheetLink = 'https://sheets.googleapis.com/v4/spreadsheets/'+googleSheetId+'/values/'+cellRange+'?key='+apiKey;
    $.ajax({
      url: googleRatesSheetLink,
      dataType: "json"
    })
    .done(function addRatesToPage(data) {
      let lowerCaseKeysArray = data.values.shift().map(
          function makeLowerCase(key) {
            return key.toLowerCase();
          }
      );
      let valuesArray = data.values;
      let rateIndex = lowerCaseKeysArray.indexOf("rate");
      let fpCodeIndex = lowerCaseKeysArray.indexOf("fp code");
      let statusBannerIndex = lowerCaseKeysArray.indexOf("status banner"); 
      let strikeRateIndex = lowerCaseKeysArray.indexOf("strikethrough rate"); 
      let floorPlanDataByCode = valuesArray.reduce(
          function(ratesObject, floorPlanDataArray, index) {
            const fpData = {
              rate: floorPlanDataArray[rateIndex],
              statusBannerMessage: floorPlanDataArray[statusBannerIndex],
              strikeRate: floorPlanDataArray[strikeRateIndex],
            }
            ratesObject[floorPlanDataArray[fpCodeIndex]] = fpData;
            return ratesObject;
          },
          {}
      );
      $('.floor-plan').each(function replaceRate(index) {
        let fpCode = $(this).attr('id').slice(3);
        let $currentRate = '';
        let $strikeRate = '';
        let $statusBanner = '';
        if (floorPlanDataByCode[fpCode]) {
          $ratesContainer = $(this).find('.fp-rates');
          if (floorPlanDataByCode[fpCode].strikeRate) {
            $strikeRate = $('<p>').addClass('fp-strike-rate').text(floorPlanDataByCode[fpCode].strikeRate);
          }
          if (floorPlanDataByCode[fpCode].rate) {
            $currentRate = $('<p>').addClass('fp-live-rate').text(floorPlanDataByCode[fpCode].rate);
          }
          if (floorPlanDataByCode[fpCode].statusBannerMessage) {
            $statusBanner = $('<div>').addClass('status-banner').text(floorPlanDataByCode[fpCode].statusBannerMessage);
          }
          $ratesContainer.append($strikeRate, $currentRate);
          $(this).append($statusBanner);
        }
      });
    }); //end ajax done
  });
})(jQuery);
</script>

<?php
// get_sidebar();

get_footer();

