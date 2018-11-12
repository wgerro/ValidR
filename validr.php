<?php

/*
 *
 * VALIDATE VALUES
 *
 */

function validIsRequired($value) {
    return (!empty($value) && mb_strlen($value) > 0);
}

function validIsNumber($value) {
    return is_numeric($value) && filter_var($value, FILTER_VALIDATE_INT);
}

function validIsString($value) {
    return (is_string($value) && preg_match('/^[A-Za-z0-9_-]*$/', $value));
}

function validIsEmail($value) {
    $re = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i';
    return (filter_var($value, FILTER_VALIDATE_EMAIL) && preg_match($re, $value));
}

function validIsUrl($value) {
    $re = '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i';
    return (filter_var($value, FILTER_VALIDATE_URL) && preg_match($re, $value));
}

function validIsIP($value) {
    $re = '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/';
    return (filter_var($value, FILTER_VALIDATE_IP) && preg_match($re, $value));
}

function validIsBoolean($value) {
    return (is_bool($value) && filter_var($value, FILTER_VALIDATE_BOOLEAN));
}

function validIsFloat($value) {
    return (is_float($value) && filter_var($value, FILTER_VALIDATE_FLOAT));
}

function validCustom($value, $regex) {
    return preg_match($regex, $value);
}

function validIsNull($value) {
    return is_null($value);
}

function validIsUniqueTable($type, $connection, $table, $column, $id, $value) {
    $select = "SELECT COUNT(*) as results FROM {$table} WHERE id=? AND {$column}=?";
    switch($type) {
        case 'mysqli' :
            $count = $connection->prepare($select);
            $count->bind_param('is',$id, $value);
            $count->execute();
            $results = $count->get_result();
            $results = $results->fetch_assoc()['results'];
        break;

        case 'pdo' :

        break;
    }
    return $results > 0 ? false : true;
}

/*
* FIX
*/
function validIsPhone($value) {
    return preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $value) ?? false;
}

/*
 * TESTING
 */


