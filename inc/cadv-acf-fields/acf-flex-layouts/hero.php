<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$hero = new FieldsBuilder('hero');
$hero
  ->addTab('hero_content')
    ->addFields($anchor_id, ['wrapper' => [
      'width' => '100',
      'class' => '',
      'id' => '',
    ],])
    ->addText('h1_text')
    ->addRadio('type_hero', [
      'label' => 'Where is this hero located: Top of the page or the interior of the page? ',
      'instructions' => '',
      'choices' => ['top','interior'],
      'wrapper' => [
        'width' => '50',
        'class' => '',
        'id' => '',
      ],
    ])
    ->addRadio('move_left_right', [
      'label' => 'What side does the headline need to be on?',
      'instructions' => '',
      'wrapper' => [
        'width' => '50',
        'class' => '',
        'id' => '',
      ],
      'choices' => ['left','right'],
    ])
    ->addFields($cta)
  ->addTab('hero_settings')  
    ->addFields($media_options, ['wrapper' => [
      'width' => '100%',
      'class' => '',
      'id' => '',
    ],])
  ->addTab('internal_parallax') 
    ->addImage('parallax_image', [
      'label' => 'Parallax Image',
      'instructions' => 'If using this effect, this will be the only image seen, not the background image',
      'return_format' => "url",
    ])
    
  ->addTab('hero_popup')    
    ->addGroup('hero_popup')   
      ->addFields($background_color)
      ->addImage('hero_popup_image', [
        'label' => 'Hero Popup Image',
        'return_format' => "id",
    ])
      ->addText('hero_popup_header',[
        'instructions' => 'This field is required',
        'return_format' => "id",
    ])
      ->addTextarea('hero_popup_text')    
  ->endGroup()  
;


