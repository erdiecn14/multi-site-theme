<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$map_section = new FieldsBuilder('map_section');
$map_section
  ->addFields($anchor_id)
  ->addText('map_shortcode', [
    'label' => 'Map Shortcode'
  ])
  ->addFields($cta);