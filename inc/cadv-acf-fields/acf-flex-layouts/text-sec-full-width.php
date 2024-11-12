<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$text_sec_full_width = new FieldsBuilder('text_sec_full_width',['label' => 'Text Section Full Width']);
$text_sec_full_width 
    ->addFields($anchor_id)
    ->addFields($background_color)
    ->addText('disclaimer')
    ->addColorPicker('heading_color', [
        'label' => 'Choose Heading color',
    ])
    ->addWysiwyg('full_width_text_area', [
        'label' => 'Full Width Text Area',
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],

    ])
    ->addFields($cta);
