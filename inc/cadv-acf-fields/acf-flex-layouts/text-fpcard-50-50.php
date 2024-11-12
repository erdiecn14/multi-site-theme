<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$text_fpcard_50_50 = new FieldsBuilder('text_fpcard_50_50',['label' => 'Text and Floor Plan Card Section']);
$text_fpcard_50_50 
    ->addFields($anchor_id)
    ->addFields($background_color)
    ->addGroup('left_text_area', [
        'label' => 'Left Text Area',
        'sub_fields' => [],
    ])
        ->addColorPicker('heading_color', [
            'label' => 'Choose heading color',
        ])
        ->addWysiwyg('half_width_text', [
            'label' => 'Half width text area',
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],

        ])
        ->addLink('fp_card_section_button', [
            'label' => 'Menu link',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => [],
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'return_format' => 'array',
        ])
        ->addText('accessibility_text',[
            'label' => 'Optional Accessibility Text'
        ])
        ->addColorPicker('button_color_picker', [
            'label' => 'Button color picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => [],
            'wrapper' => [
                'width' => '50',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
        ])
        ->endGroup()

    ->addRepeater('floor_plan_card', [
        'label' => 'Floor plan card',
        'sub_fields' => [],
        ])
            ->addImage('fp_image', [
                'label' => 'Floor plan image',
                'return_format' => "id",
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ]
         
        ])
            ->addText('fp_title',[
                'label' => 'Floor Plan Title',
                'wrapper' => [
                    'width' => '25%',
                    'class' => '',
                    'id' => '',
                ]
                ])
            ->addText('fp_bedroom_bathroom',[
                'label' => 'Bedroom(s)/Bathroom(s)',
                'wrapper' => [
                    'width' => '25%',
                    'class' => '',
                    'id' => '',
                ]
                ])
            ->addText('fp_square_footage',[
                'label' => 'Square Footage',
                'wrapper' => [
                    'width' => '25%',
                    'class' => '',
                    'id' => '',
                ]
                ])
            ->addText('fp_unique_id',[
                'label' => 'Unique ID',
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ]
                ])  

    ->endRepeater() ;      