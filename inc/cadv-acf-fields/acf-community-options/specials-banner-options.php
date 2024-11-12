<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$specials_banner_opts = new FieldsBuilder('contact_info');
$specials_banner_opts
  ->addTab('specials_banner')
    ->addGroup('specials_banner_config',['label' => 'Specials Banner Configuration'])
      ->addText('gsheet_api_key', ['label' => 'GSheets API Key'])
      ->addText('gsheet_id',['label' => 'Google Sheet ID'])
      ->addText('client_code',['label' => 'Client Code'])
    ->endGroup();