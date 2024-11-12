<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$media_attachment_fields = new FieldsBuilder('media_attachment_fields');
$media_attachment_fields
	->addText('gallery_image_banner')

->setLocation('attachment','==','image');

add_action('acf/init', function() use ($media_attachment_fields) {
acf_add_local_field_group($media_attachment_fields->build());
});