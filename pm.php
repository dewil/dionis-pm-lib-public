<?php

/*
 * pm library
 * ver 1.01 2015-02-18
 * @author dwl dewil@dewil.ru
 * @package
*/

if (!function_exists('curl_setopt_array')) {
	echo 'oops! no php-curl module';
} elseif (!function_exists('json_encode')) {
	echo 'oops! no php-json module';
} elseif ($param = @json_decode(file_get_contents('php://input'), true)) {
	$ch = curl_init();
	curl_setopt_array($ch, $param);
	$result = curl_exec($ch);
	$out = array();
	$out['param'] = $param;
	$out['getinfo'] = curl_getinfo($ch);
	$out['result'] = $result;
	echo json_encode($out, true);
} else {
	echo 'install ok. waiting command...';
}
?>