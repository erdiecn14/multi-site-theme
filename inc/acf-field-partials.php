<?php

use StoutLogic\AcfBuilder\FieldsBuilder;


// Partial for Anchor IDs
$anchor_id = new FieldsBuilder('anchor_id'); // the string passed to FieldsBuilder() is used to namespace the fields
$anchor_id
  ->addText('anchor_id',[  // the string passed to 1st param of addText() is the field name used to access field content in a template
    'label' => 'Anchor Link ID',
		'wrapper'=>[
			'width'=>'20',
		]
  ]);

// Parital for Background Color
$background_color = new FieldsBuilder('background_color');
$background_color
	->addColorPicker('background_color', [
		'label' => 'Background Color',
		'wrapper'=>[
			'width'=>'50',
		]
	]);

// Parital for Linear Background Color
$linear_background_colors = new FieldsBuilder('linear_background_colors');
$linear_background_colors
	->addGroup('linear_background_colors', [
		'label' => 'Background Color',
	])
		->addColorPicker('color_1',[
			'wrapper'=>[
				'width'=>'50',
			]
		])
		->addColorPicker('color_2',[
			'wrapper'=>[
				'width'=>'50',
			]
		])
	->endGroup();


// Partial for Background Position for Images
$bg_image_position = new FieldsBuilder('bg_position');
$bg_image_position
	->addGroup('background_position',[
		'instructions' => 'Add percentages (ex. 15%) to adjust which part of the image displays.',
	])
		->addText('horizontal')
		->addText('vertical')
	->endGroup();

// Parital for Section Heading
$section_heading = new FieldsBuilder('section_heading');
$section_heading
	->addGroup('section_heading')
		->addWysiwyg('heading',[
			'label' => 'Section Heading',
			'media_upload' => '0',
		])
	->endGroup();


// Partial for CTAs
$cta = new FieldsBuilder('cta');
$cta
	->addGroup('cta',[
		'label' => 'Call to Action','wrapper' => [
			'width' => '50%',
			'class' => '',
			'id' => '',
		  ]
	])
		->addLink('cta_link', [
			'label' => 'CTA Link',
			'return_format' => 'array',
		])
		->addText('accessibility_text',[
			'label' => 'Optional for accessibility text',
		])
		->addColorPicker('button_color_picker', [
            'label' => 'Button Color Picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => [],
            'wrapper' => [
                'width' => '50',
                'class' => '',
                'id' => '',
            ],
            'default_value' => '',
        ]);			

// Partial for URLs
$external_url = new FieldsBuilder('external_url');
$external_url
	->addGroup('external_url',[
		'label' => 'External Link',
	])
		->addUrl('url')
		->addText('accessibility_text',[
			'label' => 'Optional for accessibility text',
		]);		

// Partial for Page Link
$page_link = new FieldsBuilder('page_link');
$page_link
	->addGroup('page_link')
		->addPageLink('link')
		->addText('accessibility_text',[
			'label' => 'Optional for accessibility text',
		]);				


// Partial for Hero with Video
// $hero_video_embed = new FieldsBuilder('hero_video_embed');
// $hero_video_embed
// 	->addGroup('hero_video_embed')
// 		->addOembed('video')
// 	->endGroup();


// Partial for Hero Media Options
$media_options = new FieldsBuilder('media_options');
$media_options
	->addGroup('media_options')
		->addRadio('media_type')
			->addChoices('image', 'embed', 'video')
			
				->addGroup('background_image')
					->conditional('media_type', '==', 'image')
					->addImage('hero_image', [
						'label' => 'Background Image',
						'return_format' => "id",
					])
					->addFields($bg_image_position)
				->endGroup()
			
			->addOembed('embed_video')
				->conditional('media_type', '==', 'embed')

			->addGroup('video')
		
				->conditional('media_type', '==', 'video')
				->addRadio('layout',[
					'instructions' => 'Choose whether it is an autoplay background video or a normal video player with a play button'
				])
					->addChoices(['background' => 'Background Video'], ['inline' => 'Video Player'])
					->addFile('mp4',[
						'return_format' => 'id',
						'mime_types' => '.mp4',
						'wrapper'=>[
							'width'=>'50',
						]
					])
					->addFile('webm',[
						'return_format' => 'id',
						'mime_types' => '.webm',
						'wrapper'=>[
							'width'=>'50',
						]
					])
					->addImage('fallback_image', [
						'label' => 'Fallback Image',
						'instructions' => 'Choose an image to display if the video cannot load',
						'return_format' => 'id',
						'max_size' => '400KB',
						'max_width' => '1920',
						'wrapper'=>[
							'width'=>'50',
						]
					])
					->addImage('poster', [
						'label' => 'Loading Image',
						'instructions' => 'Choose an image to display while the video is loading.<br/>This can be a screenshot of the first video frame.',
						'return_format' => 'id',
						'max_size' => '400KB',
						'max_width' => '1920',
						'wrapper'=>[
							'width'=>'50',
						]
					])		

			->endGroup()
			->addGroup('mobile_video')
				->addFile('mp4', [
				'return_format' => 'id',
				'mime_types' => '.mp4',
				'wrapper'=>[
					'width'=>'50',
				]
				])
				->addFile('webm', [
				'return_format' => 'id',
				'mime_types' => '.webm',
				'wrapper'=>[
					'width'=>'50',
				]
				])
		  ->endGroup()
			->addTextarea('video_description', [
				'label' => 'Video Description',
			])
			
	->endGroup();




// Partial for Hero Media with Options
// $media_options = new FieldsBuilder('media_options');
// $media_options
// 		->addGroup('hero_media_options')
// 			->addFields($hero_image)
// 			->addFields($hero_video_embed)
// 		->endGroup();

// Partial for Shortcodes
$shortcodes = new FieldsBuilder('shortcodes');
$shortcodes
	->addWysiwyg('shortcodes',[
			'label' => 'Add short codes',
			'media_upload' => '0',
			'toolbar' => 'basic',
	]);

// Partial for Twinpane Images
$twinpane = new FieldsBuilder('twinpane');
$twinpane
	->addGroup('twinpane',[
		'label' => 'Twin Pane Images',
	])
		->addGroup('cover_image_left',[
			'wrapper' => [
				'width' => '50',
			]
		])
			->addImage('image_left',[
				'label' => 'Left Side Image',
				'return_format' => "id",
				'wrapper' => [
					'width' => '50',
				]
			])
			->addFields($bg_image_position)
		->endGroup()
		->addGroup('cover_image_right',[
			'wrapper' => [
				'width' => '50',
			]
		])
			->addImage('image_right',[
				'label' => 'Right Side Image',
				'return_format' => "id",
				'wrapper' => [
					'width' => '50',
				]
			])
			->addFields($bg_image_position)
		->endGroup()
	->endGroup();

// Partial for Milstones Rolls
$milestones_aside = new FieldsBuilder('milestones_aside');
$milestones_aside
	->addGroup('milestones_aside')
		->addFields($background_color)
		->addFields($section_heading)
		->addFields($shortcodes)
	->endGroup();

// Partial for Section Heading left plus copy on right
$heading_copy = new FieldsBuilder('heading_copy');
$heading_copy
	->addGroup('heading_copy')
		->addFields($anchor_id)
		->addFields($background_color)
		->addRadio('content_direction',[
			'label'=>'Content Layout',
			'instructions' => 'Normal means heading displays first then copy; Reverse means copy first then heading.'
		])
			->addChoices('normal', 'reverse')
		->addFields($section_heading)
		->addWysiwyg('wysiwyg',[
			'label' => 'About Copy',
		])
		->addFields($cta)
	->endGroup();


// Partial for Card Grid
$card_grid = new FieldsBuilder('card_grid');
$card_grid
	->addGroup('card_grid')
		->addRepeater('card')
			->addImage('icon',[
				'return_format' => 'id',
				'wrapper' => [
					'width' => '30',
				]
			])
			->addWysiwyg('wysiwyg',[
				'label' => 'Body Content',
			])
			->addFields($cta)
		->endRepeater()
	->endGroup();

$investment_stat = new FieldsBuilder('investment_stat');
$investment_stat
  ->addText('title', ['label' => 'Title'])
  ->addText('detail', ['label' => 'Details']); 