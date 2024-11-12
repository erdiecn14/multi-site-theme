<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$text_sec_true_50_50 = new FieldsBuilder('text_sec_true_50_50',['label' => 'Text Section 50/50']);
$text_sec_true_50_50 
    ->addFields($anchor_id)
    ->addFields($background_color)
    ->addColorPicker('heading_color', [
        'label' => 'Choose heading color for left text box',
    ])
    ->addColorPicker('heading_color_right', [
        'label' => 'Choose heading color for right text box',
    ])
		->addFields($section_heading)
    ->addWysiwyg('left_text_area', [
        'label' => 'Left Text Area - 50',
        'wrapper' => [
            'width' => '50',
            'class' => '',
            'id' => '',
        ],
    ])
    ->addWysiwyg('right_text_area', [
        'label' => 'Right Text Area - 50',
        'wrapper' => [
            'width' => '50',
            'class' => '',
            'id' => '',
        ],
    ]);
