<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$floorplan_options = new FieldsBuilder('floorplan_options');
$floorplan_options
->addTab('floorplan_options')
    ->addGroup('fp_gsheet_data', [
        'label' => 'Data for Floor Plan Google Sheets',
        'instructions' => '',
    ])  
        ->addText('sheet_id',[
            'label' => 'Google Sheet ID'])
        ->addText('range',[
            'label' => 'Google Sheet Range'])  
        ->addText('api_key',[
            'label' => 'Google Sheet API Key'])  
    ->endGroup()
    ->addWysiwyg('fp_disclaimer', [
        'label' => 'Floor Plan Disclaimer',
        ])     
    ->addRepeater('fp_categories',[
        'label' => 'Floor Plan Categories',
        'wrapper' => [
            'width' => '100',
            'class' => '',
            'id' => '',
        ]
        ])    
        ->addGroup('individual_category', [
            'label' => 'Floor Plan Category',
            'instructions' => '',
        ])   
            ->addText('category_title', [
                'label' => 'How many bedrooms in these floorplans?',
                'instructions' => 'Example: "One Bedroom","Two Bedroom", etc.',
            ])
            ->addRepeater('floor_plans', [
                'wrapper' => [
                    'width' => '100%',
                    'class' => '',
                    'id' => '',
                    ],
                    'layout' => 'row',
             ])
                ->addImage('fp_image', [
                    'label' => 'Floor Plan Image',
                    'return_format' => "id", 
                    'wrapper' => [
                        'width' => '20%',
                        'class' => '',
                        'id' => '',
                        ]
                    ])
                ->addText('fp_title',[
                    'label' => 'Floor Plan Title',
                    'wrapper' => [
                        'width' => '20%',
                        'class' => '',
                        'id' => '',
                    ]
                    ])
                ->addText('fp_bedroom_bathroom',[
                    'label' => 'Bedroom(s)/Bathroom(s)',
                    'wrapper' => [
                        'width' => '20%',
                        'class' => '',
                        'id' => '',
                    ]
                    ])
                ->addText('fp_square_footage',[
                    'label' => 'Square Footage',
                    'wrapper' => [
                        'width' => '20%',
                        'class' => '',
                        'id' => '',
                    ]
                    ])
                ->addGroup('custom_links',[
                    'wrapper' => [
                        'width' => '20%',
                        'class' => '',
                        'id' => '',
                    ]
                ])
                    ->addTrueFalse('custom_link_toggle',[
                        'label' => 'Use custom link?',
                        'instructions' => 'Toggle on to use a custom link for this floor plan',
                        'default_value' => 0,
                        'ui' => 1,
                    ])
                    ->addLink('link_one',[
                        'instructions' => 'Add custom link',
                        ])
                    ->conditional('custom_link_toggle', '==', '1')

                    ->addLink('link_two',[
                        'instructions' => 'Add custom link',
                        ])
                    ->conditional('custom_link_toggle', '==', '1')
                ->endGroup()
                ->addGroup('misc_text',[
                        'wrapper' => [
                            'width' => '20%',
                            'class' => '',
                            'id' => '',
                        ]
                    ])
                    ->addTrueFalse('misc_text_toggle',[
                        'label' => 'Add Miscellaneous Text?',
                        'instructions' => 'Toggle on to add extra text to the card.',
                        'default_value' => 0,
                        'ui' => 1,
                    ])
                    ->addTextArea('misc_text_area')
                    ->conditional('misc_text_toggle', '==', '1')
                    ->endGroup()    
                ->addText('fp_unique_id',[
                    'label' => 'Unique ID',
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ]
                    ])                                                               
            ->endRepeater();
             
            
                
