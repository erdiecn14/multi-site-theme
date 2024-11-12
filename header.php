<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CADV_Student_Community
 */

/// ACF Vars
$application_portal = get_field('application_portal', 'option');
$application_portal = is_array($application_portal) ? $application_portal : array();
$application_portal['title'] = !empty($application_portal['title']) ?? null ? $application_portal['title'] : 'Apply Now';

$phone_in_menu = get_field('phone_in_menu', 'option');
$phone_number = get_field('phone_number', 'option');
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

<!---------------------------------------------
  THESE @FONT-FACE RULES BELOW are for the CAPROP global font poppins
	DO NOT REMOVE!!!!!!!! 
	NOTE: @FONT-FACE RULES FOR CAMPAIGNS HAVE MOVED TO THE EMAIL LP TEMPLATES FOUND IN
	page-templates/<email-campaign-name>.php
-->
<style>
/* poppins-100 - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: normal;
	font-weight: 100;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-100.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-100italic - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: italic;
	font-weight: 100;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-100italic.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-200 - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: normal;
	font-weight: 200;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-200.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-200italic - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: italic;
	font-weight: 200;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-200italic.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-300 - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: normal;
	font-weight: 300;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-300.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-300italic - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: italic;
	font-weight: 300;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-300italic.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-regular - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: normal;
	font-weight: 400;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-regular.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-italic - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: italic;
	font-weight: 400;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-italic.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-500 - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: normal;
	font-weight: 500;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-500.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-500italic - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: italic;
	font-weight: 500;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-500italic.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-600 - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: normal;
	font-weight: 600;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-600.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-600italic - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: italic;
	font-weight: 600;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-600italic.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-700 - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: normal;
	font-weight: 700;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-700.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-700italic - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: italic;
	font-weight: 700;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-700italic.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-800 - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: normal;
	font-weight: 800;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-800.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-800italic - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: italic;
	font-weight: 800;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-800italic.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-900 - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: normal;
	font-weight: 900;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-900.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}

/* poppins-900italic - latin */
@font-face {
	font-display: swap;
	/* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
	font-family: 'Poppins';
	font-style: italic;
	font-weight: 900;
	src: url('/wp-content/themes/cadv-community/assets/global-fonts/poppins-v21-latin-900italic.woff2') format('woff2');
	/* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
}  
</style>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div id="page" class="site">
    <header id="header">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'cadv-community'); ?></a>
    <nav id="site-navigation" class="main-navigation" aria-label="primary navigation">
      <div class="top-logo-desktop">
        <?php the_custom_logo(); ?>
      </div>

      <div class="header-right">
        <?php if ( $phone_in_menu == true ) : ?>
          <a href="tel:<?= $phone_number ?>" class="nav-phone"><?= $phone_number ?></a> 
        <?php endif; ?>
        <?php if (array_key_exists('url', $application_portal) && false == empty($application_portal['url'])) : ?> 
          <a 
            class='main-nav-cta' 
            href="<?php echo $application_portal['url']; ?>" 
            target="<?php echo $application_portal['target']; ?>"
            <?php if ($application_portal['target'] == '_blank') : ?>
            rel="noopener nofollow"
            title="external link opens in a new tab"
            <?php endif; ?>
          >
            <?php echo $application_portal['title']; 
            ?>
          </a>
        <?php endif; ?>
        <?php get_template_part('template-parts/main-menu/main-menu', 'hamburger-button', ['menu_ids' => "primary-menu"]); ?>
      </div>

      <div class="nav-menu-wrapper">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            //   'walker' => new Cadv_Top_Nav_walker()
          )
        );
        ?>
      </div> <!-- nav-menu-wrapper -->
    </nav> <!-- #site-navigation -->
	</header><!-- #masthead -->