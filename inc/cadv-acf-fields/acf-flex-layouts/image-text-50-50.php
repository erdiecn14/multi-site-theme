<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$toggle_image_50_50 = new FieldsBuilder('image_text_50_50',['label' => 'Image Text 50/50']);
$toggle_image_50_50 
    ->addFields($anchor_id)
    ->addFields($background_color)
    ->addColorPicker('subhead_color', [
        'label' => 'Choose Heading color',
    ])
    ->addImage('half_width_image', [
        'label' => 'Half Width Image',
        'return_format' => "id",
        'wrapper' => [
            'width' => '50',
            'class' => '',
            'id' => '',
        ]
    ])

    ->addWysiwyg('half_width_text', [
        'label' => 'Copy',
        'wrapper' => [
            'width' => '50',
            'class' => '',
            'id' => '',
        ],

        
    ])

    ->addFields($cta);
