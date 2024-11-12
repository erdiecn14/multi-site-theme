<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$two_pane_gallery = new FieldsBuilder('two_pane_gallery');
$two_pane_gallery 
    ->addFields($anchor_id)
    ->addFields($linear_background_colors)
    ->addRadio('move_left_right', [
        'label' => 'What side does the gallery need to be on?',
        'instructions' => '',
        'wrapper' => [
          'width' => '',
          'class' => '',
          'id' => '',
        ],
        'choices' => ['left','right'],
      ])
    ->addImage('big_image_two_pane', [
        'label' => 'Two Pane Gallery: Big Image',
        'return_format' => "id",
        'wrapper' => [
            'width' => '60%',
            'class' => '',
            'id' => '',
        ],
    ])
    ->addImage('small_image_two_pane', [
        'label' => 'Two Pane Gallery: Small Image',
        'return_format' => "id",
        'wrapper' => [
            'width' => '40%',
            'class' => '',
            'id' => '',
        ],
    ]);
    