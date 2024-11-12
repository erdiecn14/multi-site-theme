<?php

use StoutLogic\AcfBuilder\FieldsBuilder;
  
$the_stacker = new FieldsBuilder('the_stacker');
$the_stacker 
    ->addFields($anchor_id)
    ->addFields($background_color)
		->addRepeater('the_stacker',[
			'max' => '3',
		])
    	->addWysiwyg('stacker_column')
		->endRepeater();

