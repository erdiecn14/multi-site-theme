<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$footer_options = new FieldsBuilder('footer_options');
$footer_options
	->addTab('footer_options')
		->addGroup('footer_options')
			->addFields($anchor_id)
			->addFields($background_color)
			->addImage('footer_logo',[
				'return_format' => 'id',
			])
			->addTrueFalse('pet_friendly', [
				'label' => 'Is this community pet friendly?',
				'default_value' => 0,
				'ui' => 1,
			])
		->endGroup()
		->addText('instagram_feed')	
		->addGroup('cta_contact')
			->addImage('contact_image', [
				'label' => 'Contact Image',
				'return_format' => "id",
				'wrapper' => [
					'width' => '50%',
					'class' => '',
					'id' => '',
				],
			])
			->addWysiwyg('contact_form', [
				'label' => 'Contact Form',
				'wrapper' => [
					'width' => '50%',
					'class' => '',
					'id' => '',
				],
			])
			->addSelect('gform_picker', [
				'label' => 'Gravity Form Picker',
			]);
