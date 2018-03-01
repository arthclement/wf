<?php

namespace Format;

function formatToCSV($decodedJSON) {
    $csvFile = [['Title', 'Description', 'Name', 'CreatedDate', 'UpdatedDate']];
    foreach ($decodedJSON as $key => $value) {
        $csvFileWIP = [];

        $csvFileWIP[] = $key;
        $preferredVersion = $value['preferred'];
        $csvFileWIP[] = $value['versions'][$preferredVersion]['info']['description'];
        $csvFileWIP[] = $value['versions'][$preferredVersion]['info']['contact']['name'];
        $csvFileWIP[] = dateFormatter($value['added']);
        $csvFileWIP[] = dateFormatter($value['versions'][$preferredVersion]['added']);
    
        $csvFile[] = $csvFileWIP;
    }
    return $csvFile;
}

function dateFormatter($date) {
    $dateToModify = date_create_from_format('Y-m-d\TH:i:s.u\Z', $date);
    $dateModified = $dateToModify->format('d-m-Y H:i:s');
    return $dateModified;
}