<?php

namespace Format;

function formatToCSV($decodedJSON) {
    $csvFile = [['title', 'description', 'name', 'createdDate', 'updatedDate']];
    foreach ($decodedJSON as $key => $value) {
        $csvFileWIP = [];

        $csvFileWIP[] = $key;
        $preferedVersion = $value['preferred'];
        $csvFileWIP[] = $value['versions'][$preferedVersion]['info']['description'];
        $csvFileWIP[] = $value['versions'][$preferedVersion]['info']['contact']['name'];
        $csvFileWIP[] = dateFormatter($value['added']);
        $csvFileWIP[] = dateFormatter($value['versions'][$preferedVersion]['added']);
    
        $csvFile[] = $csvFileWIP;
    }
    return $csvFile;
}

function dateFormatter($date) {
    $dateToModify = date_create_from_format('Y-m-d\TH:i:s.u\Z', $date);
    $dateModified = $dateToModify->format('d-m-Y H:i:s');
    return $dateModified;
}