<?php

namespace Download;

function downloadFile($path) {
    $apiContent = file_get_contents($path);
    $decodedJSON = json_decode($apiContent, true);

    return $decodedJSON;
}