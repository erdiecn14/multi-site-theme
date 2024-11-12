<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$theme_colors = new FieldsBuilder('theme_colors');
$theme_colors
	->addTab('theme_colors')
		->addGroup('theme_colors',['instructions' => 'These colors will update the color swatches found in the color picker.'])
            ->addColorPicker('primary_color', [
                'label' => 'Primary Color',
                'wrapper' => [
                    'width' => '50%',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
            ])
            ->addColorPicker('secondary_color', [
                'label' => 'Secondary Color',
                'wrapper' => [
                    'width' => '50%',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
            ])
            ->addColorPicker('accent_color', [
                'label' => 'Accent Color',
                'wrapper' => [
                    'width' => '50%',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
            ])
            ->addColorPicker('secondary_accent_color', [
                'label' => 'Secondary Accent Color',
                'wrapper' => [
                    'width' => '50%',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
            ])
        ->endGroup() //theme color pickers
        ->addColorPicker('box_background_color', [
            'label' => 'CTA Menu Box Color',
            'instructions' => 'This color picker is for the CTA menu located beneath the hero. If no color is selected, the defualt color will be the primary color.'
        ])
            ->addImage('left_background_pattern', [
                'label' => 'Left Side Background Pattern',
                'return_format' => "id",
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ]
            ])

            ->addImage('right_background_pattern', [
                'label' => 'Right Side Background Pattern',
                'return_format' => "id",
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ]
            ])
        ;