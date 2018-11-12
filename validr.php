<?php

/*
 *
 * VALIDATE VALUES
 *
 */


function validIsRequired($value) {
    return (!empty($value) && mb_strlen($value) > 0) ?? false;
}

function validIsNumber($value) {
    return is_numeric($value) && filter_var($value, FILTER_VALIDATE_INT) ?? false;
}

function validIsString($value) {
    return (is_string($value) && preg_match('/^[A-Za-z0-9_-]*$/', $value)) ?? false;
}

function validIsEmail($value) {
    $re = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i';
    return (filter_var($value, FILTER_VALIDATE_EMAIL) && preg_match($re, $value)) ?? false;
}

function validIsUrl($value) {
    $re = '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i';
    return (filter_var($value, FILTER_VALIDATE_URL) && preg_match($re, $value)) ?? false;
}

function validIsIP($value) {
    $re = '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/';
    return (filter_var($value, FILTER_VALIDATE_IP) && preg_match($re, $value)) ?? false;
}

function validIsBoolean($value) {
    return (is_bool($value) && filter_var($value, FILTER_VALIDATE_BOOLEAN)) ?? false;
}

function validIsFloat($value) {
    return (is_float($value) && filter_var($value, FILTER_VALIDATE_FLOAT)) ?? false;
}

function validIsPhone($value) {

}



//dziala
function validCustom($regex, $value) {
    return preg_match($regex, $value) ?? false;
}



/*
 * TESTING
 */

$string = "";
$number = 123323;
$email = "gerro80gmail.com";
$url = 'krystianoziembala.pl';
$ip = "111.12.222a111";
$bool = true;
var_dump(validIsboolean($ip));
