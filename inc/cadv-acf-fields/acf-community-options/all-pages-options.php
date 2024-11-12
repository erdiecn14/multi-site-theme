<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$all_pages_options = new FieldsBuilder('all_pages_options',['position' => 'side']);
$all_pages_options
          ->addGroup('custom_page_options')
          ->addTrueFalse('cta_footer', [
              'label' => 'Show CTA Footer?',
              'default_value' => 1,
              'ui' => 1,
          ])
          ->addTrueFalse('allow_instagram', [
              'label' => 'Show Instagram Feed?',
              'default_value' => 1,
              'ui' => 1,
          ])
          ->endGroup()
          ->setLocation('post_type', '==', 'page')
            ->or('post_type', '==', 'post');
        
add_action('acf/init', function() use ($all_pages_options) {
  acf_add_local_field_group($all_pages_options->build());
});    