<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$form_options = new FieldsBuilder('form_options');
$form_options
  ->addTab('form_options')
    ->addGroup('gf_settings', ['instructions' => 'These settings will override settings in the Gravity Forms menus'])
      ->addText('knock_property_name', [
        'label' => 'Knock Property Name',
        'instructions' => "This value is provided by Knock, it comes before the hyphen in the client's tracking emails <br>Example: for <code>broadstreet-w@m.knck.io</code> the property name is <code>broadstreet</code>"
      ])
      ->addText('other_notification_recipients',[
        'label' => 'Other Notification Recipients',
        'instructions' => 'Enter a comma separated list of email addresses to also receive all notifications'
      ])
    ->endGroup();

        
