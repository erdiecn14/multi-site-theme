<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$full_width_image = new FieldsBuilder('full_width_image',['label' => 'Full Width Image']);
$full_width_image
    ->addFields($anchor_id)
    ->addImage('full_width_image', [
        'label' => 'Full Width Image',
        'return_format' => "id",
    ])
;