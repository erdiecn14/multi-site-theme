<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$testimonial_cards = new FieldsBuilder('testimonial_cards');
$testimonial_cards 
    ->addFields($anchor_id)
    ->addColorPicker('heading_color', [
        'label' => 'Choose Heading color',
    ])
    ->addWysiwyg('20p_text_area', [
        'label' => 'Left Text Area',
        'wrapper' => [
            'width' => '30',
            'class' => '',
            'id' => '',
        ],
    ])

    ->addRepeater('80p_width_cards', [
        'label' => 'Right Text Area - Cards`',
        'wrapper' => [
            'width' => '70',
            'class' => '',
            'id' => '',
        ] ])
        ->addWysiwyg('copy_text', [
            'label' => 'Testimonial Copy',
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
        ])
        ->addText('name_text',[
            'label' => 'Testimonial Name',
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ]
            ])
        
           
            ->endRepeater() ; 
