<?php

namespace Insert;

function insertToFile($csvArray) {
    //var_dump($csvString);
    $resource = fopen('result.csv', 'w');
    foreach($csvArray as $line) {
        fputcsv($resource, $line);
    }
    fclose($resource);
}