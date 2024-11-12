<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$cta_menu = new FieldsBuilder('cta_menu',['label' => 'CTA Menu']);
$cta_menu
    ->addFields($anchor_id)
    ->addRepeater('cta_menu_links', [
        'label' => 'CTA Menu Links',
        'max' => 3
    ])
        ->addLink('menu_link_field', [
            'label' => 'Menu Link Field',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => [],
            'wrapper' => [
                'width' => '',
                'class' => '',
                'id' => '',
            ],
            'return_format' => 'array',
        ]);

