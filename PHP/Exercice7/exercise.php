<?php

function divide($dividende, $divisor) {
    if($divisor == 0) {
        throw new RuntimeException('Division by 0 is not allowed');
        return;
    }

    return $dividende / $divisor;
}

function arrayDivide($arrayToDivide, $divisor) {
    $arrayOfResults = [];
    foreach($arrayToDivide as $dividende) {
        try {
            $arrayOfResults[] = $dividende / $divisor;
        } catch (RuntimeException $e) {
            return $arrayToDivide;
        }
    return $arrayOfResults;
    }
}