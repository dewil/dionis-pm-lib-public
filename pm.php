<?php

/*
 * http proxy via curl
 * ver 1.0 2015-02-16
 * @author dwl dewil@dewil.ru
 * @package http proxy
*/

if (!function_exists('curl_setopt_array')) {
    echo 'no curl';
    exit;
}
if ($param = @json_decode(file_get_contents('php://input'), true)) {
    $ch = curl_init();
    curl_setopt_array($ch, $param);
    $result = curl_exec($ch);
    $out = array();
    $out['param'] = $param;
    $out['getinfo'] = curl_getinfo($ch);
    $out['result'] = $result;

    echo json_encode($out, true);
} else {
    echo 'bad request';
}