<?php
  include_once('./osf.php');
  include_once('./parse.php');

  date_default_timezone_set("Europe/Berlin");

  $data['tags']         = '';
  $data['fullmode']     = 'true';
  $data['mainmode']     = 'osf';

  $osf_shownotes = file_get_contents('./example.osf.txt');
  //$parsed = parserWrapperAPI(array('pad'=> html_entity_decode(base64_encode($osf_shownotes)), 'mainmode'=> $data['mainmode'], 'tags'=> $data['tags']));
  $parsed = parserWrapper($osf_shownotes);
  var_dump($parsed);
?>