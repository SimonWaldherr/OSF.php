<?php
  include_once('./osf.php');
  include_once('./parse.php');

  date_default_timezone_set("Europe/Berlin");

  $data['tags']         = '';
  $data['fullmode']     = 'true';
  $data['mainmode']     = 'block';

  $osf_shownotes = file_get_contents('./example.osf.txt');

  $parsed = parserWrapper($osf_shownotes);
  $parsed2 = parserWrapper($parsed['osf']);
  if ($parsed['osf'] != $parsed2['osf']) {
    $parsed = explode("\n", $parsed['osf']);
    $parsed2 = explode("\n", $parsed2['osf']);
    for ($i = 0; $i < count($parsed); $i++) {
      if ($parsed[$i] != $parsed2[$i]) {
        echo $i.': '.$parsed[$i].' != '.$parsed2[$i]."\n";
      }
    }
    $parsed = implode("\n", $parsed);
  }
  var_dump($parsed);

  $parsed = parserWrapperAPI(array('pad'=> html_entity_decode(base64_encode($osf_shownotes)), 'mainmode'=> $data['mainmode'], 'tags'=> $data['tags']));
  var_dump($parsed);
?>