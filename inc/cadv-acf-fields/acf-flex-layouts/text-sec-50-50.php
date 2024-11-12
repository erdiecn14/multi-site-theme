<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$text_sec_50_50 = new FieldsBuilder('text_sec_50_50',['label' => 'Text Section 60/40']);
$text_sec_50_50 
    ->addFields($anchor_id)
    ->addFields($background_color)
    ->addColorPicker('heading_color', [
        'label' => 'Choose heading color for left text box',
        'wrapper'=>[
            'width'=>'50',
        ]
    ])
    ->addColorPicker('heading_color_right', [
        'label' => 'Choose heading color for right text box',
        'wrapper'=>[
            'width'=>'50',
        ]
    ])
    ->addWysiwyg('left_text_area', [
        'label' => 'Left Text Area - 40',
        'wrapper' => [
            'width' => '50',
            'class' => '',
            'id' => '',
        ],
    ])
    ->addWysiwyg('right_text_area', [
        'label' => 'Right Text Area - 60',
        'wrapper' => [
            'width' => '50',
            'class' => '',
            'id' => '',
        ],
    ]);
