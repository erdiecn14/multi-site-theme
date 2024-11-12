<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$contact_info = new FieldsBuilder('contact_info');
$contact_info
	->addTab('contact_info')
		->addLink('application_portal')
		->addLink('resident_portal',[
			'wrapper' => [
				'width' => '40',
				'class' => '',
				'id' => '',
		],
		])
		->addTrueFalse('additional_resident_portal_link_toggle', [
			'label' => 'Additional Resident Portal Link',
			'instructions' => 'Toggle on only if this site is shared by two entities and you need two resident portals',
			'required' => 0,
			'conditional_logic' => [],
			'wrapper' => [
					'width' => '20',
					'class' => '',
					'id' => '',
			],
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'On',
			'ui_off_text' => 'Off',
		])
		->addLink('additional_resident_portal_link',[
			'instructions' => 'Use only if this site is shared by two entities',
			'wrapper' => [
				'width' => '40',
				'class' => '',
				'id' => '',
		],
		])
			->conditional('additional_resident_portal_link_toggle', '==' , '1')
		->addGroup('address_information')
			->addText('street')
			->addText('city_state', [
				'label' => 'City, State Zip',
				])
			->endGroup() //<-- End address info
		->addText('phone_number')
		->addTrueFalse('phone_in_menu', [
			'label' => 'Put phone number in nav bar?',
			'default_value' => 0,
		])
		->addText('email')
			
		->addWysiwyg('office_hours', [
			'label' => 'Office Hours',
			])

		->addGroup('social_links')
			->addLink('facebook')
			->addLink('instagram',['instructions'=>'Please add the instagram handle as the title of this URL. This title is displayed in the instagram footer.'])
			->addLink('linkedin',[
				'label' => 'LinkedIn',
			])
			->addLink('twitter')
			->addLink('youtube',[
				'label' => 'You Tube',
			])
			->addLink('tiktok',[
				'label' => 'Tik Tok',
			])
		->endGroup();//social links
		