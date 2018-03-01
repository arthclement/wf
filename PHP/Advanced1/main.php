<?php

require_once __DIR__.'/Download/download.php';
require_once __DIR__.'/Format/format.php';
require_once __DIR__.'/Insert/insert.php';

use function Download\downloadFile;
use function Format\formatToCSV;
use function Insert\insertToFile;


$file = downloadFile('https://api.apis.guru/v2/list.json');
$csvArray = formatToCSV($file);
insertToFile($csvArray);