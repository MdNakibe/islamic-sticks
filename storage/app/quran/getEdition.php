<?php

// $edition = 'ur.ahmedali';
// $edition = 'ms.basmeih';
// $edition = 'id.jalalayn';
$edition = 'id.indonesian';

$link = 'https://api.alquran.cloud/v1/quran/'.$edition;

$content = json_decode(file_get_contents($link));

file_put_contents(__DIR__.'/'.$edition.'.json', json_encode($content->data->surahs));