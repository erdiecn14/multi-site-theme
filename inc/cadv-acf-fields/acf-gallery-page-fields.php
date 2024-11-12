<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$gallery_page_content = new FieldsBuilder('gallery_page_content',['position' => 'acf_after_title']);
$gallery_page_content
  ->addRepeater('galleries',['label'=>'Galleries For This Page','layout'=>'block']) 
    ->addText('title',['label'=>'Gallery Title'])
    ->addRadio('gallery_type', [
          'label'=>'What type of Gallery?',
          'choices' => ['image','tour','video','popup'],
          'default_value' => 'image'
        ]
    )
    ->addGroup('collection',['label'=>'Gallery Items'])
      ->addRepeater('tours',['label'=>'Tour Embed Codes'])
        ->conditional('gallery_type','==','tour')
        ->addTextArea('tour_code',['label'=>'Emebed Code','new_lines'=>''])
      ->endRepeater() 
      ->addGallery('images',['label'=>'Images','return_format'=>'id'])
          ->conditional('gallery_type','==','image')
      ->addRepeater('videos',['label'=>'Video Files'])
        ->conditional('gallery_type','==','video')
        ->addFile('mp4_video',[
            'label' => 'MP4 Video File',
            'max_size' => '20',
            'mime_types' => 'mp4'
          ])
          ->addFile('webm_video',[
            'label' => 'WEBM Video File',
            'max_size' => '20',
            'mime_types' => 'webm'
          ])
      ->endRepeater()
      ->addRepeater('tours_popup',['label'=>'Popup Virtual Tour'])
        ->conditional('gallery_type','==','popup')
        ->addImage('placeholder', [
          'label' => 'Placeholder Image',
          'return_format' => 'id',
      ])
        ->addText('tour_src',['label'=>'Tour URL','new_lines'=>''])
     ->endRepeater() 
    ->endGroup()
  ->endRepeater()
  ->setLocation('post_type','==','page')
    ->and('post_template','==','page-templates/gallery-page-tmpl.php');

add_action('acf/init', function() use ($gallery_page_content) {
  acf_add_local_field_group($gallery_page_content->build());
});